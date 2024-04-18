<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Revenue;

class AdminRevenueController extends Controller
{
    public function list()
    {
        $revenues = Revenue::paginate(20);
        return view('admin.pages.revenue.list', compact('revenues'));
    }
}
