<?php

namespace App\Listeners;

use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductQtyUpdate
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        foreach ($event->productUpdateArray as $productInfo){
            $newQty = $productInfo['curtQty'] - $productInfo['orderQty'];
            $status = $productInfo['status'];
            if($newQty<=0){
                $newQty = 0;
                $status = Product::ProductStatus['Out of Stock'];
            }
            if(!empty($productInfo['variation_id'])){
                $updateArray = [
                    'product_status'=>$status
                ];
                ProductVariation::where('variation_id', $productInfo['variation_id'])
                    ->update([
                        'quantity'=>$newQty,
                    ]);
            }else{
                $updateArray = [
                    'product_qty'=>$newQty,
                    'product_status'=>$status
                ];
            }
            Product::where('product_id', $productInfo['id'])->update($updateArray);
        }
    }
}
