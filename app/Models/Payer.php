<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payer extends Model
{
    use HasFactory;

    protected $with = ['payerType'];

    const PAYER_STATUS_ACTIVE   = 1;
    const PAYER_STATUS_INACTIVE = 0;

    public function income()
    {
        return $this->hasMany(Income::class);
    }

    public function payerType()
    {
        return $this->belongsTo(PayerType::class);
    }

    public static function statusMapping()
    {
        return [
            self::PAYER_STATUS_INACTIVE => 'Inactive',
            self::PAYER_STATUS_ACTIVE   => 'Active'
        ];
    }
}
