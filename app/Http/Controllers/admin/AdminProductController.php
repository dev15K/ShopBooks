<?php

namespace App\Http\Controllers\admin;

use App\Enums\CategoryStatus;
use App\Enums\ProductStatus;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TranslateController;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProductController extends Controller
{
    public function list(Request $request)
    {
        $products = Product::where('status', '!=', ProductStatus::DELETED)
            ->orderBy('id', 'desc')
            ->paginate(20);
        return view('admin.pages.product.list', compact('products'));
    }

    public function detail(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product || $product->status == ProductStatus::DELETED) {
            return redirect(route('error.not.found'));
        }

        $categories = Category::where('status', '!=', CategoryStatus::DELETED)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.pages.product.detail', compact('product', 'categories'));
    }

    public function createProcess(Request $request)
    {
        $categories = Category::where('status', '!=', CategoryStatus::DELETED)
            ->orderBy('id', 'desc')
            ->get();
        return view('admin.pages.product.create', compact('categories'));
    }

    public function create(Request $request)
    {
        try {
            $product = new Product();

            $name = $request->input('name');
            $product->name = $name;

            $translate = new TranslateController();

            $product->name_en = $translate->translateText($name, 'en');
            $product->name_vi = $translate->translateText($name, 'vi');

            $short_description = $request->input('short_description');
            $product->short_description = $short_description;

            $product->short_description_en = $translate->translateText($short_description, 'en');
            $product->short_description_vi = $translate->translateText($short_description, 'vi');

            $description = $request->input('description');
            $product->description = $description;

            $product->description_en = $translate->translateText($description, 'en');
            $product->description_vi = $translate->translateText($description, 'vi');

            $category_id = $request->input('category_id');

            if ($category_id) {
                $product->category_id = $category_id;
            } else {
                alert()->error('Error', 'Error, Please select category!');
                return back();
            }

            if ($request->hasFile('thumbnail')) {
                $item = $request->file('thumbnail');
                $itemPath = $item->store('product', 'public');
                $thumbnail = asset('storage/' . $itemPath);
                $product->thumbnail = $thumbnail;
            } else {
                alert()->error('Error', 'Error, Please upload thumbnail!');
                return back();
            }

            if ($request->hasFile('gallery')) {
                $galleryPaths = array_map(function ($image) {
                    $itemPath = $image->store('product', 'public');
                    return asset('storage/' . $itemPath);
                }, $request->file('gallery'));
                $gallery = implode(',', $galleryPaths);
            } else {
                $gallery = '';
            }
            $product->gallery = $gallery;

            $product->price = $request->input('price');
            $product->quantity = $request->input('quantity');

            $product->status = $request->input('status');
            $product->created_by = Auth::user()->id;

            $success = $product->save();

            if ($success) {
                alert()->success('Success', 'Success, Create product successful!');
                return redirect(route('admin.products.list'));
            }

            alert()->error('Error', 'Error, Create error!');
            return back();
        } catch (\Exception $exception) {
            alert()->error('Error', 'Error, Please try again!');
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $product = Product::find($id);

            $translate = new TranslateController();

            $name = $request->input('name');
            $product->name = $name;

            $product->name_en = $translate->translateText($name, 'en');
            $product->name_vi = $translate->translateText($name, 'vi');

            $short_description = $request->input('short_description');
            $product->short_description = $short_description;

            $product->short_description_en = $translate->translateText($short_description, 'en');
            $product->short_description_vi = $translate->translateText($short_description, 'vi');

            $description = $request->input('description');
            $product->description = $description;

            $product->description_en = $translate->translateText($description, 'en');
            $product->description_vi = $translate->translateText($description, 'vi');

            $category_id = $request->input('parent_id');

            if ($category_id) {
                $product->category_id = $category_id;
            }

            if ($request->hasFile('thumbnail')) {
                $item = $request->file('thumbnail');
                $itemPath = $item->store('product', 'public');
                $thumbnail = asset('storage/' . $itemPath);
                $product->thumbnail = $thumbnail;
            }

            if ($request->hasFile('gallery')) {
                $galleryPaths = array_map(function ($image) {
                    $itemPath = $image->store('product', 'public');
                    return asset('storage/' . $itemPath);
                }, $request->file('gallery'));
                $gallery = implode(',', $galleryPaths);
            } else {
                $gallery = $product->gallery;
            }
            $product->gallery = $gallery;

            $product->price = $request->input('price');
            $product->quantity = $request->input('quantity');

            $product->status = $request->input('status');
            $product->updated_by = Auth::user()->id;
            $product->updated_at = Carbon::now()->addHours(7); /* GMT +7*/

            $success = $product->save();

            if ($success) {
                alert()->success('Success', 'Success, Update product successful!');
                return redirect(route('admin.products.list'));
            }

            alert()->error('Error', 'Error, Update error!');
            return back();
        } catch (\Exception $exception) {
            alert()->error('Error', 'Error, Please try again!');
            return back();
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            $product = Product::find($id);

            $product->status = ProductStatus::DELETED;
            $product->deleted_by = Auth::user()->id;
            $product->deleted_at = Carbon::now()->addHours(7); /* GMT +7*/

            $success = $product->save();

            if ($success) {
                alert()->success('Success', 'Success, Delete product successful!');
                return redirect(route('admin.products.list'));
            }

            alert()->error('Error', 'Error, Delete error!');
            return back();
        } catch (\Exception $exception) {
            alert()->error('Error', 'Error, Please try again!');
            return back();
        }
    }
}
