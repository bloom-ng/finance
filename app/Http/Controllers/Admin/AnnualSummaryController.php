<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\IncomeType;

class AnnualSummaryController extends Controller
{
    public function index(){
        return view('admin.reports.index', [
            'year' => 2020
        ]);
    }

    public function annual(){
        $year = request('year', date('Y'));
        $incomeTypes = IncomeType::all();
        $incomes = [];
        $incomesTotal = [];
        $months = Income::getMonths();

        foreach($incomeTypes as $incomeType){
            $monthlyIncome = [];
            $annualTotal = 0;
            foreach($months as $key => $month){
                $loopMonth = $key+1;
                
                $monthIncome = Income::query()
                                    ->whereYear('payment_date', $year)
                                    ->whereMonth('payment_date', $loopMonth)
                                    ->where('income_type_id', $incomeType->id)
                                    ->sum('amount');
                $monthlyIncome[$loopMonth] = $monthIncome;
                $annualTotal += $monthIncome;
            }
            $incomes[$incomeType->name] =  $monthlyIncome;
            $incomesTotal[$incomeType->name] =  $annualTotal;
        }

        $income = Income::query()
                    ->whereYear('payment_date', $year)
                    ->get();

        // dd($incomesTotal);
        return view('admin.reports.annual-summary', [
            'income' => $income,
            'months' => $months,
            'incomes'=> $incomes,
            'incomesTotal' => $incomesTotal
        ]);
    }
}
