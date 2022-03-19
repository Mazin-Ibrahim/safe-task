<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return inertia()->render('Dashboard/Index');
    }

    public function ui()
    {
        return inertia()->render('Dashboard/UI');
    }
}
