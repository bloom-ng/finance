<?php

namespace App\Http\Controllers\Admin;

use App\Models\PayerType;
use App\Models\Payer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PayerController extends Controller
{
    public function index()
    {
        $payersQuery = Payer::query()
                        ->when(request()->has('payer_type'), function($query){
                            $query->where('payer_type_id', request('payer_type'));
                        });

        $payers = $payersQuery->get();

        return view('admin.payer.index', [
            'payers' => $payers
        ]);
    }
    public function create()
    {
        return view('admin.payer.create', [
            'payerTypes' => PayerType::all()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => 'required|string|unique:payer,name',
            'payer_type_id' => 'required|exists:payer_types,id',
        ]);

        $payer = new Payer();

        $payer->name = $data['name'];
        $payer->payer_type_id = $data['payer_type_id'];
        
        $payer->save();

        return redirect()->route('admin.payers.index');
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
