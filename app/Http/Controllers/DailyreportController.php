<?php

namespace App\Http\Controllers;

use App\Dailyreport;
use App\Http\Services\DailyreportService;
use Illuminate\Http\Request;
use App\Http\Requests\DailyreportValidate;
use App\Http\Requests\SearchDailyreportVal;
use App\Models\SearchDailyReport;

class DailyreportController extends Controller
{
    private $dailyreportService;

    public function __construct(DailyreportService $dailyreportService)
    {
        $this->dailyreportService = $dailyreportService;
    }

    public function index()
    {
//        $reports = $this->dailyreportService->getDailyReport();
//        return view('dailyreports.index', compact('reports'));
        return view('dailyreports.index');
    }

    public function search(SearchDailyreportVal $request)
    {
        $reports = $this->dailyreportService->searchDailyReport($request);
        return view('dailyreports.index', compact('reports'));
    }

    public function showCreateReport()
    {
        return view('dailyreports.create');
    }

    public function createDailyReport(DailyreportValidate $request)
    {
        $attributes = $request->all();
        $this->dailyreportService->registerDailyreport($attributes);
        return redirect()->to('/');
    }

    public function editDailyReport($id)
    {
        $report = $this->dailyreportService->getEditableDailyReport($id);
        return view('dailyreports.edit', compact('report'));
    }

    public function updateDailyReport(Request $request, $id)
    {
        $this->dailyreportService->updateDailyreport($request, $id);
        return redirect()->to('/');
    }

    public function deleteDailyReport($id)
    {
        $this->dailyreportService->destroyDailyReport($id);
        return redirect()->to('/');
    }
}
