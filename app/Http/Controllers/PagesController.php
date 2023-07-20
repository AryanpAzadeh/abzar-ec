<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Brand;
use App\Models\Category;
use App\Models\CategoryTitle;
use App\Models\Coupon;
use App\Models\Newsletter;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;
use function PHPUnit\Framework\isEmpty;
use function Psy\debug;

class PagesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $offers = Product::where('offer' , 1)->get();
        $products = Product::latest()->take(12)->get();
        $random_product = Product::inRandomOrder()->first();
        $articles = Article::latest()->take(6)->get();
        $sliders = Slider::latest()->get();
        return view('pages.index' , compact('categories' , 'offers' , 'products' , 'articles' , 'random_product' , 'sliders'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function categories()
    {
        $categories = Category::all();
        return view('pages.categories' , compact('categories'));
    }

    public function brands()
    {
        $brands = Brand::all();
        return view('pages.brands' , compact('brands'));
    }

    public function articles()
    {
        $articles = Article::latest()->paginate(4);
        $categories = ArticleCategory::all();
        return view('pages.blog' , compact('articles' , 'categories'));
    }

    public function single_article_category(ArticleCategory $category)
    {
        $articles = $category->articles()->latest()->paginate(4);
        $categories = ArticleCategory::all();
        return view('pages.article_category' , compact('articles' , 'categories' , 'category'));
    }

    public function search_article(Request $request)
    {
        $s = $request->s;
        $articles = Article::search($s)->paginate(4);
        $categories = ArticleCategory::all();

        return view('pages.article_search' , compact('articles' , 'categories' , 's'));
    }

    public function product_brand(Brand $brand)
    {
        $cat = [];
        $bra = [];
        $sub_cat = [];

        $sub_categories = [];
        $products = $brand->products()->paginate(9);
        $categories = Category::all();
        $brands = Brand::all();
        return view('pages.product_brand', compact('products', 'brands', 'categories' , 'cat' , 'bra' , 'sub_categories' , 'sub_cat' , 'brand'));
    }

    public function product_category(Category $category)
    {
        $cat = [];
        $bra = [];
        $sub_cat = [];

        $sub_categories = [];
        $products = $category->products()->paginate(9);
        $categories = Category::all();
        $brands = Brand::all();
        return view('pages.product_category', compact('products', 'brands', 'categories' , 'cat' , 'bra' , 'sub_categories' , 'sub_cat' , 'category'));
    }

    public function product_sub_category(SubCategory $category)
    {
        $cat = [];
        $bra = [];
        $sub_cat = [];

        $sub_categories = [];
        $products = $category->products()->paginate(9);
        $categories = Category::all();
        $brands = Brand::all();
        return view('pages.product_sub_category', compact('products', 'brands', 'categories' , 'cat' , 'bra' , 'sub_categories' , 'sub_cat' , 'category'));
    }

    public function shopping_cart()
    {
        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'shipping',
            'type' => 'shipping',
            'target' => 'total', // this condition will be applied to cart's subtotal when getSubTotal() is called.
            'value' => Setting::first()->value,

        ));
        $items = \Cart::session(auth()->id())->condition($condition)->getContent();
//        dd(\Cart::session(auth()->id())->getConditions()->count());
        return view('pages.cart' , compact('items'));
    }

    public function products()
    {
        $cat = [];
        $bra = [];
        $sub_cat = [];

        $sub_categories = [];
        $products = Product::latest()->paginate(9);
        $categories = Category::all();
        $brands = Brand::all();
        return view('pages.products', compact('products', 'brands', 'categories' , 'cat' , 'bra' , 'sub_categories' , 'sub_cat'));
    }
    public function products_discount()
    {
        $cat = [];
        $bra = [];
        $sub_cat = [];

        $sub_categories = [];
        $products = Product::where('discount' , '!=' , null)->latest()->paginate(9);
        $categories = Category::all();
        $brands = Brand::all();
        return view('pages.products_discount', compact('products', 'brands', 'categories' , 'cat' , 'bra' , 'sub_categories' , 'sub_cat'));
    }

    public function search(Request $request)
    {
        $cat = [];
        $bra = [];
        $sub_cat = [];
        $s = $request->search;

        $sub_categories = [];
        $products = Product::search($request->search)->paginate(9);
        $categories = Category::all();
        $brands = Brand::all();
        return view('pages.products_search', compact('products', 'brands', 'categories' , 'cat' , 'bra' , 'sub_categories' , 'sub_cat' , 's'));
    }

    public function single_product(Product $product)
    {
        $comments = $product->comments()->where('active' , 1)->orderBy('id' , 'desc')->get();
        return view('pages.single_product', compact('product' , 'comments'));
    }

    public function single_article(Article $article)
    {
        $categories = ArticleCategory::all();
        $comments = $article->comments()->where('active' , 1)->orderBy('id' , 'desc')->get();
        return view('pages.single_article' , compact('article' , 'categories' , 'comments'));
    }

    public function single_coupon(Coupon $coupon)
    {

        return view('pages.single_coupon', compact('coupon'));
    }


    public function search_product(Request $request)
    {


        $cat = [];
        $bra = [];
        $products = [];
        $sub_cat = [];

        if ($request->exists('sub_cat') && $bra == null && $cat == null)
        {
            $sub_cat = $request->sub_cat;
            $products = Product::whereIn('sub_category_id', $sub_cat)->orderBy('id' , 'desc')->paginate(9);

        }

        $sub_categories = [];
        $categories = Category::all();
        $brands = Brand::all();
        if ($request->cat )
        {
            $cat = $request->cat;
            if ($sub_cat == null)
            {
                $sub_categories = SubCategory::whereIn('category_id' , $cat)->get();
            }
            $products = Product::whereIn('category_id', $cat)->orderBy('id' , 'desc')->paginate(9);
        }
        if ($request->brand)
        {
            $bra = $request->brand;
            $products = Product::whereIn('brand_id', $bra)->orderBy('id' , 'desc')->paginate(9);
        }

        if ($request->cat && $request->brand)
        {
            $cat = $request->cat;
            $sub_categories = SubCategory::whereIn('category_id' , $cat)->get();
            $bra = $request->brand;
            $products = Product::whereIn('category_id', $cat)->whereIn('brand_id' , $bra)->orderBy('id' , 'desc')->paginate(9);
        }

        if ($request->cat && $sub_cat != null)
        {

            $cat = $request->cat;

                $sub_categories = SubCategory::whereIn('category_id' , $cat)->get();

            $products = Product::whereIn('category_id', $cat)->whereIn('sub_category_id' , $sub_cat)->orderBy('id' , 'desc')->paginate(9);
        }

        if ($request->cat && $request->brand && $sub_cat != null)
        {
            $cat = $request->cat;
                $sub_categories = SubCategory::whereIn('category_id' , $cat)->get();
            $bra = $request->brand;
            $products = Product::whereIn('category_id', $cat)->whereIn('brand_id' , $bra)->whereIn('sub_category_id' , $sub_cat)->orderBy('id' , 'desc')->paginate(9);
        }
        if ($bra == null && $cat == null && $sub_cat == null)
        {
            $products = Product::orderBy('id', 'desc')->paginate(9);

        }

        return view('pages.products', compact('products', 'brands', 'categories' , 'cat' , 'bra' , 'sub_categories' , 'sub_cat'));
    }

    public function search_sub_cats(Request $request)
    {
        $c = $request->cats;
        $sub_cat = $request->sub_cat;
        $subs = SubCategory::whereIn('category_id' , $c)->get();
        $data = '';
        if ($request->ajax()) {
            foreach ($subs as $sub) {
                if (in_array($sub->id, (array)$sub_cat))
                {
                    $data .= '
                <li class="subs">

                                                <input checked type="checkbox" value="'.$sub->id.'"
                                                        id="radio-sub-'.$sub->id.'" name="sub_cat[]">
                                                <label for="radio-sub-'.$sub->id.'">'.$sub->name.'</label>
                                            </li>

                ';
                }
                else
                {
                    $data .= '
                <li class="subs">

                                                <input type="checkbox" value="'.$sub->id.'"
                                                        id="radio-sub-'.$sub->id.'" name="sub_cat[]">
                                                <label for="radio-sub-'.$sub->id.'">'.$sub->name.'</label>
                                            </li>

                ';
                }

            }
            return $data;
        }
    }

    public function wish_list()
    {
        $user = auth()->user();
        $lists = $user->wishes();
        return view('pages.wish_list' , compact('lists'));
    }


    public function add_wishlist(Product $product)
    {
        $user = auth()->user();
        $user->wish($product);
        return redirect()->back();
    }

    public function remove_wishlist(Product $product)
    {
        $user = auth()->user();
        $user->unwish($product);
        return redirect()->back();
    }


    public function store_newsletter(Request $request)
    {
        \Validator::validate($request->all() , [
            'email' => 'email', 'max:255', 'unique:'.Newsletter::class
        ]);
        Newsletter::create([
           'email' =>  $request->email
        ]);
        Session::flash('success',' با موفقیت انجام شد');
        return redirect()->back();
    }


