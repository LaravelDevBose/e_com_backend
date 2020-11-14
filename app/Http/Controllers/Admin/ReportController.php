<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Traits\ResponserTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Analytics;
use Spatie\Analytics\Period;

class ReportController extends Controller
{
    public $template_name = 'limitless_v2';
    /**
     * @var Carbon|\DateTime|\DateTimeInterface
     */
    private $publishData;

    public function __construct()
    {
        $this->publishData = Carbon::create(2017, 11, 1, 0, 0, 0);
        $this->middleware('auth:admin');
    }

    public function order_report_page()
    {
        return view('admin_panel.'.$this->template_name.'.report.order_report_page');
    }
    public function analytic_report_page()
    {
        return view('admin_panel.'.$this->template_name.'.report.analytic_report_page');
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
        $statusWish = Order::selectRaw("ifnull(count(*), 0) as total, ifnull(sum(total), 0) as amount, order_status as status")
            ->groupBy('order_status')->orderBy('order_status')->get();
        $dataSets = array();
        for ($i=0; $i<count($labels); $i++){
            $total = 0;
            $amount = 0;
            $find = $statusWish->where('status', $i+1)->first();
            if(!empty($find)){
                $total = (int)$find->total;
                $amount = $find->amount;
            }
            array_push($dataSets, [
                'label'=>$labels[$i],
                'data'=>$total,
                'bgColor'=>$colors[$i],
                'amount'=>$amount
            ]);
        }

        $data = [
            'labels'=> $labels,
            'datasets'=>$dataSets,
        ];
        return ResponserTrait::singleResponse($data, 'success', Response::HTTP_OK);
    }

    public function analytic_yearly_visitors(){
        $thisYPeriod = $this->make_period(Carbon::today()->startOfYear(), Carbon::today()->endOfYear());
         $response = Analytics::performQuery(
            $thisYPeriod,
            'ga:users',
            ['dimensions' => 'ga:yearMonth']
        );

        $thisYVisitor =  collect($response['rows'] ?? [])->map(function (array $dateRow) {
            return [
                'visitors' => (int) $dateRow[1],
            ];
        });
        $lastYPeriod = $this->make_period(Carbon::today()->startOfYear()->subYear(), Carbon::today()->startOfYear()->subDay());
        $response = Analytics::performQuery(
            $lastYPeriod,
            'ga:users',
            ['dimensions' => 'ga:yearMonth']
        );

        $lastYVisitor =  collect($response['rows'] ?? [])->map(function (array $dateRow) {
            return [
                'visitors' => (int) $dateRow[1],
            ];
        });

        $thisY = array_pluck($thisYVisitor, 'visitors');
        $lastY = array_pluck($lastYVisitor, 'visitors');
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

        $data = [
            'labels'=> $labels,
            'datasets'=>[
                [
                    'label'=>Carbon::today()->format('Y'),
                    'data'=>$thisY,
                    'bgColor'=>'#205de4'
                ],
                [
                    'label'=>Carbon::today()->subYear()->format('Y'),
                    'data'=>$lastY,
                    'bgColor'=>'#e420de'
                ]]
        ];
        return ResponserTrait::singleResponse($data, 'success', Response::HTTP_OK);
    }

    public function analytic_monthly_visitors(){
        $thisMPeriod = $this->make_period(Carbon::today()->startOfMonth(), Carbon::today()->endOfMonth());
        $thisMVisitor = $this->_getVisitor($thisMPeriod, 'ga:date', 'd');
        $lastMPeriod = $this->make_period(Carbon::today()->startOfMonth()->subMonth(), Carbon::today()->startOfMonth()->subDay());
        $lastMVisitor = $this->_getVisitor($lastMPeriod, 'ga:date', 'd');
        $thisM = array_pluck($thisMVisitor, 'visitors');
        $thisMD = array_pluck($thisMVisitor, 'date');
        $lastM = array_pluck($lastMVisitor, 'visitors');
        $lastMD = array_pluck($lastMVisitor, 'date');

        $labels = $thisMD;
        if (count($thisMD) < count($lastMD)){
            $labels = $lastMD;
        }
        $data = [
            'labels'=> $labels,
            'datasets'=>[
                [
                    'label'=>Carbon::today()->format('Y'),
                    'data'=>$thisM,
                    'bgColor'=>'#205de4'
                ],
                [
                    'label'=>Carbon::today()->subYear()->format('Y'),
                    'data'=>$lastM,
                    'bgColor'=>'#e420de'
                ]]
        ];
        return ResponserTrait::singleResponse($data, 'success', Response::HTTP_OK);
    }


    public function analytic_weekly_visitor()
    {
        Carbon::setWeekStartsAt(Carbon::SATURDAY);
        Carbon::setWeekEndsAt(Carbon::FRIDAY);
        $thisWeekPeriod = $this->make_period(Carbon::today()->startOfWeek(), Carbon::today()->endOfWeek());
        $thisWeekVisitor = $this->_getVisitor($thisWeekPeriod);
        $lastWeekPeriod = $this->make_period(Carbon::today()->startOfWeek(), Carbon::today()->endOfWeek());
        $lastWeekVisitor = $this->_getVisitor($lastWeekPeriod);
        $thisWeek = array_pluck($thisWeekVisitor, 'visitors');
        $lastWeek = array_pluck($lastWeekVisitor, 'visitors');
        $labels =  [
            "Saturday","Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday",
        ];
        $data = [
            'labels'=> $labels,
            'datasets'=>[
                [
                    'label'=>"This Week",
                    'data'=>$thisWeek,
                    'bgColor'=>'#2196f3'
                ],
                [
                    'label'=>"Previous Week",
                    'data'=>$lastWeek,
                    'bgColor'=>'#ef840a'
                ]]
        ];
        return ResponserTrait::singleResponse($data, 'success', Response::HTTP_OK);

    }

    public function analytic_top_browsers(){
        $period = $this->make_period($this->publishData, Carbon::today());
        $topBrowser = Analytics::fetchTopBrowsers($period);
        $browserLabels = array_pluck($topBrowser, 'browser');
        $totalData = array_pluck($topBrowser, 'sessions');
        $data = [
            'labels'=> $browserLabels,
            'datasets'=>$totalData,
        ];
        return ResponserTrait::singleResponse($data, 'success', Response::HTTP_OK);
    }

    public function analytic_user_bounce(){
        $period = $this->make_period($this->publishData, Carbon::today());
        $usersBounce = Analytics::fetchUserTypes($period);
        $typesUser = array_pluck($usersBounce, 'type');
        $valueUser = array_pluck($usersBounce, 'sessions');

        $data = [
            'labels'=> $typesUser,
            'datasets'=>$valueUser,
        ];
        return ResponserTrait::singleResponse($data, 'success', Response::HTTP_OK);
    }

    private function _getVisitor($period, $dimensions='ga:date', $format='ymd')
    {

        $response = Analytics::performQuery(
            $period,
            'ga:users',
            ['dimensions' => $dimensions]
        );

        return collect($response['rows'] ?? [])->map(function (array $dateRow) use ($format) {
            return [
                'date' => Carbon::parse($dateRow[0])->format($format),
                'visitors' => (int) $dateRow[1],
            ];
        });
    }

    private function make_period($startDate, $endDate)
    {
        return Period::create($startDate, $endDate);
    }
}
