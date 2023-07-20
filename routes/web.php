<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/' , [PagesController::class , 'index'])->name('page.index');
Route::get('contact' , [PagesController::class , 'contact'])->name('page.contact');
Route::get('products' , [PagesController::class , 'products'])->name('page.products');
Route::get('products/discount' , [PagesController::class , 'products_discount'])->name('page.products.discount');
Route::get('articles' , [PagesController::class , 'articles'])->name('pages.articles');
Route::get('search' , [PagesController::class , 'search'])->name('pages.search');
Route::get('articles/search' , [PagesController::class , 'search_article'])->name('pages.search.article');

Route::get('categories' , [PagesController::class , 'categories'])->name('pages.categories');
Route::get('brands' , [PagesController::class , 'brands'])->name('pages.brands');
Route::get('categories/{categorySlug}' , [PagesController::class , 'product_category'])->name('pages.product_category');
Route::get('brands/{brandSlug}' , [PagesController::class , 'product_brand'])->name('pages.product_brand');
Route::get('categories/sub-category/{subcategorySlug}' , [PagesController::class , 'product_sub_category'])->name('pages.product_sub_category');

Route::post('/store/email/newsletter' , [PagesController::class , 'store_newsletter'])->name('store.email.newsletter');
Route::post('/store/message' , [\App\Http\Controllers\MessageController::class , 'store'])->name('store.message');

Route::get('products/{productSlug}' , [PagesController::class , 'single_product'])->name('page.single_product');
Route::get('coupon/{couponSlug}' , [PagesController::class , 'single_coupon'])->name('page.single_coupon');
Route::get('articles/{articleSlug}' , [PagesController::class , 'single_article'])->name('page.single_article');
Route::get('articles/category/{articlecategorySlug}' , [PagesController::class , 'single_article_category'])->name('page.single_article_category');

// AJAX
Route::get('product/search/' , [PagesController::class , 'search_product'])->name('search_product');
Route::post('get/sub-categories/' , [PagesController::class , 'search_sub_cats'])->name('sub-categories');


Route::get('wish-list-add/{product}' , [PagesController::class , 'add_wishlist'])->name('add.wishlist')->middleware('auth');
Route::get('wish-list-remove/{product}' , [PagesController::class , 'remove_wishlist'])->name('remove.wishlist')->middleware('auth');
Route::get('wish-list' , [PagesController::class , 'wish_list'])->name('pages.wish_list')->middleware('auth');

Route::post('article/{article}/comment/store' , [\App\Http\Controllers\CommentController::class , 'store_article_comment'])->name('comment.article.store');
Route::post('product/{product}/comment/store' , [\App\Http\Controllers\CommentController::class , 'store_product_comment'])->name('comment.product.store');


