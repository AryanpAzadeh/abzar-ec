<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\SubCategoryRequest;
use App\Models\Category;
use App\Models\CategoryTitle;
use App\Models\SubCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function category()
    {
        $categories = Category::orderBy('id' , 'desc')->get();
        return view('pages.admin.category' , compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $validate = $request->validated();
        $c = Category::create([
           'name' =>  $validate['name']
        ]);
        $name = 'category-'.$c->id.'.'.$request->file('image')->getClientOriginalExtension();
        if ($request->file('image')->move(storage_path('app/public/category_images'), $name)) {

            $c->image = $name;
        }
        $c->save();
        Session::flash('success','دسته بندی با موفقیت ثبت شد');
        return redirect()->back();
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $validate= $request->validated();
        $category->update($validate);
        $category->slug = SlugService::createSlug(Category::class, 'slug', $validate['name']);
        if ($request->hasFile('image'))
        {
            $name = 'category-'.$category->id.'.'.$request->file('image')->getClientOriginalExtension();
            if ($request->file('image')->move(storage_path('app/public/category_images'), $name)) {

                $category->image = $name;
                $category->save();

            }
        }
        Session::flash('success','دسته بندی با موفقیت ویرایش شد');
        return redirect()->back();
    }

    public function delete(Category $category)
    {
        unlink(storage_path('/app/public/category_images/' . $category->image));
        $category->delete();
        Session::flash('success','دسته بندی با موفقیت حذف شد');
        return redirect()->back();
    }




    public function category_titles()
    {
        $cat_titles = CategoryTitle::with('category')->orderBy('id' , 'desc')->get();
        $categories = Category::orderBy('id' , 'desc')->get();
        return view('pages.admin.category_title' , compact('cat_titles' , 'categories'));
    }

    public function store_title(Request $request)
    {
        CategoryTitle::create([
            'title' =>  $request->title,
            'category_id' =>  $request->category_id
        ]);

        Session::flash('success',' با موفقیت ثبت شد');
        return redirect()->back();
    }

    public function update_title(Request $request, CategoryTitle $category)
    {
        $category->update($request->all());

        Session::flash('success',' با موفقیت ویرایش شد');
        return redirect()->back();
    }

    public function delete_title(CategoryTitle $category)
    {
        $category->delete();
        Session::flash('success',' با موفقیت حذف شد');
        return redirect()->back();
    }


    public function sub_category()
    {
        $sub_categories = SubCategory::with('category' , 'categorytitle')->orderBy('id' , 'desc')->get();
        $categories = Category::orderBy('id' , 'desc')->get();
        return view('pages.admin.sub_category' , compact('sub_categories' , 'categories'));
    }

    public function store_sub_category(SubCategoryRequest $request)
    {
        $validate = $request->validated();
        $c = SubCategory::create([
            'name' =>  $validate['name'],
            'category_id' =>  $validate['category_id'],
            'categorytitle_id' =>  $validate['categorytitle_id'],
        ]);

        $name = 'sub-category-'.$c->id.'.'.$request->file('image')->getClientOriginalExtension();
        if ($request->file('image')->move(storage_path('app/public/sub_category_images'), $name)) {

            $c->image = $name;
        }
        $c->save();
        Session::flash('success','دسته بندی با موفقیت ثبت شد');
        return redirect()->back();
    }

    public function update_sub_category(SubCategoryRequest $request, SubCategory $category)
    {
        $validate = $request->validated();
        $category->update($validate);
        $category->slug = SlugService::createSlug(SubCategory::class, 'slug', $validate['name']);
        $category->save();
        if ($request->hasFile('image'))
        {
            $name = 'sub-category-'.$category->id.'.'.$request->file('image')->getClientOriginalExtension();
            if ($request->file('image')->move(storage_path('app/public/sub_category_images'), $name)) {

                $category->image = $name;
                $category->save();

            }
        }

        Session::flash('success',' با موفقیت ویرایش شد');
        return redirect()->back();
    }

    public function delete_sub_category(SubCategory $category)
    {
        unlink(storage_path('/app/public/sub_category_images/' . $category->image));
        $category->delete();
        Session::flash('success',' با موفقیت حذف شد');
        return redirect()->back();
    }


    public function get_category_titles($id)
    {
        $category = Category::find($id);
        $category_titles = $category->categorytitle()->get();

        return response()->json(['data' => $category_titles]);
    }
}
