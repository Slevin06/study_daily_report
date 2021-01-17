<?php

namespace App\Http\Services;

use App\Dailyreport;
use App\Http\Requests\DailyreportValidate;

//use http\Env\Request;
use Illuminate\Http\Request;

class DailyreportService
{
    private $dailyreport;

    public function __construct(Dailyreport $dailyreport)
    {
        $this->dailyreport = $dailyreport;
    }

//    public function getDailyReport()
//    {
//        return $this->dailyreport->get();
//    }

    public function searchDailyReport($request)
    {
        $attributes = $request->all();
        $query = $this->dailyreport->query();

        $id = $attributes['id'] ? $attributes['id'] : "";
        $fromDate = $attributes['from-date'] ? $attributes['from-date'] : "";
        $toDate = $attributes['to-date'] ? $attributes['to-date'] : "";
        $contents = $attributes['contents'] ? $attributes['contents'] : "";

//        if (empty($id) && empty($date) && empty($contents)) return;
        if (isset($id) && !empty($id)) $query->where('id', $id);

        if (isset($fromDate) && !empty($fromDate) && isset($toDate) && !empty($toDate)) {
            $query->whereBetween('date', [$fromDate, $toDate]);
        }
        if (isset($fromDate) && !empty($fromDate) && empty($toDate) && $toDate === "") {
            $query->where('date', '>=', $fromDate);
        }
        if (empty($fromDate) && $fromDate === "" && isset($toDate) && !empty($toDate)) {
            $query->where('date', '<=', $toDate);
        }

        if (isset($contents) && !empty($contents)) {
            $query->where('contents', 'like', '%' . $contents . '%');
        }

        // dd($query->toSql());
        // $result = $query->get();
        $data['result'] = $query->paginate(5);
        if ($data['result']->count() <= 0) return;

        $data['pager-params'] = array(
            'id' => $id,
            'from-date' => $fromDate,
            'to-date' => $toDate,
            'contents' => $contents
        );
        return $data;
    }

    public
    function registerDailyreport($attributes)
    {
        $this->dailyreport->create($attributes);
    }

    public
    function getEditableDailyReport($id)
    {
        return $this->dailyreport->find($id);
    }

    public
    function updateDailyreport(\Illuminate\Http\Request $request, $id)
    {
        $article = $this->dailyreport->find($id);
        $article->date = $request->date;
        $article->contents = $request->contents;
        $article->save();
    }

    public
    function destroyDailyReport($id)
    {
        $article = $this->dailyreport->find($id);
        $article->delete();
    }

//    public function validateDailyReport(App\Http\Requests\DailyreportValidate $request)
//    {
//        $validated = $request->validated();
//    }
}
