<?php

namespace App\Http\Controllers;

//use App\ArticleComment;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ArticleController extends Controller
{
    public function add()
    {
        return view('pages.admin.add.article');
    }

    public function edit(Article $article)
    {
        return view('pages.admin.edit.article' , compact('article'));
    }

    public function store(ArticleRequest $request)
    {
        $validate = $request->validated();
        $article = Article::create([
           'title' => $validate['title'],
           'sub_title' => $validate['sub_title'],
            'body' => $validate['body'],
            'tag' => $validate['tag'],
            'category_id' => $validate['category_id'],
        ]);
        $name = 'article-'.$article->id.'.'.$request->file('image')->getClientOriginalExtension();
        if ($request->file('image')->move(storage_path('app/public/article_images'), $name)) {

            $article->image = $name;
        }
        $article->save();
        Session::flash('success',' با موفقیت انجام شد');
        return redirect()->route('admin.article');
    }

    public function update(Article $article , ArticleRequest $request)
    {
        $validate = $request->validated();
        $article->update($validate);
        if ($article->title != $validate['title'])
        {
            $article->slug =  $article->replicate()->slug;
        }
        $article->save();
        if ($request->hasFile('image'))
        {
//            unlink(public_path('images/articles-image/'.$article->image));
            $name = 'article-'.$article->id.'.'.$request->file('image')->getClientOriginalExtension();
            if ($request->file('image')->move(storage_path('app/public/article_images'), $name)) {

                $article->image = $name;
                $article->save();
            }
        }
        Session::flash('success',' با موفقیت ویرایش شد');
        return redirect()->route('admin.article');
    }

    public function delete(Article $article)
    {
        unlink(storage_path('/app/public/article_images/' . $article->image));
        $article->delete();
        Session::flash('success',' با موفقیت حذف شد');
        return redirect()->route('admin.article');
    }


//    Category
    public function store_category(Request $request)
    {
        ArticleCategory::create([
            'name' => $request->input('name')
        ]);
        Session::flash('success',' با موفقیت ثبت شد');
        return redirect()->back();
    }

    public function update_category(ArticleCategory $category , Request $request)
    {
        $category->update($request->all());
        Session::flash('success',' با موفقیت ویرایش شد');
        return redirect()->back();
    }

    public function delete_category(ArticleCategory $category)
    {
        $category->delete();
        Session::flash('success',' با موفقیت حذف شد');
        return redirect()->back();
    }





    public function comment(Article $article)
    {
        $comments = $article->comments()->orderBy('id' , 'desc')->get();
        return view('pages.admin.article_comments' , compact('article' , 'comments'));
    }

    public function comment_mark(ArticleComment $comment)
    {
        if ($comment->active == 0)
        {
            $comment->active = 1;
            $comment->save();
        }
        else
        {
            $comment->active = 0;
            $comment->save();
        }
        Session::flash('success',' با موفقیت انجام شد');
        return redirect()->back();
    }

    public function comment_delete(ArticleComment $comment)
    {
        $comment->delete();
        Session::flash('success',' با موفقیت حذف شد');
        return redirect()->back();
    }
}
