<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class images extends Model
{
    use HasFactory;
    public $fillable = ['path', 'materials_id'];

    public function materials(Type $var = null)
    {
        return $this->belongsToMany(materials::class, 'material_img');
    }
}
