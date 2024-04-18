<?php

namespace App\Http\Controllers\ui;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Revenue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function list(Request $request)
    {
        $orders = Order::where('user_id', Auth::user()->id)
            ->where('status', '!=', OrderStatus::DELETED)
            ->orderByDesc('id')
            ->get();
        return view('ui.pages.me.my-orders', compact('orders'));
    }

    public function detail(Request $request, $id)
    {
        $order = Order::find($id);
        if (!$order || $order->status == OrderStatus::DELETED) {
            return redirect(route('error.not.found'));
        }

        $order_items = OrderItem::where('order_id', $id)->get();
        return view('ui.pages.me.detail-orders', compact('order', 'order_items'));
    }

    public function cancel(Request $request, $id)
    {
        try {
            $order = Order::find($id);

            $order->status = OrderStatus::CANCELED;
            $order->save();

            /* Xoá doanh thu của order */
            Revenue::where('order_id', $id)->delete();

            /**
             * Xử lí khi huỷ đơn hàng sẽ hoàn trả lại số sản phẩm đã mua
             * */
            $order_items = OrderItem::where('order_id', $id)->get();
            foreach ($order_items as $item) {
                $product = Product::find($item->product_id);
                $product->quantity = $product->quantity + $item->quantity;
                $product->save();
            }

            alert()->success('Success', 'Cancel orders successfully!');
            return redirect(route('order.me.list'));
        } catch (\Exception $exception) {
            alert()->error('Error', 'Please try again!');
            return back();
        }

    }
}
