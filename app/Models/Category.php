<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'slug' , 'image'];


    use Sluggable;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function subcategory()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function categorytitle()
    {
        return $this->hasMany(CategoryTitle::class);
    }



    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
