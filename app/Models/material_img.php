<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class material_img extends Model
{
    use HasFactory;
    protected $fillable = ['images_id', 'materials_id',];
}
