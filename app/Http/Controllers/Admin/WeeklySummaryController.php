<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Income;
use App\Models\IncomeType;
use Illuminate\Http\Request;

class WeeklySummaryController extends Controller
{
    //

    public function index() {
        $month = Income::getMonths();
        return view('admin.reports.weekly-index', [
            'year' => 2022,
            'month' => $month
        ]);
    }

    public function weekly_report() {
        $year = request('year', date('M'));
        $month = request('month', date('M'));
        $incomeTypes = IncomeType::all();
        $incomes = [];
        $incomesTotal = [];
        // $days = Income::getWeeks();

        foreach($incomeTypes as $incomeType){
            $weeklyIncome = [];
            $monthlyTotal = 0;
            foreach($weeks as $key => $week){
                $loopWeek = $key+1;
                
                $weekIncome = Income::query()
                                    ->whereYear('payment_date', $year)
                                    ->whereMonth('payment_date', $loopWeek)
                                    ->where('income_type_id', $incomeType->id)
                                    ->sum('amount');
                $weeklyIncome[$loopWeek] = $weekIncome;
                $monthlyTotal += $weekIncome;
            }
            $incomes[$incomeType->name] =  $weeklyIncome;
            $incomesTotal[$incomeType->name] =  $monthlyTotal;
        }

        $income = Income::whereYear('created_at', '=', $year)
                        ->whereMonth('created_at', '=', $month)
                        ->get();

        return view('admin.reports.weekly-summary', [
            'income' => $income,
            'month' => $month,
            'year' => $year,
            'incomes'=> $incomes,
            'incomesTotal' => $incomesTotal
        ]);
    }
}
