<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lots extends Model
{
    use HasFactory;
    protected  $fillable =    [
        'title', 'description', 'uid', 'seller', 'plant', 'materialLocation', 'quantity',
        'startDate', 'endDate', 'price', 'auction', 'status', 'customFields',
    ];

    public function materials()
    {
        return $this->belongsToMany(materials::class, 'lot_materials');
    }
}
