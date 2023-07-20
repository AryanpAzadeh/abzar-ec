<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Article;
use App\Models\ArticleComment;
use App\Models\Product;
use App\Models\ProductComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function store_article_comment(CommentRequest $request , Article $article)
    {
        $validate = $request->validated();
        ArticleComment::create([
            'article_id' => $article->id,
            'name' => $validate['name'],
            'email' => $validate['email'],
            'comment' => $validate['comment'],
        ]);

        Session::flash('success',' نظر شما با موفقیت ثبت شد');
        return redirect()->back();
    }

    public function store_product_comment(CommentRequest $request , Product $product)
    {
        $validate = $request->validated();
        ProductComment::create([
            'product_id' => $product->id,
            'name' => $validate['name'],
            'email' => $validate['email'],
            'comment' => $validate['comment'],
        ]);

        Session::flash('success',' نظر شما با موفقیت ثبت شد');
        return redirect()->back();
    }
}