//    Cart
Route::middleware('auth')->group(function (){
    Route::get('/shopping-cart' , [PagesController::class , 'shopping_cart'])->name('page.shopping.cart');
    Route::get('/add-to-cart/{product}' , [CartController::class , 'add'])->name('cart.add');
    Route::get('/cart/delete/{itemId}' , [CartController::class , 'delete'])->name('cart.delete');
    Route::get('/cart/clear' , [CartController::class , 'clear'])->name('cart.clear');
    Route::get('/cart/check/coupon' , [CartController::class , 'check_coupon'])->name('cart.check.coupon');
    Route::get('/cart/up/{itemId}' , [CartController::class , 'update_product'])->name('cart.update_product');
    Route::get('/cart/update/{itemId}' , [CartController::class , 'update'])->name('cart.update');
    Route::get('/cart/check-out' , [CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/check-out/cart' , [OrderController::class , 'store'])->name('store.checkout');
});




//User Profile
Route::prefix('profile')->middleware('auth')->group(function () {
    Route::get('dashboard' , [ProfileController::class , 'profile'])->name('profile.profile');
    Route::post('store/{order}/problem' , [ProfileController::class , 'store_problem'])->name('profile.store_problem');
    Route::put('address/update' , [ProfileController::class , 'update_address'])->name('profile.address.update');
    Route::post('/get/order/detail' , [ProfileController::class , 'get_order']);
});


// Admin Section
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');





// Admin Section
Route::prefix('admin')->group(function () {
   Route::get('home' , [AdminController::class , 'dashboard'])->name('admin.home');


//   products
    Route::get('products' , [ProductController::class, 'products'])->name('admin.products');
    Route::get('product/add' , [ProductController::class , 'add'])->name('product.add');
    Route::post('product/store' , [ProductController::class , 'store'])->name('product.store');
    Route::get('product/random/offer' , [ProductController::class , 'random_offer'])->name('product.random.offer');


    Route::get('product/{product}/comments' , [ProductController::class , 'comment'])->name('product.comment');
    Route::get('product/{comment}/comment/mark' , [ProductController::class , 'comment_mark'])->name('product.comment.mark');
    Route::delete('product/{comment}/comment/delete' , [ProductController::class , 'comment_delete'])->name('product.comment.delete');

//  product - brands
    Route::get('/product/brands' , [BrandController::class , 'brands'])->name('product.brand');
    Route::post('/product/brand/store' , [BrandController::class , 'store'])->name('product.brand.store');
    Route::put('/product/{brand}/brand/update' , [BrandController::class , 'update'])->name('product.brand.update');
    Route::delete('/product/{brand}/brand/delete' , [BrandController::class , 'delete'])->name('product.brand.delete');

//    product - category
    Route::get('/product/category' , [CategoryController::class , 'category'])->name('product.category');
    Route::post('/product/category/store' , [CategoryController::class , 'store'])->name('product.category.store');
    Route::put('/product/{category}/category/update' , [CategoryController::class , 'update'])->name('product.category.update');
    Route::delete('/product/{category}/category/delete' , [CategoryController::class , 'delete'])->name('product.category.delete');

//    product - category title
    Route::get('/product/category/titles' , [CategoryController::class , 'category_titles'])->name('product.category.titles');
    Route::post('/product/category/title/store' , [CategoryController::class , 'store_title'])->name('product.category.title.store');
    Route::put('/product/{category}/category/title/update' , [CategoryController::class , 'update_title'])->name('product.category.title.update');
    Route::delete('/product/{category}/category/title/delete' , [CategoryController::class , 'delete_title'])->name('product.category.title.delete');

//    product - sub category
    Route::get('/product/sub-category' , [CategoryController::class , 'sub_category'])->name('product.sub_category');
    Route::post('/product/sub-category/store' , [CategoryController::class , 'store_sub_category'])->name('product.sub_category.store');
    Route::put('/product/{category}/sub-category/update' , [CategoryController::class , 'update_sub_category'])->name('product.sub_category.update');
    Route::delete('/product/{category}/sub-category/delete' , [CategoryController::class , 'delete_sub_category'])->name('product.sub_category.delete');


//    product images
    Route::get('/product/{product}/images' , [ProductController::class , 'product_images'])->name('product.images');
    Route::post('/product/images/store' , [ProductController::class , 'store_images'])->name('product.images.store');
    Route::delete('/product/images/{image}/delete' , [ProductController::class , 'delete_images'])->name('product.images.delete');

    Route::get('get/sub-categories/{id}' , [ProductController::class , 'get_subcategories'])->name('product.get.subcategories');
    Route::get('get/category/titles/{id}' , [CategoryController::class , 'get_category_titles'])->name('category.get.category.title');



//    Orders
    Route::get('orders' , [OrderController::class , 'orders'])->name('admin.orders');
    Route::get('orders/{order}/detail' , [OrderController::class , 'detail'])->name('admin.orders.detail');
    Route::get('orders/{order}/mark' , [OrderController::class , 'mark'])->name('admin.orders.mark');
    Route::delete('orders/{order}/delete' , [OrderController::class , 'delete'])->name('admin.orders.delete');
    Route::put('/order/{order}/update/post-tracking' , [OrderController::class , 'update_post_tracking'])->name('admin.order.update.post.tracking');


    //    Article-Category
    Route::get('category' , [AdminController::class , 'article_category'])->name('admin.article.category');
    Route::post('store/category' , [ArticleController::class , 'store_category'])->name('category.store');
    Route::put('update/{category}/category' , [ArticleController::class , 'update_category'])->name('category.update');
    Route::delete('delete/{category}/category' , [ArticleController::class , 'delete_category'])->name('category.delete');


//    Article
    Route::get('articles' , [AdminController::class , 'articles'])->name('admin.article');
    Route::get('add/article' , [ArticleController::class , 'add'])->name('article.add');
    Route::get('edit/{article}/article' , [ArticleController::class , 'edit'])->name('article.edit');
    Route::post('store/article' , [ArticleController::class , 'store'])->name('article.store');
    Route::put('update/{article}/article' , [ArticleController::class , 'update'])->name('article.update');
    Route::delete('delete/{article}/article' , [ArticleController::class ,  'delete'])->name('article.delete');
    Route::get('article/{article}/comments' , [ArticleController::class , 'comment'])->name('article.comment');
    Route::get('article/{comment}/comment/mark' , [ArticleController::class , 'comment_mark'])->name('article.comment.mark');
    Route::delete('article/{comment}/comment/delete' , [ArticleController::class , 'comment_delete'])->name('article.comment.delete');


    //    offer
    Route::get('/offers' , [AdminController::class , 'offers'])->name('offer.offers');
    Route::post('/offer/store' , [AdminController::class , 'offer_store'])->name('offer.store');
    Route::put('/offer/{offer}/update' , [AdminController::class , 'offer_update'])->name('offer.update');
    Route::delete('/offer/{offer}/delete' , [AdminController::class , 'offer_delete'])->name('offer.delete');


    //    Slider
    Route::get('/slider' , [AdminController::class , 'slider'])->name('slider.slider');
    Route::post('/slider/store' , [AdminController::class , 'slider_store'])->name('slider.store');
    Route::put('/slider/{slider}/update' , [AdminController::class , 'slider_update'])->name('slider.update');
    Route::delete('/slider/{slider}/delete' , [AdminController::class , 'slider_delete'])->name('slider.delete');


//    Shipping
    Route::get('setting/shipping' , [AdminController::class , 'setting_shipping'])->name('admin.setting_shipping');
    Route::get('setting/shipping/update' , [AdminController::class , 'setting_shipping_update'])->name('admin.setting_shipping_update');

    //    newsletter
    Route::get('newsletters' , [AdminController::class , 'newsletter'])->name('admin.newsletter');


//    Problems - مرجوعی
    Route::get('/problems' , [AdminController::class , 'problems'])->name('admin.problems');
    Route::get('/problem/{problem}/marl=k' , [AdminController::class , 'problem_mark'])->name('admin.problems.mark');


    //    Messages
    Route::get('messages' , [AdminController::class , 'messages'])->name('admin.message');
    Route::get('message/{message}/mark' , [\App\Http\Controllers\MessageController::class , 'mark'])->name('admin.message.mark');
    Route::delete('message/{message}/delete' , [\App\Http\Controllers\MessageController::class , 'delete'])->name('admin.message.delete');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
