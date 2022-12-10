@extends('admin.layout.master')

@section('title', 'Decoration')

@section('body')

<!-- Main -->
<div class="app-main__inner">
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
        </div>
        <div>
          Trang trí shop
          <div class="page-title-subheading">
            <!-- Xem chi tiết, tạo mới, cập nhật, xóa và quản lý. -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="main-card mb-3 card">
        <div class="card-body">
          <form method="post" action="/admin/decoration/{{ $decoration->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @include('admin.components.notification')

            <div class="position-relative row form-group">
              <label for="level" class="col-md-3 text-md-right col-form-label">Danh mục</label>
              <div class="col-md-9 col-xl-8">
                <select required name="category" id="select_category" class="form-control decor">
                  @foreach($categories as $category)
                  <option value="{{ $category->name }}" {{ $decoration->category_name ==  $category->name ? 'selected' : '' }}>
                    {{ $category->name }}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="position-relative row form-group">
              <label for="image" class="col-md-3 text-md-right col-form-label">Hình ảnh</label>
              <div class="col-md-9 col-xl-8 image-banner">
                <img style="cursor: pointer;" class="thumbnail" data-toggle="tooltip" title="Click để chọn hình ảnh" data-placement="bottom" src="front/img/banner/{{ $decoration->image == null ? 'default-image.jpg' : $decoration->image }}" alt="Avatar">
                <input name="image" type="file" onchange="changeImg(this)" class="image form-control-file" style="display: none;" value="">
                <input type="hidden" name="image_old" value="{{ $decoration->image }}">
                <small class="form-text text-muted">
                  {{ $decoration->location == 1 ? 'Kích thước khuyến khích nhất 1920 x 725 (px)' :'' }}
                  {{ $decoration->location == 2 ? 'Kích thước khuyến khích nhất 570 x 380 (px)' :'' }}
                </small>
              </div>
            </div>

            <div class="position-relative row form-group {{ $decoration->location == 2 ? 'd-none' :'' }}">
              <label for="name" class="col-md-3 text-md-right col-form-label">Tiêu đề</label>
              <div class="col-md-9 col-xl-8">
                <input name="title" id="title" placeholder="Tiêu đề" type="text" class="form-control decor" value="{{ $decoration->title }}">
              </div>
            </div>

            <div class="position-relative row form-group {{ $decoration->location == 2 ? 'd-none' :'' }}">
              <label for="name" class="col-md-3 text-md-right col-form-label">Nội dung</label>
              <div class="col-md-9 col-xl-8">
                <input name="content" id="content {{ $decoration->location == 3 ? 'description' :'' }}" placeholder="Nội dung" type="text" class="form-control decor" value="{{ $decoration->content }}">
              </div>
            </div>

            <div class="position-relative row form-group {{ $decoration->location != 3 ? 'd-none' :'' }}">
              <label for="name" class="col-md-3 text-md-right col-form-label decor ">ID sản phẩm (dành cho sản phẩm yêu thích)</label>
              <div class="col-md-9 col-xl-8">
                <input {{ $decoration->location != 3 ? 'readonly' :'' }} name="product_id" id="product_id" placeholder="Nhập vào id của sản phẩm" type="text" class="form-control" value="{{ $decoration->product_id }}">
              </div>
            </div>

            <div class="position-relative row form-group mb-1 d-flex justify-content-center">
              <div class="col-md-3"></div>
              <div class="col-md-9 col-xl-8">
                <a href=" ./admin/decoration" class="border-0 btn btn-outline-danger mr-1">
                  <span class="btn-icon-wrapper pr-1 opacity-8">
                    <i class="fa fa-times fa-w-20"></i>
                  </span>
                  <span>Hủy</span>
                </a>

                <button type="submit" class="btn-shadow btn-hover-shine btn btn-primary">
                  <span class="btn-icon-wrapper pr-2 opacity-8">
                    <i class="fa fa-download fa-w-20"></i>
                  </span>
                  <span>Lưu</span>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Main -->
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace('description');
</script>
@endsection