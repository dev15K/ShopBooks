<?php

namespace App\Http\Controllers\admin;

use App\Enums\CategoryStatus;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TranslateController;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCategoryController extends Controller
{
    public function list(Request $request)
    {
        $categories = Category::where('status', '!=', CategoryStatus::DELETED)
            ->orderBy('id', 'desc')
            ->paginate(20);
        return view('admin.pages.category.list', compact('categories'));
    }

    public function detail(Request $request, $id)
    {
        $category = Category::find($id);
        if (!$category || $category->status == CategoryStatus::DELETED) {
            return redirect(route('error.not.found'));
        }

        $categories = Category::where('status', '!=', CategoryStatus::DELETED)
            ->where('id', '!=', $id)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.pages.category.detail', compact('category', 'categories'));
    }

    public function createProcess(Request $request)
    {
        $categories = Category::where('status', '!=', CategoryStatus::DELETED)
            ->orderBy('id', 'desc')
            ->get();
        return view('admin.pages.category.create', compact('categories'));
    }

    public function create(Request $request)
    {
        try {
            $category = new Category();

            $name = $request->input('name');

            $category->name = $name;

            $translate = new TranslateController();
            $category->name_en = $translate->translateText($name, 'en');
            $category->name_vi = $translate->translateText($name, 'vi');

            $parent_id = $request->input('parent_id');

            if ($parent_id && $parent_id != "") {
                $category->parent_id = $parent_id;
            } else {
                $category->parent_id = null;
            }

            if ($request->hasFile('thumbnail')) {
                $item = $request->file('thumbnail');
                $itemPath = $item->store('category', 'public');
                $thumbnail = asset('storage/' . $itemPath);
                $category->thumbnail = $thumbnail;
            } else {
                alert()->error('Error', 'Error, Please upload thumbnail!');
                return back();
            }

            $category->status = $request->input('status');
            $category->created_by = Auth::user()->id;

            $success = $category->save();

            if ($success) {
                alert()->success('Success', 'Success, Create category successful!');
                return redirect(route('admin.categories.list'));
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
            $category = Category::find($id);

            $name = $request->input('name');

            $category->name = $name;

            $translate = new TranslateController();
            $category->name_en = $translate->translateText($name, 'en');
            $category->name_vi = $translate->translateText($name, 'vi');

            $parent_id = $request->input('parent_id');

            if ($parent_id && $parent_id != "") {
                $category->parent_id = $parent_id;
            }

            if ($request->hasFile('thumbnail')) {
                $item = $request->file('thumbnail');
                $itemPath = $item->store('category', 'public');
                $thumbnail = asset('storage/' . $itemPath);
                $category->thumbnail = $thumbnail;
            }

            $category->status = $request->input('status');
            $category->updated_by = Auth::user()->id;
            $category->updated_at = Carbon::now()->addHours(7); /* GMT +7*/

            $success = $category->save();

            if ($success) {
                alert()->success('Success', 'Success, Update category successful!');
                return redirect(route('admin.categories.list'));
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
            $category = Category::find($id);

            $category->status = CategoryStatus::DELETED;
            $category->deleted_by = Auth::user()->id;
            $category->deleted_at = Carbon::now()->addHours(7); /* GMT +7*/

            $success = $category->save();

            if ($success) {
                alert()->success('Success', 'Success, Delete category successful!');
                return redirect(route('admin.categories.list'));
            }

            alert()->error('Error', 'Error, Delete error!');
            return back();
        } catch (\Exception $exception) {
            alert()->error('Error', 'Error, Please try again!');
            return back();
        }
    }
}
