<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = "locations";
    protected $fillable = ['name', 'lat', 'lng'];
    protected $guard = [] ;

    public function dailies()
    {
        return $this->hasMany(Daily::class);
    }
}
