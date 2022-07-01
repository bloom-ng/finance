<?php

namespace App\Http\Controllers;

use App\Models\PayerType;
use Illuminate\Http\Request;

class PayerTypeController extends Controller
{
    public function index()
    {
        $payerType = \App\Models\PayerType::all();

        return view('admin.dashboard.index', [
            'payerType' => $payerType
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

        PayerType::create($data);

        return redirect('admin.dashboard.index');
    }

    public function edit($id)
    {
        $payerType = PayerType::find($id);
    }

    public function update(PayerType $payerType, Request $request)
    {
        $data = $request()->validate([
            'name' => 'string'
        ]);
        $payerType->update($data);

        return redirect()->back();
    }

    public function destroy(PayerType $payerType, Request $request)
    {
        $request->$payerType->delete();

        return redirect()->back();
    }
}
