<?php

namespace App\Http\Controllers\ui;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        try {
            $user_id = Auth::user()->id;

            $product_id = $request->input('product_id');
            $quantity = $request->input('quantity') ?? 1;

            $old_cart = Cart::where('product_id', $product_id)
                ->where('user_id', $user_id)
                ->first();

            if ($old_cart) {
                $old_cart->quantity = $old_cart->quantity + $quantity;
                $success = $old_cart->save();
            } else {
                $cart = new Cart();
                $cart->user_id = $user_id;
                $cart->product_id = $product_id;
                $cart->quantity = $quantity;
                $success = $cart->save();
            }

            if ($success) {
                alert()->success('Success', 'The product has been successfully added to the cart!');
            } else {
                alert()->error('Error', 'An error occurred while adding the product to the cart!');
            }
            return back();
        } catch (\Exception $exception) {
            alert()->error('Error', 'Error, Please try again!');
            return back();
        }
    }

    public function updateQuantity(Request $request)
    {
        try {
            $cart_id = $request->input('cart_id');
            $quantity = $request->input('quantity');

            $cart = Cart::find($cart_id);
            if (!$cart) {
                alert()->error('Error', 'No product found in the cart!');
                return back();
            }

            $cart->quantity = $quantity;
            $success = $cart->save();

            if ($success) {
                alert()->success('Success', 'Change quantity successfully!');
            } else {
                alert()->error('Error', 'An error occurred while changing quantity the product!');
            }
            return back();
        } catch (\Exception $exception) {
            alert()->error('Error', 'Error, Please try again!');
            return back();
        }
    }

    public function deleteCart(Request $request, $id)
    {
        try {
            $success = Cart::where('id', $id)->delete();

            if ($success) {
                alert()->success('Success', 'Successfully removed product from cart!');
            } else {
                alert()->error('Error', 'An error occurred while removing product from cart!');
            }
            return back();
        } catch (\Exception $exception) {
            alert()->error('Error', 'Error, Please try again!');
            return back();
        }
    }

    public function clearCart(Request $request)
    {
        try {
            $user_id = Auth::user()->id;

            $success = Cart::where('user_id', $user_id)->delete();

            if ($success) {
                alert()->success('Success', 'Clear cart successfully!');
            } else {
                alert()->error('Error', 'Clear cart error!');
            }
            return back();
        } catch (\Exception $exception) {
            alert()->error('Error', 'Error, Please try again!');
            return back();
        }
    }

    public function changeQuantity(Request $request)
    {
        try {
            $cart_id = $request->input('cart_id');
            $quantity = $request->input('quantity');

            $cart = Cart::find($cart_id);
            if (!$cart) {
                return response('No product found in the cart!', 404);
            }

            $cart->quantity = $quantity;
            $success = $cart->save();

            if ($success) {
                return response('Change quantity successfully!', 200);
            } else {
                return response('An error occurred while changing quantity the product!', 400);
            }
        } catch (\Exception $exception) {
            return response('Error, Please try again', 400);
        }
    }
}
