<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\IncomeType;

class IncomeTypeController extends Controller
{
    public function index(){
        $incomeTypes = IncomeType::simplePaginate(2);

        return view('admin.income-type.index', [
            'incomeTypes' => $incomeTypes
        ]);
    }

    public function create()
    {
        return view('admin.income-type.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $incomeType = new IncomeType();

        $incomeType->name = $data['name'];
        $incomeType->save();

        return redirect()->route('admin.income-types.index');
    }

    public function edit(Request $request, $id)
    {
        $incomeType = IncomeType::find($id);

        return view('admin.income-type.edit', [
            'incomeType' => $incomeType
        ]);
    }

    public function update(IncomeType $incomeType, Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $incomeType->name = $data['name'];

        $incomeType->save();

        return redirect()->route('admin.income-types.index');
    }

    public function destroy(IncomeType $incomeType, Request $request)
    {
        $incomeType->delete();

        return redirect()->route('admin.income-types.index');
    }

}
