<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;
    
    protected $with = ['incomeType', 'payer'];

    public function incomeType()
    {
        return $this->belongsTo(IncomeType::class);
    }

    public function payer()
    {
        return $this->belongsTo(Payer::class);
    }

    public static function paymentMethodMapping(){
        return [
            0   =>  'Online',
            1   =>  'Cash',
            2   =>  'Cheque',
            3   =>  'Others'
        ];
    }

    public static function getMonths(){
        return [
            'JAN',
            'FEB',
            'MAR',
            'APR',
            'MAY',
            'JUN',
            'JUL',
            'AUG',
            'SEP',
            'OCT',
            'NOV',
            'DEC',
        ];
    }

    public static function getWeeks($year, $month) {
        return [
            1   => ['start' => "{$year}-{$month}-1", 'end' => "{$year}-{$month}-7"],
            2   => ['start' => "{$year}-{$month}-8", 'end' => "{$year}-{$month}-14"],
            3   => ['start' => "{$year}-{$month}-15", 'end' => "{$year}-{$month}-21"],
            4   => ['start' => "{$year}-{$month}-22", 'end' => "{$year}-{$month}-28"],
            5   => ['start' => "{$year}-{$month}-29", 'end' => "{$year}-{$month}-31"],
        ];
    }
}
