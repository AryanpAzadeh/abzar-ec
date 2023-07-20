<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LamaLama\Wishlist\Wishlistable;
use Laravel\Scout\Searchable;

class Product extends Model
{

    use Wishlistable , Searchable , HasFactory;

    protected $fillable = ['title', 'slug', 'image', 'complete_description', 'description', 'features', 'category_id', 'sub_category_id' , 'short_description' , 'price' , 'discount' , 'brand_id' , 'offer'];
    protected $casts = [
        'features' => 'array',
    ];


    use Sluggable;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function toSearchableArray()
    {
        return [
          'title' => $this->title
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class)->withDefault('none');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function comments()
    {
        return $this->hasMany(ProductComment::class);
    }



}
