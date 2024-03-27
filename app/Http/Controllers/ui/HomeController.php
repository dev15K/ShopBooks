<?php

namespace App\Http\Controllers\ui;

use App\Enums\CategoryStatus;
use App\Enums\ProductStatus;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $new_products = Product::where('status', ProductStatus::ACTIVE)
            ->orderByDesc('id')
            ->limit(5)
            ->get();
        return view('ui.index', compact('new_products'));
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
        return view('ui.pages.cart');
    }

    public function checkout()
    {
        return view('ui.pages.checkout');
    }

    public function contact()
    {
        return view('ui.pages.contact');
    }

    public function thankyou()
    {
        return view('ui.pages.thankyou');
    }
}
