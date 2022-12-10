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
                    <form method="post" action="/admin/decoration" enctype="multipart/form-data">
                        @csrf
                        <!-- @include('admin.components.notification') -->

                        <div class="position-relative row form-group">
                            <label for="level" class="col-md-3 text-md-right col-form-label">Danh mục</label>
                            <div class="col-md-9 col-xl-8">
                                <select required name="category" id="select_category" class="form-control">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->name }}">
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="image" class="col-md-3 text-md-right col-form-label">Hình ảnh</label>
                            <div class="col-md-9 col-xl-8">
                                <img style="cursor: pointer;" class="thumbnail" data-toggle="tooltip" title="Click để chọn hình ảnh" data-placement="bottom" src="front/img/banner/default-image.jpg" alt="Avatar">
                                <input name="image" type="file" onchange="changeImg(this)" class="image form-control-file" style="display: none;" value="">
                                <input type="hidden" name="image_old" value="">
                                <small class="form-text text-muted">
                                    Chọn hình ảnh đại diện (Cần thiết)
                                </small>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label">Tiêu đề</label>
                            <div class="col-md-9 col-xl-8">
                                <input name="title" id="title" placeholder="Tiêu đề" type="text" class="form-control" value="">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label">Nội dung</label>
                            <div class="col-md-9 col-xl-8">
                                <input name="content" id="content" placeholder="Nội dung" type="text" class="form-control" value="">
                            </div>
                        </div>

                        <div class="position-relative row form-group mb-1 d-flex justify-content-center">
                            <a href="./admin/decoration" class="border-0 btn btn-outline-danger mr-1">
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