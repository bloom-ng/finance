<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\IncomeType;
use App\Models\Payer;
use App\Models\PayerType;

class AnnualSummaryController extends Controller
{
    public function index(){
        $payerTypes  = PayerType::all();
        $incomeTypes  = IncomeType::all();
        return view('admin.reports.annual.index', [
            'year' => 2020,
            'payerTypes' => $payerTypes,
            'incomeTypes' => $incomeTypes
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
        return view('admin.reports.annual.summary', [
            'income' => $income,
            'months' => $months,
            'incomes'=> $incomes,
            'incomesTotal' => $incomesTotal
        ]);
    }

    // public function payer_type_index(){
    //     $payerTypes  = PayerType::all();
    //     return view('admin.reports.yearly.payer_type.index', [
    //         'year' => 2020,
    //         'payerTypes' => $payerTypes
    //     ]);
    // }

    public function payer_type_summary() {
        $year = request('year');
        $payerType = request('payerType');
        $payers = Payer::where('payer_type_id', $payerType)->get();
        $months = Income::getMonths();
        $incomes = [];
        $incomesTotal = [];

        foreach($payers as $payer){
            $monthlyIncome = [];
            $annualTotal = 0;
            foreach($months as $key => $month){
                $loopMonth = $key+1;
                
                $monthIncome = Income::query()
                                    ->whereYear('payment_date', $year)
                                    ->whereMonth('payment_date', $loopMonth)
                                    ->where('payer_id', $payer->id)
                                    ->sum('amount');
                $monthlyIncome[$loopMonth] = $monthIncome;
                $annualTotal += $monthIncome;
            }
            $incomes[$payer->name] =  $monthlyIncome;
            $incomesTotal[$payer->name] =  $annualTotal;
        }

        return view('admin.reports.annual.payer_type.summary', [
            'months' => $months,
            'incomes'=> $incomes,
            'incomesTotal' => $incomesTotal
        ]);
    }

    // public function income_type_index(){
    //     $incomeTypes  = IncomeType::all();
    //     return view('admin.reports.yearly.income_type.index', [
    //         'year' => 2022,
    //         'incomeTypes' => $incomeTypes
    //     ]);
    // }

    public function income_type_summary() {
        $year = request('year');
        $income_type_id = request('incomeType');
        $incomeType = IncomeType::find($income_type_id);
        $months = Income::getMonths();
        $incomes = [];
        $incomesTotal = [];
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

        return view('admin.reports.annual.income_type.summary', [
            'months' => $months,
            'incomes'=> $incomes,
            'incomesTotal' => $incomesTotal
        ]);
    }
}
