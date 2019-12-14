<?php

namespace App\Listeners;

use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class UpdateProductQtyListener implements ShouldQueue
{
    use Queueable;
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $item = OrderItem::where('item_id', $event->itemId)->first();
        if(!empty($item->size_id) && !empty($item->color_id)){
            $vPro = ProductVariation::where('product_id', $item->product_id)->where('pri_id', $item->color_id)
                ->where('sec_id', $item->size_id)->first();
            $uQty = $vPro->quantity + $item->qty;
            $productQtyUpdate = $vPro->update([
                'quantity'=>$uQty,
            ]);
        }else{
            $product = Product::where('product_id', $item->product_id)->first();
            $uQty = $product->product_qty + $item->qty;
            $productQtyUpdate = $product->update([
                'product_qty'=>$uQty,
            ]);
        }

        if(empty($productQtyUpdate)){
           Log::error('Product Qty Not Update. Item Id'.$event->item->item_id);
        }
    }
}
