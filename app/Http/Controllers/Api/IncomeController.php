<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function getPayerByType($payerType){
        $payers = \App\Models\Payer::query()
                    ->when(request()->has('q'), function ($query){
                        $query->where('name', 'LIKE', "%".request('q')."%");
                    })
                    ->where('payer_type_id', $payerType)
                    ->get(['id','name', 'name as text']);
        return response()->json([
            'payers' => $payers
        ]);
    }
}
