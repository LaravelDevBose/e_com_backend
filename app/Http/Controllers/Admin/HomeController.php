<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Traits\ResponserTrait;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public $template_name = 'limitless_v2';
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function dashboard(){
        $products = Product::notDelete()->count();
        $cancelOrder= Order::whereIn('order_status', [Order::OrderStatus['Cancel'], Order::OrderStatus['Payment fail']])->sum('total');
        $sale = Order::where('order_status',Order::OrderStatus['Delivered'])->sum('total');
        $user = User::notDelete()->count();
        return view('admin_panel.'.$this->template_name.'.home.index',
        [
            'totalProduct'=>$products,
            'totalCancel'=>$cancelOrder,
            'totalSale'=>$sale,
            'totalUser'=>$user,
        ]);

    }

    public function yearly_sale_data()
    {
        $labels = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];
        $thisYear = Order::where('order_status', Order::OrderStatus['Delivered'])
            ->whereYear('created_at', Carbon::today()->format('Y'))
            ->select(DB::raw('sum(total_qty) as total, MONTH(created_at) as month'))
            ->groupBy('month')->orderBy('month')->get();

        $prvYear = Order::where('order_status', Order::OrderStatus['Delivered'])
            ->whereYear('created_at', Carbon::today()->subYear()->format('Y'))
            ->select(DB::raw('sum(total_qty) as total, MONTH(created_at) as month'))
            ->groupBy('month')->orderBy('month')->get();
        $tY = array();
        $pY = array();
        for ($i=1; $i<=12; $i++){
            $total = 0;
            $find = $thisYear->where('month', $i)->first();
            if(!empty($find)){
                $total = (int)$find->total;
            }
            array_push($tY, $total);

            $total = 0;
            $find = $prvYear->where('month', $i)->first();
            if(!empty($find)){
                $total = (int) $find->total;
            }
            array_push($pY, $total);
        }
        $data = [
            'labels'=> $labels,
            'datasets'=>[
                [
                    'label'=>Carbon::today()->format('Y'),
                    'data'=>$tY,
                    'bgColor'=>'#205de4'
                ],
                [
                    'label'=>Carbon::today()->subYear()->format('Y'),
                    'data'=>$pY,
                    'bgColor'=>'#e420de'
                ]]
        ];
        return ResponserTrait::singleResponse($data, 'success', Response::HTTP_OK);
    }

    public function weekly_sale_data()
    {
        $labels =  [
            "Saturday","Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday",
        ];
        Carbon::setWeekStartsAt(Carbon::SATURDAY);
        Carbon::setWeekEndsAt(Carbon::FRIDAY);
        $now = Carbon::today();

        $thisWeek = Order::where('order_status', Order::OrderStatus['Delivered'])
            ->whereDate('created_at', '>=', $now->startOfWeek())
            ->whereDate('created_at', '<=', $now->endOfWeek())
            ->select(DB::raw('sum(total) as total, DAY(created_at) as day'))
            ->groupBy('day')->get();

        $prvWeek = Order::where('order_status', Order::OrderStatus['Delivered'])
            ->whereDate('created_at', '>=', Carbon::today()->startOfWeek()->subDays(7))
            ->whereDate('created_at', '<=', Carbon::today()->startOfWeek()->subDays(1))
            ->select(DB::raw('sum(total) as total, DAY(created_at) as day'))
            ->groupBy('day')->get();
        $tW = array();
        $pW = array();
        for ($i=0; $i<7; $i++){
            $weekStart = Carbon::today()->startOfWeek();
            if ($i!=0){
                $tDate = $weekStart->addDays($i)->format('d');
                $pDate = Carbon::today()->startOfWeek()->subDays($i+1)->format('d');
            }else{
                $tDate = $weekStart->format('d');
                $pDate = $weekStart->subDays(1)->format('d');
            }
            $total = 0;
            $find = $thisWeek->where('day', $tDate)->first();

            if(!empty($find)){
                $total = $find->total;
            }
            array_push($tW, $total);

            $total = 0;
            $find = $prvWeek->where('day', $pDate)->first();
            if(!empty($find)){
                $total = $find->total;
            }
            array_push($pW, $total);

        }
        $data = [
            'labels'=> $labels,
            'datasets'=>[
                [
                    'label'=>"This Week",
                    'data'=>$tW,
                    'bgColor'=>'#2196f3'
                ],
                [
                    'label'=>"Previous Week",
                    'data'=>$pW,
                    'bgColor'=>'#ef840a'
                ]]
        ];
        return ResponserTrait::singleResponse($data, 'success', Response::HTTP_OK);
    }

    public function monthly_sale_data()
    {
        $labels = array();

        $thisWeek = Order::where('order_status', Order::OrderStatus['Delivered'])
            ->whereDate('created_at', '>=', Carbon::today()->startOfMonth())
            ->whereDate('created_at', '<=', Carbon::today()->endOfMonth())
            ->select(DB::raw('sum(total) as total, DAY(created_at) as day'))
            ->groupBy('day')->get();

        $prvWeek = Order::where('order_status', Order::OrderStatus['Delivered'])
            ->whereDate('created_at', '>=', Carbon::today()->startOfMonth()->subMonth())
            ->whereDate('created_at', '<=', Carbon::today()->startOfMonth()->subDay())
            ->select(DB::raw('sum(total) as total, DAY(created_at) as day'))
            ->groupBy('day')->get();
        $tW = array();
        $pW = array();
        for ($i=0; $i<max(Carbon::today()->endOfMonth()->format('d'), Carbon::today()->startOfMonth()->subMonth()->format('d')); $i++){

            if ($i <= Carbon::today()->endOfMonth()->format('d')){
                if ($i!=0){
                    $tDate = Carbon::today()->startOfMonth()->addDays($i)->format('d');
                }else{
                    $tDate = Carbon::today()->startOfMonth()->format('d');
                }
                $total = 0;
                $find = $thisWeek->where('day', $tDate)->first();

                if(!empty($find)){
                    $total = $find->total;
                }
                array_push($tW, $total);
            }
            if ($i <= Carbon::today()->startOfMonth()->subDay()->format('d')){
                if ($i!=0){
                    $pDate = Carbon::today()->startOfMonth()->subDays($i+1)->format('d');
                }else{
                    $pDate = Carbon::today()->startOfMonth()->subDay()->format('d');
                }

                $total = 0;
                $find = $prvWeek->where('day', $pDate)->first();
                if(!empty($find)){
                    $total = $find->total;
                }
                array_push($pW, $total);
            }
            array_push($labels, $i+1);
        }
        $data = [
            'labels'=> $labels,
            'datasets'=>[
                [
                    'label'=>"This Month",
                    'data'=>$tW,
                    'bgColor'=>'#2196f3'
                ],
                [
                    'label'=>"Previous Month",
                    'data'=>$pW,
                    'bgColor'=>'#ef840a'
                ]]
        ];
        return ResponserTrait::singleResponse($data, 'success', Response::HTTP_OK);
    }


    public function order_status_wish_data()
    {
        $labels = [
            'Active',
            'Cancel',
            'Payment fail',
            'Confirm',
            'Ready To Ship',
            'Delivered',
            'Un-paid',
        ];
        $colors = [
            '#00BCD4',
            '#F44336',
            '#ef640a',
            '#2196F3',
            '#5C6BC0',
            '#009688',
            '#ef840a'
        ];
        $statusWish = Order::selectRaw("ifnull(count(*), 0) as total, order_status as status")
            ->groupBy('order_status')->orderBy('order_status')->get();
        $dataSets = array();
        for ($i=0; $i<count($labels); $i++){
            $total = 0;
            $find = $statusWish->where('status', $i+1)->first();
            if(!empty($find)){
                $total = (int)$find->total;
            }
            array_push($dataSets, [
                'label'=>$labels[$i],
                'data'=>$total,
                'bgColor'=>$colors[$i]
            ]);
        }

        $data = [
            'labels'=> $labels,
            'datasets'=>$dataSets,
        ];
        return ResponserTrait::singleResponse($data, 'success', Response::HTTP_OK);
    }

}
