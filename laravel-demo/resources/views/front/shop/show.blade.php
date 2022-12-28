@extends('front.layout.master')

@section('title', 'Product')

@section('script')
<script src="front/js/cart.js"></script>
@endsection

@section('body')
<!-- Product Shop Section Begin -->
<section class="product-shop spad page-details">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 product-shop-filter">

        @include('front.shop.components.products-sidebar-filter')

      </div>
      <div class="col-lg-9">
        <div class="row">
          <div class="col-lg-6">
            <div class="product-pic-zoom">
              <img class="product-big-img" src="front/img/products/{{$product->productImages[0]->path ?? ''}}" alt="">
              <div class="zoom-icon">
                <i class="fa fa-search-plus"> </i>
              </div>
            </div>
            <div class="product-thumbs">
              <div class="product-thumbs-track ps-slider owl-carousel gallery-detali-product">
                @foreach($product->productImages as $productImage)
                <div class="pt active" data-imgbigurl="front/img/products/{{ $productImage->path }}">
                  <img src="front/img/products/{{ $productImage->path }}" alt="">
                </div>
                @endforeach
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="product-details">
              <div class="pd-title">
                <span class="d-none">{{ $product->tag }}</span>
                <h3>{{ $product->name }}
                  <span class="ml-1" id="product-color"></span>
                </h3>

              </div>
              <div class="pd-rating">
                <div class="p-code">Sku : {{ $product->sku }} </div>
                <div>
                  @for($i = 1; $i<=5; $i++) @if( $i <=$product->avgRating )
                    <i class="fa fa-star"></i>
                    @else
                    <i class="fa fa-star-o"></i>
                    @endif
                    @endfor
                    <span>({{ count($product->productComments)}} đánh giá)</span>
                </div>

              </div>
              <div class="pd-desc">

                @if($product->discount != null)
                <h4>{{ number_format($product->discount, 0, '.', '.') }} VNĐ <span>{{ number_format($product->price, 0, '.', '.') }} VNĐ</span></h4>
                @else
                <h4>{{ number_format($product->price, 0, '.', '.') }} ₫</h4>
                @endif

              </div>
              <div class="pd-color {{$product->qty == 0 ? 'd-none':''}}">
                <h6>Màu sắc</h6>
                <div id="choose-color" class="pd-color-choose">
                  @foreach($product->productDetails->toArray() as $productColor)
                  <div class="cc-item">
                    <input type="radio" name="color" data-color-qty="{{ $productColor['qty'] }}" data-color-name="{{ $productColor['color'] }}" id="cc-{{ $productColor['color'] }}" value="{{$productColor['id']}}">
                    <label for="cc-{{ $productColor['color'] }}" class="{{$productColor['qty']==0 ? 'd-none': ''}} cc-{{ $productColor['color'] }}" data-value="{{ $productColor['color'] }}" data-inwptooltip="{{ $productColor['color'] }}" style="background: {{$productColor['color_code']}}"></label>
                  </div>
                  @endforeach
                </div>
              </div>
              <div class="pd-color">
                <h6>Trạng thái: @if ($product->qty == 0) <span class="ml-4" style="color: red;">Hết hàng</span> @else <span class="ml-4" style="color: #636363;">Còn hàng</span> @endif
                </h6>
              </div>

              <div class="pd-color {{$product->qty == 0 ? 'd-none':''}}">
                <h6>Số lượng: <span class="ml-4" style="color: #636363;" id="product-color-qty"></span></h6>

              </div>

              <div class="quantity">
                <button data-product-id="{{ $product->id }}" class="primary-btn pd-cart {{$product->qty == 0 ? 'd-none':''}}" id="add-to-cart">
                  Thêm vào giỏ hàng
                </button>
              </div>
              <ul class="pd-tags">
                <li><span>Loại sản phẩm</span>: {{ $product->productCategory->name }}</li>
                <li><span>TAGS</span>: {{ $product->tag }}</li>
              </ul>
              <div class="pd-share">
                <a title="Thêm vào yêu thích" class="heart-icon button-wishlist" id="{{$product->id}}" onclick="add_wishlist(this.id)">
                  <i class="icon_heart_alt mr-2"></i> Thêm vào mục yêu thích
                </a>

                <div class="pd-social">
                  <a href=""><i class="ti-facebook"></i></a>
                  <a href=""><i class="ti-twitter"></i></a>
                  <a href=""><i class="ti-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="product-tab">
          <div class="tab-item">
            <ul class="nav row" role="tablist">
              <li class="col-12 col-md-3">
                <a class="active" href="#tab-1" data-toggle="tab" role="tab">MÔ TẢ SẢN PHẨM</a>
              </li>
              <li class="col-12 col-md-5">
                <a href="#tab-2" data-toggle="tab" role="tab">THÔNG SỐ KỸ THUẬT</a>
              </li>
              <li class="col-12 col-md-4">
                <a href="#tab-3" data-toggle="tab" role="tab">Phản hồi của khách hàng ({{ count($product->productComments) }})</a>
              </li>
            </ul>
          </div>
          <div class="tab-item-content">
            <div class="tab-content">
              <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                <div class="product-content">
                  {!! $product->description !!}
                </div>
              </div>
              <div class="tab-pane fade" id="tab-2" role="tabpanel">
                <div class="specification-table">

                  {!! $product->content !!}
                </div>
              </div>
              <div class="tab-pane fade" id="tab-3" role="tabpanel">
                <div class="customer-review-option">
                  <h4>{{ count($product->productcomments ) }} Comments</h4>
                  <div class="comment-option">

                    @foreach($product->productComments as $productComment)
                    <div class="co-item">
                      <div class="avatar-pic">
                        <img src="front/img/users/{{ $productComment->user->avatar ?? 'default-avatar.png' }}" alt="">
                      </div>
                      <div class="avatar-text">
                        <div class="at-rating">

                          @for($i =1; $i<=5; $i++) @if($i <=$productComment->rating)
                            <i class="fa fa-star"></i>
                            @else
                            <i class="fa fa-star-o"></i>
                            @endif
                            @endfor
                        </div>
                        <h5>{{ $productComment->name }}<span>{{ date('M d,y', strtotime($productComment->created_at)) }}</span></h5>
                        <div class="at-reply">{{ $productComment->messages  }}</div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                  <div class="leave-comment">
                    <h4>Đề lại bình luận</h4>
                    <form action="" method="post" class="comment-form">
                      @csrf
                      <input type="hidden" name="product_id" value="{{ $product->id }}">
                      <input type="hidden" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::user()->id ?? null }}">

                      <div class="row">
                        <div class="col-lg-6">
                          <input required type="text" placeholder="Tên" name="name" value="{{ Auth::user()->name ?? '' }}">
                        </div>
                        <div class="col-lg-6">
                          <input required type="text" placeholder="Email" name="email" value="{{ Auth::user()->email ?? '' }}">
                        </div>
                        <div class="col-lg-12">
                          <textarea required placeholder="Bình luận ..." name="messages"></textarea>
                          <div class="personal-rating">
                            <h6>Đánh giá của bạn</h6>
                            <div class="rate">
                              <input type="radio" id="star5" name="rating" value="5" />
                              <label for="star5" title="text">5 sao</label>
                              <input type="radio" id="star4" name="rating" value="4" />
                              <label for="star4" title="text">4 sao</label>
                              <input type="radio" id="star3" name="rating" value="3" />
                              <label for="star3" title="text">3 sao</label>
                              <input type="radio" id="star2" name="rating" value="2" />
                              <label for="star2" title="text">2 sao</label>
                              <input required type="radio" id="star1" name="rating" value="1" />
                              <label for="star1" title="text">1 sao</label>
                            </div>
                          </div>
                          <button type="submit" class="site-btn">Gửi bình luận</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Product Shop Section End -->

<!-- Related Products Section Begin -->
<div class="related-products spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-title">
          <h2>Các sản phẩm liên quan</h2>
        </div>
      </div>
    </div>
    <div class="row">

      @foreach($relatedProducts as $product)
      <div class="col-lg-3 col-sm-6">
        @include('front.components.product-item')
      </div>
      @endforeach

    </div>
  </div>
</div>
<!-- Related Products Section End -->


@endsection