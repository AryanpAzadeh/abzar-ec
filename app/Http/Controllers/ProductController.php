<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductImageRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductComment;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function products()
    {
        $products = Product::orderBy('id' , 'desc')->with('category','sub_category' , 'brand')->get();
        return view('pages.admin.product' , compact('products'));
    }

    public function add()
    {
        return view('pages.admin.add.product');
    }

    public function store(ProductRequest $request)
    {
        $validate = $request->validated();
        $product = Product::create([
            'title' => $validate['title'],
            'price' => $validate['price'],
            'discount' => $validate['discount'],
            'short_description' => $validate['short_description'],
            'complete_description' => $validate['complete_description'],
            'description' => $validate['description'],
            'features' => $validate['features'],
            'category_id' => $validate['category_id'],
            'brand_id' => $validate['brand_id'],
            'sub_category_id' => $validate['sub_category_id']
        ]);

        $name = 'product-'.$product->id.'.'.$request->file('image')->getClientOriginalExtension();
        if ($request->file('image')->move(storage_path('app/public/product_images'), $name)) {

            $product->image = $name;
        }
        $product->save();
        Session::flash('success','محصول با موفقیت ثبت شد');
        return redirect()->route('admin.products');

    }


    public function random_offer()
    {
        foreach (Product::all() as $product)
        {
            $product->offer = 0;
            $product->save();
        }
        foreach (Product::inRandomOrder()->take(10)->get() as $product)
        {
            $product->offer = 1;
            $product->save();
        }
        Session::flash('success',' با موفقیت ثبت شد');
        return redirect()->route('admin.products');

    }



    public function product_images (Product $product)
    {
        $images = $product->images()->get();

        return view('pages.admin.product_image', compact('images', 'product'));
    }

    public function store_images(ProductImageRequest $request)
    {
        $validate = $request->validated();

        $image = ProductImage::create([
            'product_id' => $validate['product_id'],
        ]);
        $name = 'product-image-' . $image->id . '_' . $request->product_id . '.' . $request->file('file')->getClientOriginalExtension();
        if ($request->file('file')->move(storage_path('app/public/product_images/uploads/'), $name)) {

            $image->image = $name;
            $image->save();
        }
    }

    public function delete_images(ProductImage $image)
    {
        unlink(storage_path('/app/public/product_images/uploads/' . $image->image));
        $image->delete();
        Session::flash('success',' با موفقیت حذف شد');
        return redirect()->back();
    }


    public function get_subcategories($id)
    {
        $category = Category::find($id);
        $sub_categories = $category->subcategory()->get();

        return response()->json(['data' => $sub_categories]);
    }



    public function comment(Product $product)
    {
        $comments = $product->comments()->orderBy('id' , 'desc')->get();
        return view('pages.admin.product_comments' , compact('product' , 'comments'));
    }

    public function comment_mark(ProductComment $comment)
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

    public function comment_delete(ProductComment $comment)
    {
        $comment->delete();
        Session::flash('success',' با موفقیت حذف شد');
        return redirect()->back();
    }
}
