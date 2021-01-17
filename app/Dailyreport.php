<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dailyreport extends Model
{
    protected $fillable = [
        'id',
        'date',
        'contents',
    ];
}
