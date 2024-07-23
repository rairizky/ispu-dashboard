<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daily extends Model
{
    use HasFactory;

    protected $table = "dailies";
    protected $fillable = [
        'location_id',
        'category_id',
        'date',
        'time',
        'pm10',
        'pm25',
        'so2',
        'co',
        'o3',
        'no2'
    ];
    protected $guard = [] ;

    public function location() {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
