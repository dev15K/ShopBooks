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
            $order_created = $this->handleCheckout($request);
            if ($order_created) {
                $user_id = Auth::user()->id;
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

    public function returnCheckout(Request $request)
    {
        $url = session('url_prev', '/');

        if ($request->vnp_ResponseCode == "00") {
            if (Auth::check()) {
                $listValue = session('listValue');
                $arrayValue = explode(',', $listValue);

                $request->merge([
                    '_token' => $arrayValue[0],
                    'full_name' => $arrayValue[1],
                    'c_email_address' => $arrayValue[2],
                    'c_phone' => $arrayValue[3],
                    'c_address' => $arrayValue[4],
                    'd_address' => $arrayValue[5],
                    'order_method' => OrderMethod::CARD_CREDIT,
                    'user_id' => $arrayValue[6],
                    'c_total_product' => $arrayValue[7],
                    'c_shipping_price' => $arrayValue[8],
                    'c_discount_price' => $arrayValue[9],
                    'c_total' => $arrayValue[10],
                    'c_order_notes' => $arrayValue[11],
                ]);

                $order_created = $this->handleCheckout($request);
                if ($order_created) {
                    $user_id = Auth::user()->id;
                    Cart::where('user_id', $user_id)->delete();
                    alert()->success('Success', 'Checkout successfully!');
                    return view('ui.pages.thankyou');
                }
            }

            alert()->error('errors', 'errors');
            return redirect($url)->with('errors', 'Lỗi trong quá trình thanh toán phí dịch vụ');
        }
        session()->forget('url_prev');
        return redirect($url)->with('errors', 'Lỗi trong quá trình thanh toán phí dịch vụ');
    }

    private function handleCheckout($request)
    {
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
        $order_method = $request->input('order_method') ?? OrderMethod::IMMEDIATE;
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

        return $order_created;
    }

    public function checkoutByVNPay(Request $request)
    {
        $emailTo = $request->input('email');
        session(['emailTo' => $emailTo]);
        $money = $request->input('c_total');
        $money = $money . '00';
        $money = (int)$money;
        session(['cost_id' => $request->id]);
        session(['url_prev' => url()->previous()]);
        $vnp_TmnCode = "DX99JC99";
        $vnp_HashSecret = "NTMFIAYIYAEFEAMZVWNCESERJMBVROKS";
        $vnp_ReturnUrl = route('checkout.return');
        $vnp_TxnRef = date("YmdHis");
        $vnp_Amount = $money;
        $vnp_Locale = 'vn';
        $user = Auth::user();
        $vnp_IpAddr = $request->input('c_address');
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
        $apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
        $startTime = date("YmdHis");
        $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));

        $token = $request->input('_token');

        $full_name = $request->input('full_name');
        $email = $request->input("c_email_address");
        $phone = $request->input('c_phone');
        $c_address = $request->input('c_address');
        $d_address = $request->input('d_address');

        $user_id = $request->input('user_id');

        $total = $request->input("c_total_product");
        $shippingPrice = $request->input('c_shipping_price');
        $salePrice = $request->input('c_discount_price');
        $vnpAmount = $request->input('c_total');

        $c_order_notes = $request->input('c_order_notes');

        $array[] = $token;

        $array[] = $full_name;
        $array[] = $email;
        $array[] = $phone;
        $array[] = $c_address;
        $array[] = $d_address;

        $array[] = $user_id;

        $array[] = $total;
        $array[] = $shippingPrice;
        $array[] = $salePrice;
        $array[] = $vnpAmount;

        $array[] = $c_order_notes;

        $listValue = implode(',', $array);

        session(['listValue' => $listValue]);

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => "Thanh toan GD:" . $vnp_TxnRef,
            "vnp_OrderType" => "270000",
            "vnp_ReturnUrl" => $vnp_ReturnUrl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }
}
