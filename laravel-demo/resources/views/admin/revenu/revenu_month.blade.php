@extends('admin.layout.master')

@section('title', 'revenu')

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
          Doanh thu theo tháng
          <div class="page-title-subheading">
            Thống kê doanh thu theo tháng
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card shadow mb-4">
        <div class="card-body">
          <br>
          <div class="table-responsive">
            <table class="table table-bordered center" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Đơn hàng Tháng</th>
                  <th>Số lượng sản phẩm</th>
                  <th>Doanh thu tháng</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($orders as $order)
                <tr>
                  <th> {{$order->month}}</th>
                  <th>{{$order->Status}}</th>
                  <th>{{number_format($order->Total)}} VNĐ</th>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{$orders->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Main -->

@endsection
