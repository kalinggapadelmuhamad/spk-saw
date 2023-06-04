<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function indexDashboard()
    {
        $page = 'dashboard';
        return view('dashboard.indexDashboard', compact(
            'page'
        ));
    }
}
