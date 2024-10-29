<?php

namespace App\Http\Controllers\ui;

use App\Enums\CategoryStatus;
use App\Enums\MemberStatus;
use App\Enums\ProductStatus;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Member;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $new_products = Product::where('status', ProductStatus::ACTIVE)
            ->orderByDesc('id')
            ->limit(5)
            ->get();

        $categories = Category::where('status', CategoryStatus::ACTIVE)
            ->orderByDesc('id')
            ->cursor()
            ->map(function ($item) {
                $category = $item->toArray();

                $products = Product::where('category_id', $item->id)
                    ->where('status', ProductStatus::ACTIVE)
                    ->orderByDesc('id')
                    ->get();

                $category['count'] = $products->count();

                $category['products'] = $products->toArray();

                return $category;
            });
        return view('ui.index', compact('new_products', 'categories'));
    }

    public function shop()
    {
        $products = Product::where('status', ProductStatus::ACTIVE)
            ->orderByDesc('id')
            ->paginate(9);
        $categories = Category::where('status', CategoryStatus::ACTIVE)
            ->where('parent_id', null)
            ->orderByDesc('id')
            ->get();
        if (count($categories) > 3) {
            $categoriesRandom = $categories->random(3);
        } else {
            $categoriesRandom = $categories;
        }
        return view('ui.pages.shop', compact('products', 'categories', 'categoriesRandom'));
    }

    public function detailProduct($id)
    {
        $product = Product::find($id);
        $new_products = Product::where('status', ProductStatus::ACTIVE)
            ->where('id', '!=', $id)
            ->orderByDesc('id')
            ->limit(10)
            ->get();
        return view('ui.pages.shop-single', compact('product', 'new_products'));
    }

    public function cart()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->orderByDesc('id')->get();
        return view('ui.pages.cart', compact('carts'));
    }

    public function checkout()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->orderByDesc('id')->get();
        return view('ui.pages.checkout', compact('carts'));
    }

    public function contact()
    {
        return view('ui.pages.contact');
    }

    public function about()
    {
        $members = Member::where('status', MemberStatus::ACTIVE)
            ->orderBy('stt', 'asc')
            ->limit(4)
            ->get();
        return view('ui.pages.about', compact('members'));
    }

    public function coming()
    {
        return view('ui.pages.coming-soon');
    }

    public function thankyou()
    {
        return view('ui.pages.thankyou');
    }
}
