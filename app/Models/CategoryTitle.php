<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTitle extends Model
{
    use HasFactory;

    protected $fillable = ['title' , 'category_id'];

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
