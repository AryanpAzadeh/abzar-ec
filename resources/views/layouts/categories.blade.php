<aside class="header-department">
    <button class="header-department-text department-title">
        <span class="icon"><i class="fal fa-bars"></i></span>
        <span class="text">دسته بندی ها</span>
    </button>
        <nav class="department-nav-menu">
            <button class="sidebar-close"><i class="fas fa-times"></i></button>
            <ul class="nav-menu-list " >
                @foreach(\App\Models\Category::all() as $category)
                    @if(count($category->subcategory) > 0)
                        <li>
                            <a href="{{route('pages.product_category' , $category->slug)}}" class="nav-link has-megamenu">
                                            <span class="menu-icon"><img
                                                    src="{{asset('/storage/category_images/' . $category->image)}}"
                                                    alt="{{$category->name}}"></span>
                                <span class="menu-text">{{$category->name}}</span>
                            </a>
                            <div class="department-megamenu">
                                <div class="department-megamenu-wrap">

                                    <div class="department-submenu-wrap">
                                        @foreach($category->categorytitle()->get() as $c_title)
                                            <div class="department-submenu">
                                                <h3 class="submenu-heading">{{$c_title->title}}</h3>

                                                <ul>
                                                    @foreach(\App\Models\SubCategory::where([['categorytitle_id' , $c_title->id]])->get() as $c_sub)
                                                        <li><a href="{{route('pages.product_sub_category' , $c_sub->slug)}}">{{$c_sub->name}}</a>
                                                        </li>
                                                    @endforeach


                                                </ul>

                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="featured-product">
                                        <h3 class="featured-heading">پیشنهاد ها</h3>
                                        <div class="product-list">
                                            @foreach(\App\Models\Offer::latest()->get() as $offer)
                                                <div class="item-product">
                                                    <a href="{{$offer->link}}"><img
                                                            src="{{asset('/storage/offer_images/' . $offer->image)}}"
                                                            alt="{{$offer->name}}"></a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @else
                        <li>
                            <a href="{{route('pages.product_category' , $category->slug)}}" class="nav-link">
                                            <span class="menu-icon"><img
                                                    src="{{asset('/storage/category_images/' . $category->image)}}"
                                                    alt="{{$category->name}}"></span>
                                <span class="menu-text">{{$category->name}}</span>
                            </a>
                        </li>
                    @endif
                @endforeach


            </ul>
        </nav>


</aside>
