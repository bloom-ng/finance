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

    public function band_index(){
        return view('admin.reports.band.index', [
            'year' => 2020
        ]);
    }

    public function band_deposit() {
        $year = request('year', date('Y'));
        // $incomeTypes = IncomeType::where('name', 'Band Deposit');
        $payers = PayerType::where('name', 'Band')->get();
        $incomes = [];
        $incomesTotal = [];
        $months = Income::getMonths();

        //Income has to be payer payer class is equal to band
        //Incometype = Incometype Bband Deposit
        foreach($payers as $payer){
            $monthlyIncome = [];
            $annualTotal = 0;
            foreach($months as $key => $month){
                $loopMonth = $key+1;
                
                $monthIncome = Income::query()
                                    ->whereYear('payment_date', $year)
                                    ->whereMonth('payment_date', $loopMonth)
                                    ->where('income_type_id', 9)
                                    ->sum('amount');
                $monthlyIncome[$loopMonth] = $monthIncome;
                $annualTotal += $monthIncome;
            }
            $incomes[$payer->name] =  $monthlyIncome;
            $incomesTotal[$payer->name] =  $annualTotal;
        }

        $income = Income::query()
                    ->whereYear('payment_date', $year)
                    ->get();

        // dd($incomesTotal);
        return view('admin.reports.band.annual-summary', [
            'income' => $income,
            'months' => $months,
            'incomes'=> $incomes,
            'incomesTotal' => $incomesTotal
        ]);
    }
}
