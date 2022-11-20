@extends('front.layout.master')

@section('title', 'Favorite')

@section('body')
<!-- Shopping Cart Section Begin -->
<section class="product-shop spad">
  <div class="container">
    <div class="product-list">
      <div class="row" id="favorite">

      </div>
    </div>
  </div>
</section>
<!-- Shopping Cart Section End -->

@endsection

<script>
  function views() {
    if (localStorage.getItem('data') != null) {
      var data = JSON.parse(localStorage.getItem('data'));
      data.reverse();
      for (var i = 0; i < data.length; i++) {
        var id = data[i].id;
        var name = data[i].name;
        var price = data[i].price;
        var image = data[i].image;
        var url = data[i].url;

        // var item =
          '<div class="col-lg-3 col-sm-6">' +
          '<div class="product-item item">' +
          '  <div class="pi-pic">' +
          '     <img id="wishlist_productimage' + id + '" src="' + image + '" alt="">' +
          '<div class="icon">' +
          '<button type="" style="outline: none;" class="button-wishlist" id="' + id + '" onclick="remove_wishlist(this.id)">' +
          '<i class="ti-close"></i>' +
          '</button>' +
          '</div>' +
          '    <ul>' +
          '      <li class="w-icon active">' +
          '        <a href="javascript:addCart(' + id + ')"><i class="icon_bag_alt"></i></a>' +
          '      </li>' +
          '      <li class="quick-view">' +
          '        <a href="' + url + '">+ Chi tiết sản phẩm</a>' +
          '      </li>' +
          '      <li class="w-icon d-none">' +
          '        <a href=""><i class="fa fa-random"></i></a>' +
          '      </li>' +
          '    </ul>' +
          '  </div>' +
          '  <div class="pi-text">' +
          '    <a id="wishlist_producturl' + id + '" href="shop/product/' + id + '">' +
          '      <h5>' + name + '</h5>'+
          '      <input type="hidden" name="" value="' + name + '" id="wishlist_productname' + id + '">' +
          '    </a>' +
          '    <div class="product-price">' +
          '      ' + price + ' VNĐ' +
          '      <input type="hidden" name="" value="' + price + ' VNĐ" id="wishlist_productprice' + id + '">' +
          '    </div>' +
          '  </div>' +
          ' </div>' +
          ' </div>';


        // $("#favorite").append('<div class="row" style="margin:10px 0; max-height: 100px;"><div class="col-md-4"><img src="' + image + '" class="width:100%;"></div><div class="col-md-8 info_wishlist"><p>' + name + '</p><p style="color:#e7ab3c">' + price + '</p><button type="" style="outline: none;" class="button-wishlist " id="' + id + '" onclick="remove_wishlist(this.id)"><i class="icon_heart_alt"></i></button><a href="' + url + '">Xem</a></div></div>');
        $("#favorite").append('<p>a</p>');
      }
    }
  }
  views();
</script>