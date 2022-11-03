@extends('front.layout.master')

@section('title', 'Shop')

@section('body')
<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="index.html"><i class="fa fa-home">Home</i></a>
                    <span>Shop</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Product Shop Section Begin -->
<section class="product-shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-1 products-sidebar-filter">
                <form action="shop">
                    <div class="filter-widget">
                        <h4 class="fw-title">Categories</h4>
                        <ul class="filter-catagories">
                            
                            @foreach($categories as $category)
                                <li><a href="shop/category/{{ $category->name }}">{{ $category->name }}</a></li>
                            @endforeach  

                        </ul>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Brand</h4>
                        <div class="fw-brand-check">

                            @foreach($trademarks as $trademark)
                                <div class="bc-item">
                                    <label for="bc-{{ $trademark->id }}">
                                        {{ $trademark->name }}
                                        <input 
                                            {{ (request("trademark")[$trademark->id] ?? '') == 'on' ? 'checked' : ''}}
                                            type="checkbox" 
                                            id="bc-{{ $trademark->id }}" 
                                            name="trademark[{{ $trademark->id }}]"
                                            onchange="this.form.submit();"
                                            >
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Price</h4>
                        <div class="filter-range-wrap">
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount" name="price_min">
                                    <input type="text" id="maxamount" name="price_max">
                                </div>
                            </div>
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" 
                                data-min="10" data-max="999" data-min-value="{{ str_replace('VNĐ', '', request('price_min')) }}" 
                                data-max-value="{{ str_replace('VNĐ', '', request('price_max')) }}">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                        </div>
                        <button type="submit" class="filter-btn"> Filter</button>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Color</h4>
                        <div class="fw-color-choose">
                            <div class="cs-item">
                                <input type="radio" id="cs-black" name="color" value="black" onchange="this.form.submit();"
                                    {{ request('color') == 'black' ? 'checked' : ''}} >
                                <label for="cs-black" class="cs-black {{ request('color') == 'black' ? 'font-weight-bold' : '' }}">Black</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-violet" name="color" value="violet" onchange="this.form.submit();"
                                    {{ request('color') == 'violet' ? 'checked' : ''}} >
                                <label for="cs-violet" class="cs-violet {{ request('color') == 'violet' ? 'font-weight-bold' : '' }}">Violet</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-blue" name="color" value="blue" onchange="this.form.submit();"
                                    {{ request('color') == 'blue' ? 'checked' : ''}} >
                                <label for="cs-blue" class="cs-blue {{ request('color') == 'blue' ? 'font-weight-bold' : '' }}">Blue</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-yellow" name="color" value="yellow" onchange="this.form.submit();"
                                    {{ request('color') == 'yellow' ? 'checked' : ''}} >
                                <label for="cs-yellow" class="cs-yellow {{ request('color') == 'yellow' ? 'font-weight-bold' : '' }}">Yellow</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-red" name="color" value="red" onchange="this.form.submit();"
                                    {{ request('color') == 'red' ? 'checked' : ''}} >
                                <label for="cs-red" class="cs-red {{ request('color') == 'red' ? 'font-weight-bold' : '' }}">Red</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-green" name="color" value="green" onchange="this.form.submit();"
                                    {{ request('color') == 'green' ? 'checked' : ''}} >
                                <label for="cs-green" class="cs-green {{ request('color') == 'green' ? 'font-weight-bold' : '' }}">Green</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-white" name="color" value="white" onchange="this.form.submit();"
                                    {{ request('color') == 'white' ? 'checked' : ''}} >
                                <label for="cs-white" class="cs-white {{ request('color') == 'white' ? 'font-weight-bold' : '' }}">White</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-pink" name="color" value="pink" onchange="this.form.submit();"
                                    {{ request('color') == 'pink' ? 'checked' : ''}} >
                                <label for="cs-pink" class="cs-pink {{ request('color') == 'pink' ? 'font-weight-bold' : '' }}">Pink</label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Tags</h4>
                        <div class="fw-tags">
                            <a href="#">Towel</a>
                            <a href="#">Shoes</a>
                            <a href="#">Coat</a>
                            <a href="#">Dresses</a>
                            <a href="#">Men's hats</a>
                            <a href="#">Backpack</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-9 order-lg-1 order-lg-2">
                <div class="product-show-option">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <form action="">
                                <div class="select-option">
                                    <select name="sort_by" onchange="this.form.submit();" class="sorting">
                                        <option {{ request('sort_by') ==  'latest' ? 'selected' : ''}} value="latest">Sorting: Latest</option>
                                        <option {{ request('sort_by') ==  'oldest' ? 'selected' : ''}} value="oldest">Sorting: Oldtest</option>
                                        <option {{ request('sort_by') ==  'name-ascending' ? 'selected' : ''}} value="name-ascending">Sorting: Name A-Z</option>
                                        <option {{ request('sort_by') ==  'name-descending' ? 'selected' : ''}} value="name-descending">Sorting: Name Z-A</option>
                                        <option {{ request('sort_by') ==  'price-ascending' ? 'selected' : ''}} value="price-ascending">Sorting: Price Ascending</option>
                                        <option {{ request('sort_by') ==  'price-descending' ? 'selected' : ''}} value="price-descending">Sorting: Price Decrease</option>
                                    </select>
                                    <select name="show" onchange="this.form.submit();" class="p-show">
                                        <option {{ request('show') ==  '3' ? 'selected' : ''}} value="3">Show: 3</option>
                                        <option {{ request('show') ==  '9' ? 'selected' : ''}} value="9">Show: 9</option>
                                        <option {{ request('show') ==  '15' ? 'selected' : ''}} value="15">Show: 15</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-5 col-md-5 text-right">
                        </div>
                    </div>
                </div>
                <div class="product-list">
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-lg-4 col-sm-6">
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="front/img/products/{{ $product->productImages[0]->path }}" alt="">

                                    @if($product->discount !=null)
                                    <div class="sale pp-sale">Sale</div>
                                    @endif

                                    <div class="icon">
                                        <i class="icon_heart_alt"></i>
                                    </div>
                                    <ul>
                                        <li class="w-icon active">
                                            <a href="#" class="icon_bag_alt"></a>
                                        </li>
                                        <li class="quick-view">
                                            <a href="shop/product/{{ $product->id }}">+ Quick View</a>
                                        </li>
                                        <li class="w-icon">
                                            <a href=""><i class="fa fa-random"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">{{ $product->tag }}</div>
                                    <a href="shop/product/{{ $product->id }}">
                                        <h5>{{ $product->name }}</h5>
                                    </a>
                                    <div class="product-price">
                                        @if( $product->discount != null)
                                        ${{ $product->discount }}
                                        <span>{{ $product->price }} VNĐ</span>
                                        @else
                                        {{ $product->price }} VNĐ
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                {{ $products->links() }}
            </div>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->
@endsection