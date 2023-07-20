<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleComment extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'email' , 'comment' , 'article_id'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
