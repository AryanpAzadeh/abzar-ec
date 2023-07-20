<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Article extends Model
{
    use HasFactory , Searchable;
    protected $fillable = ['title' , 'slug' , 'body' , 'image' , 'tag' , 'sub_title' , 'category_id'];

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
        return $this->belongsTo(ArticleCategory::class);
    }
    public function comments()
    {
        return $this->hasMany(ArticleComment::class);
    }
}
