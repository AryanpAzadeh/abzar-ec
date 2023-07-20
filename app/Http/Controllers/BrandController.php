<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{
    public function brands()
    {
        $brands = Brand::orderBy('id' , 'desc')->get();
        return view('pages.admin.brand' , compact('brands'));
    }

    public function store(BrandRequest $request)
    {
        $validate = $request->validated();
        $b = Brand::create([
            'name' =>  $validate['name']
        ]);
        $name = 'brand-'.$b->id.'.'.$request->file('image')->getClientOriginalExtension();
        if ($request->file('image')->move(storage_path('app/public/brand_images'), $name)) {

            $b->image = $name;
        }
        $b->save();
        Session::flash('success','برند با موفقیت ثبت شد');
        return redirect()->back();
    }

    public function update(BrandRequest $request, Brand $brand)
    {
        $validate= $request->validated();
        $brand->update($validate);
        $brand->slug = SlugService::createSlug(Brand::class, 'slug', $validate['name']);
        if ($request->hasFile('image'))
        {
            $name = 'brand-'.$brand->id.'.'.$request->file('image')->getClientOriginalExtension();
            if ($request->file('image')->move(storage_path('app/public/brand_images'), $name)) {

                $brand->image = $name;
                $brand->save();

            }
        }
        Session::flash('success','برند با موفقیت ویرایش شد');
        return redirect()->back();
    }

    public function delete(Brand $brand)
    {
        unlink(storage_path('/app/public/brand_images/' . $brand->image));
        $brand->delete();
        Session::flash('success','برند با موفقیت حذف شد');
        return redirect()->back();
    }
}
