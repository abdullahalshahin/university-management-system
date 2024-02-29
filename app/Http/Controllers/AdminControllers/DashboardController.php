<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct() {
    //     $this->middleware('permission:dashboard_view|dashboard_asset_details|dashboard_chart_reports', ['only' => ['index']]);
    // }

    public function index() {
        return view('admin_panel.dashboard.index');
    }
}
