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
      <div class="card shadow mb-4">
        <div class="card-body">
          <div>
            <h2>Banner</h2>

            <div class="d-flex justify-content-center">
              <img class="col-md-6 shadow-lg p-3 mb-5 bg-body rounded" src="front/img/ex_banner.png" alt="exbanner">
            </div>
            <div class="page-title-actions">
              <a href="./admin/decoration/create" class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
                <span class="btn-icon-wrapper pr-2 opacity-7"> <i class="fa fa-plus fa-w-20"></i> </span>
                Thêm banner
              </a>
            </div>
            <div class="table-responsive mt-3">
              <table class="table table-bordered center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th class="text-center">Danh mục</th>
                    <th class="text-center">Tiêu đề</th>
                    <th class="text-center">Nội dung</th>
                    <th class="text-center">Hình ảnh</th>
                    <th class="text-center">Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($banners as $banner)
                  @if($banner->location == 1)
                  <tr>
                    <td class="text-center">{{$banner->category_name}}</td>
                    <td class="text-center">{{$banner->title}}</td>
                    <td class="text-center">{{$banner->content}}</td>
                    <td class="text-center">
                      <div class="widget-content-left mr-3">
                        <div class="widget-content-left">
                          <img style="height: 60px;" data-toggle="tooltip" title="Image" data-placement="bottom" src="front/img/banner/{{$banner->image}}" alt="">
                        </div>
                      </div>
                    </td>
                    <td class="text-center">
                      <a href="./admin/decoration/{{ $banner->id }}/edit" data-toggle="tooltip" title="Edit" data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                        <span class="btn-icon-wrapper opacity-8">
                          <i class="fa fa-edit fa-w-20"></i>
                        </span>
                      </a>
                      <form class="d-inline" action="./admin/decoration/{{ $banner->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm" type="submit" data-toggle="tooltip" title="Delete" data-placement="bottom" onclick="return confirm('Bạn có muốn xóa banner này?')">
                          <span class="btn-icon-wrapper opacity-8">
                            <i class="fa fa-trash fa-w-20"></i>
                          </span>
                        </button>
                      </form>
                    </td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <hr>
          <div>
            <h2>Danh mục</h2>
            <div class="d-flex justify-content-center">
              <img class="col-md-6 shadow-lg p-3 mb-5 bg-body rounded" src="front/img/ex_category.png" alt="ex_category">
            </div>
            <div class="table-responsive mt-3">
              <table class="table table-bordered center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th class="text-center">Danh mục</th>
                    <th class="text-center">Hình ảnh</th>
                    <th class="text-center">Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($banners as $banner)
                  @if($banner->location == 2)
                  <tr>
                    <td class="text-center">{{$banner->category_name}}</td>
                    <td class="text-center">
                      <div class="widget-content-left mr-3">
                        <div class="widget-content-left">
                          <img style="height: 60px;" data-toggle="tooltip" title="Image" data-placement="bottom" src="front/img/banner/{{$banner->image}}" alt="">
                        </div>
                      </div>
                    </td>
                    <td class="text-center">
                      <a href="./admin/decoration/{{ $banner->id }}/edit" data-toggle="tooltip" title="Edit" data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                        <span class="btn-icon-wrapper opacity-8">
                          <i class="fa fa-edit fa-w-20"></i>
                        </span>
                      </a>
                    </td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
            <hr>
            <div>
              <h2>Sản phẩm yêu thích trong tuần</h2>
              <div class="d-flex justify-content-center">
                <img class="col-md-6 shadow-lg p-3 mb-5 bg-body rounded" src="front/img/ex_favorite.png" alt="ex_category">
              </div>
              <div class="table-responsive mt-3">
                <table class="table table-bordered center" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th class="text-center">Danh mục</th>
                      <th class="text-center">Tiêu đề</th>
                      <th class="text-center">Nội dung</th>
                      <th class="text-center">Hình ảnh</th>
                      <th class="text-center">Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($banners as $banner)
                    @if($banner->location == 3)
                    <tr>
                      <td class="text-center">{{$banner->category_name}}</td>
                      <td class="text-center">{{$banner->title}}</td>
                      <td class="text-center">{{$banner->content}}</td>
                      <td class="text-center">
                        <div class="widget-content-left mr-3">
                          <div class="widget-content-left">
                            <img style="height: 60px;" data-toggle="tooltip" title="Image" data-placement="bottom" src="front/img/{{$banner->image}}" alt="">
                          </div>
                        </div>
                      </td>
                      <td class="text-center">
                        <a href="./admin/decoration/{{ $banner->id }}/edit" data-toggle="tooltip" title="Edit" data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                          <span class="btn-icon-wrapper opacity-8">
                            <i class="fa fa-edit fa-w-20"></i>
                          </span>
                        </a>
                      </td>
                    </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Main -->

  @endsection