<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'commission_type_id'
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function commissionType()
    {
        return $this->belongsTo(CommissionType::class);
    }
}
