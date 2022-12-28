@extends('admin.layout.master')

@section('title', 'comment')

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
         Bình luận
          <div class="page-title-subheading">
            Xem chi tiết, cập nhật và xóa.
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="main-card mb-3 card">

        <div class="card-header">

          <form>
            <div class="input-group">
              <input type="search" name="search" value="{{request('search')}}" id="search" placeholder="Tìm kiếm bình luận" class="form-control">
              <span class="input-group-append">
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-search"></i>&nbsp;
                  Tìm kiếm
                </button>
              </span>
            </div>
          </form>
        </div>

        <div class="table-responsive">
          <table class="align-middle mb-0 table table-borderless table-striped table-hover">
            <thead>
              <tr>
                <th class="text-center">ID</th>
                <th class="text-center">ID người dùng</th>
                <th>Họ tên</th>
                <th>Nội dung bình luận</th>
                <th class="text-center">Hành động</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($comments as $comment)
              <tr>
                <td class="text-center text-muted">{{$comment->id}}</td>
                <td class="text-center text-muted">{{$comment->user_id}}</td>
                <td>
                  <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                      <div class="widget-content-left flex2">
                        <div class="widget-heading">{{$comment->user->name}}</div>
                      </div>
                    </div>
                  </div>
                </td>
                <td>{{$comment->content}}</td>


                <td class="text-center">
                    <a href="admin/comment/{{$comment->id}}/detail" class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                      Chi tiết
                    </a>
                    <form class="d-inline" action="./admin/comment/{{ $comment->id }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm" type="submit" data-toggle="tooltip" title="Delete" data-placement="bottom" onclick="return confirm('Bạn có muốn xóa bình luận này?')">
                        <span class="btn-icon-wrapper opacity-8">
                          <i class="fa fa-trash fa-w-20"></i>
                        </span>
                      </button>
                    </form>
                  </td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>

        {{-- <div class="d-block card-footer">
          {{$trademarks->links()}}
        </div> --}}

      </div>
    </div>
  </div>
</div>
<!-- End Main -->

@endsection
