<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ReportService;
use App\Services\MenuAnalyticsService;
use App\Services\StaffAnalyticsService;
use App\Services\TableAnalyticsService;
use App\Services\DisciplineReportService;
use App\Services\EmployeeReportService;

class ReportsController extends Controller
{
    // 📊 Profit Reports
    public function monthlyProfit(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');
        return ReportService::getMonthlyProfit($month, $year);
    }

    public function profitTrend(Request $request)
    {
        $months = $request->input('months', 6); // default: last 6 months
        return ReportService::monthlyProfitTrend($months);
    }

    // 📋 Menu Reports
    public function topMenuItems(Request $request)
    {
        $month = $request->input('month');
        $limit = $request->input('limit', 5);
        return MenuAnalyticsService::topMenuItems($month);
    }

    public function lowStockIngredients(Request $request)
    {
        $threshold = $request->input('threshold', 5); // show items below this quantity
        return MenuAnalyticsService::lowStockIngredients();
    }

    public function ingredientUsage(Request $request)
    {
        $month = $request->input('month');
        return MenuAnalyticsService::ingredientUsage($month);
    }

    // 👥 Staff Reports
    public function staffPerformance(Request $request)
    {
        $month = $request->input('month');
        return StaffAnalyticsService::rankByPerformance($month);
    }

    public function topPerformers(Request $request)
    {
        $month = $request->input('month');
        return EmployeeReportService::topPerformers($month);
    }

    public function disciplineRanking(Request $request)
    {
        $month = $request->input('month');
        return DisciplineReportService::rankByDiscipline($month);
    }

    // 🪑 Table Reports
    public function tableUsage(Request $request)
    {
        $month = $request->input('month');
        return TableAnalyticsService::tableUsage($month);
    }

    public function operatingCostBreakdown(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

        $costs = \App\Models\OperatingCost::selectRaw('category, SUM(amount) as total')
            ->whereMonth('cost_month', $month)
            ->whereYear('cost_month', $year)
            ->groupBy('category')
            ->orderByDesc('total')
            ->get();

        return response()->json($costs);
    }
}
