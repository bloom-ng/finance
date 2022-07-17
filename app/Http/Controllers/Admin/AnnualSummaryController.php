<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\PayerType;

class AnnualSummaryController extends Controller
{
    public function index(){
        return view('admin.reports.index', [
            'year' => 2020
        ]);
    }

    public function annual(){
        $year = request('year', date('Y'));
        $payerTypes = PayerType::all();
        $income = Income::query()
                    ->whereYear('payment_date', $year)
                    ->get();

        return view('admin.reports.annual-summary', [
            'income' => $income,
            'months' => Income::getMonths()
        ]);
    }
}
