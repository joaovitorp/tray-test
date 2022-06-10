<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_id',
        'total',
        'commission',
    ];

    protected $casts = [
        "commission" => 'float',
        'total' => 'float'
    ];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
