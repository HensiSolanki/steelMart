<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materials extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'height', 'width', 'length', 'weight', 'inStock', 'price', 'categoryId', 'customFields', 'uid'];

    public function categories()
    {
        return $this->hasOne(categories::class, 'id', 'categoryId');
    }

    public function lot()
    {
        return $this->belongsToMany(lots::class, 'lot_materials');
    }

    public function images()
    {
        return $this->hasMany(images::class);
    }
}
