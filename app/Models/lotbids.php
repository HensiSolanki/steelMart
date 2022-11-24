<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class lotbids extends Model
{
    use HasFactory;
    // use SoftDeletes;

    public $fillable =  ["customerId", "amount", "lotId"];

    public function customers()
    {
        // return $this->belongsToMany(customers::class, lotbids::class, 'customerId', 'id');
        return $this->hasOne(customers::class, 'id');
    }

    public function lots()
    {
        return $this->belongsToMany(lots::class, 'lot_lotbids');
    }
}
