<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryAction extends Model
{
    use HasFactory;

    protected $table = "category_actions";
    protected $fillable = ['category_id', 'name'];
    protected $guard = [] ;

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
