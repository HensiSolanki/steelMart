<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materials extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    protected $fillable = [
        "title", "description", "categoryId", "uid", "thick", "height", "weight", "width", "price", "coilLength", "JSWgrade",
        "grade", "majorDefect", "coating", "testedCoating", "tinTemper", "eqSpeci", "heatNo", "passivation", "coldTreatment",
        "plantNo", "qualityRemark", "storageLocation", "edgeCondition", "plantLotNo", "inStock","qty",
    ];

    public function categories()
    {
        return $this->hasOne(categories::class, 'id', 'categoryId');
    }

    public function lot()
    {
        return $this->belongsToMany(lots::class, 'lot_materials');
    }
}
