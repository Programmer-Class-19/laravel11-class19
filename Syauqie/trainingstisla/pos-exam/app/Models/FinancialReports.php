<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinancialReports extends Model
{
    protected $fillable = [
        'report_type',
        'start_date',
        'end_date',
        'total_income',
        'total_expense',
        'net_profit',
    ];
}
