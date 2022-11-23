<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'parentcategory'];

    public function materials()
    {
        return $this->belongsToMany(materials::class, 'materials_categories');
    }

    public function Subcategories()
    {
        return $this->belongsTo(categories::class, 'parentcategory');
    }

    // Same table, self referencing, but change the key order
    public function Parentcategory()
    {
        return $this->belongsTo(categories::class, 'parentcategory');
    }
}
