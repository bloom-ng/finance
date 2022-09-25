<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Income;
use App\Models\IncomeType;
use App\Models\Payer;
use App\Models\PayerType;
use Illuminate\Http\Request;

class WeeklySummaryController extends Controller
{
    //

    public function index() {
        $months = Income::getMonths();
        $incomeTypes  = IncomeType::all();
        $payerTypes  = PayerType::all();
        return view('admin.reports.weekly.index', [
            'year' => 2022,
            'months' => $months,
            'incomeTypes' => $incomeTypes,
            'payerTypes' => $payerTypes
        ]);
    }

    public function weekly_report() {
        $year = request('year');
        $month = request('month');
        $weeks = Income::getWeeks($year, $month);
        $incomeTypes = IncomeType::all();
        $incomes = [];
        $incomesTotal = [];

        foreach($incomeTypes as $incomeType){
            $weeklyIncome = [];
            $monthlyTotal = 0;
            foreach($weeks as $key => $week){
                $loopWeek = $key;
                $monthIncome = Income::query()
                                    ->whereDate('payment_date', '>=', $week['start'])
                                    ->whereDate('payment_date', '<=', $week['end'])
                                    ->where('income_type_id', $incomeType->id)
                                    ->sum('amount');
                $weeklyIncome[$loopWeek] = $monthIncome;
                $monthlyTotal += $monthIncome;
            }
            $incomes[$incomeType->name] =  $weeklyIncome;
            $incomesTotal[$incomeType->name] =  $monthlyTotal;
        }

        return view('admin.reports.weekly.summary', [
            'weeks' => $weeks,
            'month' => $month,
            'year' => $year,
            'incomes'=> $incomes,
            'incomesTotal' => $incomesTotal
        ]);
    }

    // public function income_type_index(){
    //     $months = Income::getMonths();
    //     $incomeTypes  = IncomeType::all();
    //     return view('admin.reports.weekly.income_type.index', [
    //         'year' => 2022,
    //         'months' => $months,
    //         'incomeTypes' => $incomeTypes
    //     ]);
    // }

    public function income_type_summary() {
        $year = request('year');
        $month = request('month');
        $weeks = Income::getWeeks($year, $month);
        $income_type_id = request('incomeType');
        $incomeType = IncomeType::find($income_type_id);
        $incomes = [];
        $incomesTotal = [];
        
            $monthlyIncome = [];
            $annualTotal = 0;
            foreach($weeks as $key => $week){
                $loopMonth = $key;
                
                $monthIncome = Income::query()
                                    ->whereDate('payment_date', '>=', $week['start'])
                                    ->whereDate('payment_date', '<=', $week['end'])
                                    ->where('income_type_id', $incomeType->id)
                                    ->sum('amount');
                $monthlyIncome[$loopMonth] = $monthIncome;
                $annualTotal += $monthIncome;
            }
            $incomes[$incomeType->name] =  $monthlyIncome;
            $incomesTotal[$incomeType->name] =  $annualTotal;

        return view('admin.reports.weekly.income_type.summary', [
            'weeks' => $weeks,
            'incomes'=> $incomes,
            'incomesTotal' => $incomesTotal
        ]);
    }

    // public function payer_type_index() {
    //     // to be done
    //     $months = Income::getMonths();
    //     $payerTypes  = PayerType::all();
    //     return view('admin.reports.weekly.payer_type.index', [
    //         'year' => 2022,
    //         'months' => $months,
    //         'payerTypes' => $payerTypes
    //     ]);
    // }

    public function payer_type_summary() {
        // to be done
        $year = request('year');
        $month = request('month');
        $weeks = Income::getWeeks($year, $month);
        $payerType = request('payerType');
        $payers = Payer::where('payer_type_id', $payerType)->get();
        $incomes = [];
        $incomesTotal = [];

        foreach($payers as $payer){
            $monthlyIncome = [];
            $annualTotal = 0;
            foreach($weeks as $key => $week){
                $loopMonth = $key;
                
                $monthIncome = Income::query()
                                    ->whereDate('payment_date', '>=', $week['start'])
                                    ->whereDate('payment_date', '<=', $week['end'])
                                    ->where('payer_id', $payer->id)
                                    ->sum('amount');
                $monthlyIncome[$loopMonth] = $monthIncome;
                $annualTotal += $monthIncome;
            }
            $incomes[$payer->name] =  $monthlyIncome;
            $incomesTotal[$payer->name] =  $annualTotal;
        }

        return view('admin.reports.weekly.payer_type.summary', [
            'weeks' => $weeks,
            'incomes'=> $incomes,
            'incomesTotal' => $incomesTotal
        ]);
    }
}