//    public function search_product( Request $request)
//    {
//
//        $c = $request->cats;
//
//
//        $products = Product::whereIn('category_id', $c)->get();
//
//        $data = '';
//        if ($request->ajax()) {
//            foreach ($products as $product) {
//
//                $data .= '
//                            <div class="col-xl-4 col-lg-4 col-sm-6 first">
//                                <div class="axil-product product-style-one has-color-pick mt--40">
//                                    <div class="thumbnail">
//                                        <a href="' . route('page.single_product', $product->slug) . '">
//                                            <img src="' . asset('/storage/product_images/' . $product->image) . '"
//                                                 alt="Product Images">
//                                        </a>';
//
//                if($product->discount)
//                {
//                    $data .= ' <div class="label-block label-right">
//                                                <div class="product-badget">'.$product->discount.'% تخفیف</div>
//                                            </div>';
//                }
//                $data .= '
//
//                </div>
//                                    <div class="product-content">
//                                        <div class="inner">
//                                            <h5 class="title"><a href="' . route('page.single_product', $product->slug) . '">' . $product->title . '</a></h5>
//
//                                         <div class="product-price-variant">';
//
//                                                if($product->discount)
//                                                {
//                                                    $data .= '<span class="price current-price">'.number_format($product->price - ($product->price * $product->discount / 100) , null , '٬').' تومانء </span>
//                                                    <span class="price old-price">'.number_format($product->price , null , '٬').'</span>';
//                                                }
//                                                else
//                                                {
//                                                    $data .= '
//                                                    <span class="price current-price">'.number_format($product->price , null , '٬').' تومانء </span>
//                                                    ';
//                                                }
//
//                $data .= '
//                                            </div>
//
//                                        </div>
//                                    </div>
//                                </div>
//                            </div>';
//
//
//
//            }
//
//
//        }
//        return $data;
//
//
//
//    }




}
