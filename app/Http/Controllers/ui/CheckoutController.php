<?php

namespace App\Http\Controllers\ui;

use App\Enums\OrderMethod;
use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Revenue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        try {
            $order = new Order();

            $user_id = Auth::user()->id;
            $carts = Cart::where('user_id', $user_id)->get();

            $full_name = $request->input('full_name');
            $email = $request->input('c_email_address');
            $phone = $request->input('c_phone');
            $c_address = $request->input('c_address');
            $d_address = $request->input('d_address');
            $total_product = $request->input('c_total_product');
            $shipping_price = $request->input('c_shipping_price');
            $discount_price = $request->input('c_discount_price');
            $total = $request->input('c_total');
            $notes = $request->input('c_order_notes');
            $order_method = OrderMethod::IMMEDIATE;
            $status = OrderStatus::PROCESSING;

            $address = $c_address . ', ' . $d_address;

            $order->full_name = $full_name;
            $order->email = $email;
            $order->phone = $phone;
            $order->address = $address;
            $order->total_price = $total_product;
            $order->shipping_price = $shipping_price;
            $order->discount_price = $discount_price;
            $order->total = $total;
            $order->notes = $notes;
            $order->order_method = $order_method;
            $order->status = $status;

            $order->user_id = $user_id;

            $order_created = $order->save();

            $revenue = new Revenue();
            $revenue->total = $total;
            $revenue->order_id = $order->id;
            $revenue->datetime = Carbon::now()->addHours(7);
            $revenue->save();

            foreach ($carts as $cart) {
                $order_item = new OrderItem();

                $order_item->product_id = $cart->product_id;
                $order_item->quantity = $cart->quantity;
                $order_item->price = $cart->product->price;
                $order_item->order_id = $order->id;

                $order_item->save();

                /**
                 * Xử lí khi mua đơn hàng sẽ trừ đi số sản phẩm đã mua
                 * */
                $product = Product::find($cart->product_id);
                $product->quantity = $product->quantity - $cart->quantity;
                $product->save();
            }

            if ($order_created) {
                Cart::where('user_id', $user_id)->delete();
                alert()->success('Success', 'Checkout successfully!');
                return redirect(route('thank.you.show'));
            }
            alert()->error('Error', 'Checkout error!');
            return back();
        } catch (\Exception $exception) {
            alert()->error('Error', 'Please try again!');
            return back();
        }
    }
}
