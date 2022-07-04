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
            'payers'        => $payers,
            'statusMapping' => Payer::statusMapping()
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
            'name'          => 'required|string|unique:payers,name',
            'payer_type_id' => 'required|exists:payer_types,id',
        ]);

        $payer = new Payer();

        $payer->name = $data['name'];
        $payer->payer_type_id = $data['payer_type_id'];
        
        $payer->save();

        return redirect()->route('admin.payers.index');
    }

    public function edit(Payer $payer)
    {
        return view('admin.payer.edit', [
            'payer' => $payer,
            'payerTypes' => PayerType::all(),
            'statusMapping' =>  Payer::statusMapping()
        ]);
    }

    public function update(Payer $payer, Request $request)
    {
        $data = $request->validate([
            'name'          => "required|string|unique:payers,name,$payer->id,id",
            'payer_type_id' => 'required|exists:payer_types,id',
            'status'        => 'required'
        ]);

        $payer->name = $data['name'];
        $payer->payer_type_id = $data['payer_type_id'];
        $payer->status = $data['status'];
        
        $payer->save();

        return redirect()->route('admin.payers.index');
    }

    public function destroy(Payer $payer, Request $request)
    {
        $payer->delete();

        return redirect()->route('admin.payers.index');
    }
}
