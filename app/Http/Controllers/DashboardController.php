<?php

namespace App\Http\Controllers;

use App\Services\DashboardService;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with statistics and charts.
     */
    public function index(DashboardService $dashboardService): View
    {
        return view('dashboard.index', $dashboardService->getDashboardData());
    }
}
