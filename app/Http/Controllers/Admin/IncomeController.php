<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\controllers\Controller;
use App\Models\Income;


class IncomeController extends Controller
{
    public function index()
    {

    }

    public function show()
    {

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
            'payment_date'      =>  'required|date'
        ]);

        $income = new Income();

        $income->income_type_id = $data['income_type_id'];
        $income->payer_id = $data['payer_id'];
        $income->amount = $data['amount'];
        $income->payment_method = $data['payment_method'];
        $income->remark = $data['remark'];
        $income->payment_date = $data['payment_date'];

        $income->save();

        return redirect()->route('admin.incomes.create');
    }

    public function update()
    {

    }

    public function edit()
    {

    }

    public function destroy()
    {
        
    }
}
