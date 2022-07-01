<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IncomeTypeController extends Controller
{
    public function index(){
        $incomeTypes = \App\Models\IncomeType::all();

        return view('admin.income-type.index', [
            'incomeTypes' => $incomeTypes
        ]);
    }
}
