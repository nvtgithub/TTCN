@extends('front.layout.master')

@section('title', 'My contact')

@section('body')
<!-- Shopping Cart Section Begin -->
<div class="checkout-section spad">
  <div class="container">
    <form method="" class="edit-profile">
      <div class="d-flex justify-content-center">

        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id ?? '' }}">
        <fieldset id="users-profile-core" class="com-users-profile__core">
          <legend>Thông tin cá nhân</legend>
          <dl class="dl-horizontal row">
            <dt class="col-sm-3"> Họ và tên </dt>
            <dd class="col-sm-9"> {{ Auth::user()->name ?? '' }} </dd>
            <dt class="col-sm-3">Tên công ty</dt>
            <dd class="col-sm-9">{{ Auth::user()->company_name ?? '' }}</dd>
            <dt class="col-sm-3">Đất nước</dt>
            <dd class="col-sm-9">{{ Auth::user()->country ?? '' }}</dd>
            <dt class="col-sm-3">Địa chỉ</dt>
            <dd class="col-sm-9">{{ Auth::user()->street_address ?? '' }}</dd>
            <dt class="col-sm-3">Mã bưu điện / ZIP</dt>
            <dd class="col-sm-9">{{ Auth::user()->postcode_zip ?? '' }}</dd>
            <dt class="col-sm-3">Tỉnh / Thành phố</dt>
            <dd class="col-sm-9">{{ Auth::user()->town_city ?? '' }}</dd>
            <dt class="col-sm-3">Địa chỉ email</dt>
            <dd class="col-sm-9">{{ Auth::user()->email ?? '' }}</dd>
            <dt class="col-sm-3">Số điện thoại</dt>
            <dd class="col-sm-9">{{ Auth::user()->phone ?? '' }}</dd>
          </dl>
          <div class="btn-edit-profile">
            <div class="order-btn">
              <a href="/account/my-contact/contactuser/{{ Auth::user()->id }}/edit" class="site-btn place-btn">CHỈNH SỬA THÔNG TIN CÁ NHÂN</a>
            </div>
          </div>
        </fieldset>

        <!-- <div class="col-lg-12">
              <label for="fir">Họ và tên</label>
              <input readonly name="first_name" type="text" id="fir" value="{{ Auth::user()->name ?? '' }}">
            </div> -->
        <!-- <div class="col-lg-12">
              <label for="cun-name">Tên công ty</label>
              <input readonly name="company_name" type="text" id="cun-name" value="{{ Auth::user()->company_name ?? '' }}">
            </div> -->
        <!-- <div class="col-lg-12">
              <label for="cun">Đất nước</label>
              <input readonly name="country" type="text" id="cun" value="{{ Auth::user()->country ?? '' }}">
            </div>
            <div class="col-lg-12">
              <label for="street">Địa chỉ</label>
              <input readonly name="street_address" type="text" id="street" class="street-first" value="{{ Auth::user()->street_address ?? '' }}">
            </div> -->
        <!-- <div class="col-lg-12">
              <label for="zip"></label>
              <input readonly name="postcode_zip" type="text" id="zip" value="{{ Auth::user()->postcode_zip ?? '' }}">
            </div>
            <div class="col-lg-12">
              <label for="town">Tỉnh / Thành phố</label>
              <input readonly name="town_city" type="text" id="town" value="{{ Auth::user()->town_city ?? '' }}">
            </div>
            <div class="col-lg-6">
              <label for="email">Địa chỉ email</label>
              <input readonly name="email" type="text" id="email" value="{{ Auth::user()->email ?? '' }}">
            </div>
            <div class="col-lg-6">
              <label for="phone">Số điện thoại</label>
              <input readonly name="phone" type="text" id="phone" value="{{ Auth::user()->phone ?? '' }}">
            </div> -->

      </div>
    </form>
  </div>
</div>
<!-- Shopping Cart Section End -->
@endsection