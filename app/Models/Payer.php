<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payer extends Model
{
    use HasFactory;

    protected $with = ['payerType'];

    public function income()
    {
        return $this->hasMany(Income::class);
    }

    public function payerType()
    {
        return $this->belongsTo(PayerType::class);
    }
}
