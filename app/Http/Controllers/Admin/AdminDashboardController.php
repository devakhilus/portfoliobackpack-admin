<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
