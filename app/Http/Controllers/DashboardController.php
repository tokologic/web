<?php


namespace App\Http\Controllers;


class DashboardController extends Controller
{
    public function index()
    {
        $page = (object)['title' => 'Dashboard'];
        return view('dashboard.index', compact('page'));
    }
}
