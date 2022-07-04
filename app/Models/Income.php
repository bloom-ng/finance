<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

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
}
