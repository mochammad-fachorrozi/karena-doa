<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        $title = 'Dashboard ';

        return view('backend.dashboard.index', [
            'title' => $title,
        ]);
    }
}
