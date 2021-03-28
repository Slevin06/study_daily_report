<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SearchDailyReport extends Model
{
    public function scopeWhereSearchId($query, $id)
    {
        if (!isset($id) && empty($id)) {
            return $query;
        }
        return $query->where('id', $id);
    }

    public function scopeWhereSearchBetweenFromDateToDate($query, $fromDate, $toDate)
    {
        if (!isset($fromDate) && empty($fromDate) && !isset($toDate) && empty($toDate)) {
            return $query;
        }
        return $query->whereBetween('date', [$fromDate, $toDate]);
    }

    public function scopeWhereSearchFromDate($query, $fromDate, $toDate)
    {
        if (!isset($fromDate) && empty($fromDate) && !empty($toDate) && $toDate !== "") {
            return $query;
        }
        return $query->where('date', '>=', $fromDate);
    }

    public function scopeWhereSearchToDate($query, $fromDate, $toDate)
    {
        if (!empty($fromDate) && $fromDate !== "" && !isset($toDate) && empty($toDate)) {
            return $query;
        }
        return $query->where('date', '<=', $toDate);
    }

    public function scopeWhereSearchContents($query, $contents)
    {
        if (!isset($contents) && empty($contents)) {
            return $query;
        }
        return $query->where('contents', 'like', '%' . $contents . '%');
    }

}
