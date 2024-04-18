<?php

namespace App\Http\Controllers\admin;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Revenue;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function list()
    {
        $orders = Order::where('status', '!=', OrderStatus::DELETED)
            ->orderByDesc('id')
            ->paginate(20);
        return view('admin.pages.order.list', compact('orders'));
    }

    public function detail($id)
    {
        $order = Order::find($id);
        if (!$order || $order->status == OrderStatus::DELETED) {
            return redirect(route('error.not.found'));
        }
        $order_items = OrderItem::where('order_id', $id)->get();
        return view('admin.pages.order.detail', compact('order', 'order_items'));
    }

    public function changeStatus(Request $request, $id)
    {
        try {
            $order = Order::find($id);

            if (!$order) {
                return back();
            }

            $status = $request->input('status');
            $order->status = $status;

            $order->save();

            $revenue = Revenue::where('order_id', $id)->first();

            if (!$revenue) {
                $revenue = new Revenue();
                $revenue->total = $order->total;
                $revenue->order_id = $order->id;
                $revenue->datetime = Carbon::now()->addHours(7);
            } else {
                $revenue->total = $order->total;
            }

            $revenue->save();

            /**
             * Xử lí khi huỷ đơn hàng sẽ hoàn trả lại số sản phẩm đã mua
             * */
            if ($status == OrderStatus::CANCELED) {
                /* Nếu status là cancel sẽ xoá doanh thu của order đó */
                Revenue::where('order_id', $id)->delete();

                $order_items = OrderItem::where('order_id', $id)->get();
                foreach ($order_items as $item) {
                    $product = Product::find($item->product_id);
                    $product->quantity = $product->quantity + $item->quantity;
                    $product->save();
                }
            }

            alert()->success('Success', 'Success, Change status successfully!');
            return redirect(route('admin.orders.list'));
        } catch (\Exception $exception) {
            alert()->error('Error', 'Error, Please try again!');
            return back();
        }
    }

    public function delete($id)
    {
        try {
            $order = Order::find($id);

            if (!$order) {
                return back();
            }

            $order->status = OrderStatus::DELETED;

            $order->save();

            alert()->success('Success', 'Success, Delete successfully!');
            return redirect(route('admin.orders.list'));
        } catch (\Exception $exception) {
            alert()->error('Error', 'Error, Please try again!');
            return back();
        }
    }
}
