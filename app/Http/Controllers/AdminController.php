<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Message;
use App\Models\Newsletter;
use App\Models\Offer;
use App\Models\Problem;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('pages.admin.dashboard');
    }

    public function newsletter()
    {
        $news = Newsletter::all();
        return view('pages.admin.newsletter' , compact('news'));
    }

    public function messages()
    {
        $messages = Message::latest()->get();
        return view('pages.admin.message' , compact('messages'));
    }

    public function problems()
    {
        $problems = Problem::latest()->get();
        return view('pages.admin.problem' , compact('problems'));
    }

    public function problem_mark(Problem $problem)
    {
        $problem->is_read = 1;
        $problem->save();
        Session::flash('success',' با موفقیت انجام شد');
        return redirect()->back();
    }



    public function article_category()
    {
        $categories = ArticleCategory::all();
        return view('pages.admin.article_category' , compact('categories'));
    }

    public function articles()
    {
        $articles = Article::latest()->get();
        return view('pages.admin.article' , compact('articles'));
    }

//    Offers
    public function offers()
    {
        $offers = Offer::latest()->get();
        return view('pages.admin.offers' , compact('offers'));
    }

    public function offer_store(Request $request)
    {
        \Validator::validate($request->all() , [
           'image' => 'mimes:webp,png,jpg,jpeg'
        ]);
        $offer = Offer::create([
            'name' => $request->name,
            'link' => $request->link,
        ]);

        $name = 'offer-'.$offer->id.'.'.$request->file('image')->getClientOriginalExtension();
        if ($request->file('image')->move(storage_path('app/public/offer_images'), $name)) {

            $offer->image = $name;
        }
        $offer->save();
        Session::flash('success',' با موفقیت انجام شد');
        return redirect()->back();
    }

    public function offer_update(Request $request , Offer $offer)
    {
        \Validator::validate($request->all() , [
            'image' => 'mimes:webp,png,jpg,jpeg'
        ]);
        $offer->update($request->all());
        if ($request->hasFile('image'))
        {
            $name = 'offer-'.$offer->id.'.'.$request->file('image')->getClientOriginalExtension();
            if ($request->file('image')->move(storage_path('app/public/offer_images'), $name)) {

                $offer->image = $name;
                $offer->save();
            }
        }
        Session::flash('success',' با موفقیت انجام شد');
        return redirect()->back();
    }

    public function offer_delete(Offer $offer)
    {
        unlink(storage_path('/app/public/offer_images/' . $offer->image));
        $offer->delete();
        Session::flash('success',' با موفقیت حذف شد');
        return redirect()->back();
    }


//    Slider
    public function slider()
    {
        $sliders = Slider::latest()->get();
        return view('pages.admin.slider' , compact('sliders'));
    }

    public function slider_store(Request $request)
    {
        \Validator::validate($request->all() , [
            'image' => 'mimes:webp,png,jpg,jpeg'
        ]);
        $slider = Slider::create([
            'title' => $request->title,
            'link_title' => $request->link_title,
            'link' => $request->link,
        ]);

        $name = 'slider-'.$slider->id.'.'.$request->file('image')->getClientOriginalExtension();
        if ($request->file('image')->move(storage_path('app/public/slider_images'), $name)) {

            $slider->image = $name;
        }
        $slider->save();
        Session::flash('success',' با موفقیت انجام شد');
        return redirect()->back();
    }

    public function slider_update(Request $request , Slider $slider)
    {
        \Validator::validate($request->all() , [
            'image' => 'mimes:webp,png,jpg,jpeg'
        ]);
        $slider->update($request->all());
        if ($request->hasFile('image'))
        {
            $name = 'slider-'.$slider->id.'.'.$request->file('image')->getClientOriginalExtension();
            if ($request->file('image')->move(storage_path('app/public/slider_images'), $name)) {

                $slider->image = $name;
                $slider->save();
            }
        }
        Session::flash('success',' با موفقیت انجام شد');
        return redirect()->back();
    }

    public function slider_delete(Slider $slider)
    {
        unlink(storage_path('/app/public/sldier_images/' . $slider->image));
        $slider->delete();
        Session::flash('success',' با موفقیت حذف شد');
        return redirect()->back();
    }


    public function setting_shipping()
    {
        return view('pages.admin.shipping');
    }

    public function setting_shipping_update(Request $request)
    {
        $setting = Setting::first();
        $setting->update([
           'value' =>  $request->value
        ]);
        $setting->save();
        Session::flash('success',' با موفقیت انجام شد');
        return redirect()->back();
    }
}
