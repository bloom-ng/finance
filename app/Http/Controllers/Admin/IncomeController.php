<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\controllers\Controller;
use App\Models\Income;
use App\Models\IncomeType;
use App\Models\PayerType;


class IncomeController extends Controller
{
    public function index()
    {
        $incomes = Income::query()
                        ->with(['incomeType', 'payer'])
                        ->when(request()->has('income_type_id') && !empty(request('income_type_id')), function ($query){
                            $query->where('income_type_id', request('income_type_id'));
                        })
                        ->latest()
                        ->paginate(30);

        return view('admin.income.index', [
            'incomes'   => $incomes,
            'payerTypes'   => PayerType::all(),
            'incomeTypes'   => IncomeType::all(),
        ]);
    }

    public function show(Income $income)
    {
        return view('admin.income.show', [
            'income'   => $income,
            'payerTypes'   => PayerType::all(),
            'incomeTypes'   => IncomeType::all(),
            'paymentMethodMapping'  =>  Income::paymentMethodMapping()
        ]);
    }

    public function create()
    {
        return view('admin.income.create', [
            'incomeTypes'           =>  \App\Models\IncomeType::all(),
            'payerTypes'            =>  \App\Models\PayerType::all(),
            'paymentMethodMapping'  =>  Income::paymentMethodMapping()

        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'income_type_id'    =>  'required|exists:income_types,id',
            'payer_id'          =>  'required|exists:payers,id',
            'amount'            =>  'required',
            'payment_method'    =>  'required',
            'remark'            =>  'required|string',
            'payment_date'      =>  'required'
        ]);

        $income = new Income();

        $income->income_type_id = $data['income_type_id'];
        $income->payer_id = $data['payer_id'];
        $income->amount = $data['amount'];
        $income->payment_method = $data['payment_method'];
        $income->remark = $data['remark'];
        $income->payment_date = $data['payment_date'];

        $income->save();

        return redirect()->route('admin.incomes.create')->with('message', 'Saved Successfully');
    }

    public function update(Income $income, Request $request)
    {
        $data = $request->validate([
            'income_type_id'    =>  'required|exists:income_types,id',
            'payer_id'          =>  'required|exists:payers,id',
            'amount'            =>  'required',
            'payment_method'    =>  'required',
            'remark'            =>  'required|string',
            'payment_date'      =>  'required'
        ]);

        $income = new Income();

        $income->income_type_id = $data['income_type_id'];
        $income->payer_id = $data['payer_id'];
        $income->amount = $data['amount'];
        $income->payment_method = $data['payment_method'];
        $income->remark = $data['remark'];
        $income->payment_date = $data['payment_date'];

        $income->save();

        return redirect()->route('admin.incomes.create')->with('message', 'Saved Successfully');
    }

    public function edit(Income $income)
    {
        // $income = Income::with([
        //     'payer:id,name as payer_name',
        //     'incomeType:id,name as incomeType_name',
        // ]);
        return view('admin.income.edit', [
            'income'   => $income,
            'payerTypes'   => PayerType::all(),
            'incomeTypes'   => IncomeType::all(),
            'paymentMethodMapping'  =>  Income::paymentMethodMapping()
        ]);
    }

    public function destroy(Income $income)
    {
        $income->delete();

        return redirect()->route('admin.incomes.index');
    }
}