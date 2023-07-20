<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/profile/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });

        Route::bind('productSlug',function ($value){
            return Product::where('slug' , $value )->firstOrFail();
        });
        Route::bind('articleSlug',function ($value){
            return Article::where('slug' , $value )->firstOrFail();
        });
        Route::bind('categorySlug',function ($value){
            return Category::where('slug' , $value )->firstOrFail();
        });
        Route::bind('articlecategorySlug',function ($value){
            return ArticleCategory::where('slug' , $value )->firstOrFail();
        });
        Route::bind('brandSlug',function ($value){
            return Brand::where('slug' , $value )->firstOrFail();
        });
        Route::bind('subcategorySlug',function ($value){
            return SubCategory::where('slug' , $value )->firstOrFail();
        });
        Route::bind('couponSlug',function ($value){
            return Coupon::where('slug' , $value )->firstOrFail();
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
