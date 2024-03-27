<?php

namespace App\Http\Controllers\ui;

use App\Enums\CategoryStatus;
use App\Enums\ProductStatus;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list()
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
        return view('ui.pages.products', compact('products', 'categories', 'categoriesRandom'));
    }

    public function listByCategory($id)
    {
        $products = Product::where('status', ProductStatus::ACTIVE)
            ->where('category_id', $id)
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
        return view('ui.pages.products', compact('products', 'categories', 'categoriesRandom'));
    }
}
