<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    use HasFactory;

    public $fillable = ["name", "email", "contactNo", "adharNo", "GSTNo", "PanNo", "address", "city", "state", "pincode", "compnyName", "status", "password"];

    public function lotbids()
    {
        return $this->belongsToMany(lotbids::class, customers::class,  'id', 'customerId');
    }
}
