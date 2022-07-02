<?php

namespace App\Http\Controllers\Admin;

use App\Models\PayerType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PayerTypeController extends Controller
{
    public function index()
    {
        $payerTypes = PayerType::all();

        return view('admin.payer-type.index', [
            'payerTypes' => $payerTypes
        ]);
    }
    public function create()
    {
        return view('admin.payer-type.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'string'
        ]);

        $payerType = new PayerType();

        $payerType->name = $data['name'];
        
        $payerType->save();

        return redirect()->route('admin.payer-types.index');
    }

    public function edit(PayerType $payerType)
    {
        return view('admin.payer-type.edit', [
            'payerType' => $payerType
        ]);
    }

    public function update(PayerType $payerType, Request $request)
    {
        $data = $request->validate([
            'name' => 'string'
        ]);

        $payerType->name = $data['name'];
        
        $payerType->save();

        return redirect()->route('admin.payer-types.index');
    }

    public function destroy(PayerType $payerType, Request $request)
    {
        $payerType->delete();

        return redirect()->route('admin.payer-types.index');
    }
}
