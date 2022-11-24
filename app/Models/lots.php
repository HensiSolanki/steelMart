<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lots extends Model
{
    use HasFactory;
    protected  $fillable = ['title', 'description', 'startAmount', 'date', 'uid', 'status', 'customFields'];

    public function materials()
    {
        return $this->belongsToMany(materials::class, 'lot_materials');
    }

    public function lotbids()
    {
        return $this->belongsToMany(lotbids::class, lots::class,  'id', 'lotId');
    }
}
