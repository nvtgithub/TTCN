@extends('admin.layout.master')

@section('title', 'Product')

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
          Chi tiết sản phẩm
          <div class="page-title-subheading">
            Xem chi tiết, tạo mới, cập nhật, xóa và quản lý.
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="main-card mb-3 card">
        <div class="card-body">
          <form method="post" action="admin/product/{{ $product->id }}/detail" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="position-relative row form-group">
              <label class="col-md-3 text-md-right col-form-label">Tên sản phẩm</label>
              <div class="col-md-9 col-xl-8">
                <input disabled placeholder="Product Name" type="text" class="form-control" value="{{ $product->name }}">
              </div>
            </div>

            <div class="position-relative row form-group">
              <label for="color" class="col-md-3 text-md-right col-form-label">Tên màu</label>
              <div class="col-md-9 col-xl-8">
                <input required name="color" id="color" placeholder="Color" type="text" class="form-control" value="">
              </div>
            </div>

            <div class="position-relative row form-group">
              <label for="color" class="col-md-3 text-md-right col-form-label">Mã màu</label>
              <div class="col-md-9 col-xl-8">
                <input type="color" class="form-control-color" id="color" name="color_code" value="#563d7c" title="Chọn 1 màu">
              </div>
            </div>

            <div class="position-relative row form-group">
              <label for="qty" class="col-md-3 text-md-right col-form-label">Số lượng</label>
              <div class="col-md-9 col-xl-8">
                <input required name="qty" id="qty" placeholder="Số lượng" type="text" class="form-control" value="">
              </div>
            </div>

            <div class="position-relative row form-group mb-1 d-flex justify-content-center">
                <a href="./admin/product/{{ $product->id }}/detail" class="border-0 btn btn-outline-danger mr-1">
                  <span class="btn-icon-wrapper pr-1 opacity-8">
                    <i class="fa fa-times fa-w-20"></i>
                  </span>
                  <span>Hủy</span>
                </a>

                <button type="submit" class="btn-shadow btn-hover-shine btn btn-primary">
                  <span class="btn-icon-wrapper pr-2 opacity-8">
                    <i class="fa fa-save fa-w-20"></i>
                  </span>
                  <span>Lưu</span>
                </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Main -->
@endsection