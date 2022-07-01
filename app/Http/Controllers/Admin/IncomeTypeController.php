<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\IncomeType;

class IncomeTypeController extends Controller
{
    public function index(){
        $incomeTypes = \App\Models\IncomeType::all();

        return view('admin.income-type.index', [
            'incomeTypes' => $incomeTypes
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'string'
        ]);
        IncomeType::create($data);

        return redirect('admin.income-type.index');
    }

    public function edit(Request $request, $id)
    {
        $incomeType = IncomeType::find($id);

        return view('edit', [
            'incomeType' => $incomeType
        ]);
    }

    public function update(IncomeType $incomeType, Request $request)
    {
        $data = $request()->validate([
            'name' => 'string'
        ]);

        $incomeType->update($data);

        return redirect('admin.income-type.index');
    }

    public function destroy(IncomeType $incomeType, Request $request)
    {
        $request->$incomeType->delete();

        return redirect('admin.income-type.index');
    }

}
