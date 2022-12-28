@extends('admin.layout.master')

@section('title', 'Comment')

@section('body')
    <!-- Main -->
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper justify-content-between">

                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                    </div>
                    @foreach ($data as $dt)
                        <div>
                            Chi tiết bình luận trả lời ID: <strong><i>{{ $dt->id}}</i></strong> của người dùng:
                            <strong><i>{{ $dt->user->name }}</i></strong>(id: <strong>{{ $dt->user->id}}</strong>)
                    @endforeach
                </div>
                <div class="notifi">@if(session('notification'))
                    <div class="alert alert-warning" role="alert" style="text-align: center;">
                      {{ session('notification') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
            <li class="nav-item">
                <a href="./admin/comment/" class="nav-link">
                    <span class="btn-icon-wrapper pr-2 opacity-8">
                        <i class="fa fa-chevron-circle-left"></i>
                    </span>
                    <span>Quay lại</span>
                </a>
            </li>
        </ul>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">

                        <form>
                            <div class="input-group">
                                <input type="search" name="search" id="search" placeholder="Tìm kiếm"
                                    class="form-control">
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
                                @foreach ($commentReplies as $commentReply)
                                    <tr>
                                        <td class="text-center text-muted">{{ $commentReply->id }}</td>
                                        <td class="text-center text-muted">{{ $commentReply->user_id }}</td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading">{{ $commentReply->user->name }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $commentReply->content }}</td>


                                        <td class="text-center">
                                            <form class="d-inline"
                                                action="./admin/comment/{{$dt->id}}/detail/{{$commentReply->id}}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm"
                                                    type="submit" data-toggle="tooltip" title="Delete"
                                                    data-placement="bottom"
                                                    onclick="return confirm('Bạn có muốn xóa bình luận này không?')">
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
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection
