@extends('layouts.master')

@section('content')
    <div class="axil-wishlist-area axil-section-gap">
        <div class="container">
            <div class="product-table-heading">
                <h4 class="title">لیست علاقه مندی های من در اینجا</h4>
            </div>
            <div class="table-responsive">
                <table class="table axil-product-table axil-wishlist-table">
                    <thead>
                    <tr>
                        <th scope="col" class="product-remove"></th>
                        <th scope="col" class="product-thumbnail">محصول</th>
                        <th scope="col" class="product-title"></th>
                        <th scope="col" class="product-discount"></th>
                        <th scope="col" class="product-price"> قیمت</th>
                        <th scope="col" class="product-add-cart"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($lists as $list)
                            <tr>
                                <td class="product-remove"><a href="{{route('remove.wishlist' , $list->id)}}" class="remove-wishlist"><i
                                            class="fal fa-times"></i></a></td>
                                <td class="product-thumbnail"><a href="{{route('page.single_product' , $list->slug)}}"><img
                                            src="{{asset('/storage/product_images/' . $list->image)}}"
                                            alt="{{$list->title}}"></a></td>
                                <td class="product-title"><a href="{{route('page.single_product' , $list->slug)}}">{{$list->title}}</a> </td>
                                <td class="product-discount" data-title="تخفیف">@if($list->discount)
                                        {{$list->discount}}% تخفیف
                                    @else
                                                                                   &nbsp;
                                    @endif</td>
                                <td class="product-price" data-title="قیمت">{{$list->discount ? number_format($list->price - ($list->price * $list->discount / 100) , null , '٬') : number_format($list->price , null , '٬')}} <span
                                        class="currency-symbol">تومان</span></td>
                                <td class="product-add-cart">
                                    <form action="{{route('cart.add' , $list->id)}}" method="get" id="add_cart">
                                        <!-- Start Quentity Action  -->
                                        <input type="hidden" name="quantity" value="1" min="1">
                                        <!-- End Quentity Action  -->
                                    </form>

                                    <a href="{{route('cart.add' , $list->id)}}" onclick="event.preventDefault();
                                                document.getElementById('add_cart').submit();" class="axil-btn btn-outline">اضافه به
                                        سبد خرید</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
