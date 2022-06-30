<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payer extends Model
{
    use HasFactory;

    public function income()
    {
        return $this->hasMany(Income::class);
    }

    public function payerType()
    {
        return $this->hasMany(PayerType::class);
    }
}
