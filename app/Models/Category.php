<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";
    protected $fillable = ['name', 'description'];
    protected $guard = [] ;

    public function category_actions()
    {
        return $this->hasMany(CategoryAction::class);
    }
}
