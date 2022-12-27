@extends('front.layout.master')

@section('title', 'Contact')

@section('body')
    <!-- -->
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home">Trang chủ</i></a>
                        <span>Thông tin</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <section class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="leave-comment">
                        <h2>LIÊN HỆ VỚI CHÚNG TÔI</h2>
                    </div>
                    <div class="contact-widget">
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-location-pin"></i>
                            </div>
                            <div class="ci-text">
                                <span>Địa chỉ:</span>
                                <p>Trâu Quỳ, Gia Lâm, Hà Nội</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-mobile"></i>
                            </div>
                            <div class="ci-text">
                                <span>Số điện thoại:</span>
                                <p>+84 86.58.92.696</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-email"></i>
                            </div>
                            <div class="ci-text">
                                <span>Email:</span>
                                <p>electronicStore@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 offset-lg-1">

                    <div class="container">
                        <div class="leave-comment">
                            <h2>BÌNH LUẬN <p>Nhân viên của chúng tôi sẽ gọi lại sau và trả lời câu hỏi câu hỏi của bạn</p></h2>

                        @if (Auth::check())
                            <form action="" method="POST" role="form">
                                <div class="form-group">
                                    {{-- <legend><i>Xin chào bạn: {{ Auth::user()->name }}</i></legend> --}}
                                    <label for=""><strong>Nội dung bình luận</strong></label>
                                    <input type="hidden" value="" name="">
                                    <textarea id="content" class="form-control" placeholder="Nhập nội dung bình luận...(*)"></textarea>
                                    <small id="comment-error"
                                        style="color: red; font-weight: bold; font-style: italic"></small>
                                </div>

                                <button type="button" class="btn btn-primary" id="btn-comment"
                                    onclick="myFunctionComment()">Bình luận</button>
                            </form><br>
                        @else
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modelId">Vui
                                lòng đăng nhập để bình luận</button><br><br><hr><br>

                        @endif

                        {{-- <h3>Các bình luận</h3> --}}
                       
                        <div id="comment">

                            @include('front.list-comment',['comments' => $comments])

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <!-- Contact Section End -->

    <!-- Button to Open the Modal -->


    <!-- The Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog odal-sm" role="document">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Đăng nhập ngay</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div id="error"></div>

                    <form action="" method="POST" role="form">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="Nhập Email(*)">
                        </div>
                        <div class="form-group">
                            <label for="">Mật khẩu</label>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Nhập Mật khẩu(*)">
                        </div>

                        <button type="button" class="btn btn-primary btn-block" id="btn-login"
                            onclick="myFunctionLogin()">Đăng nhập</button>
                    </form>
                </div>

                <!-- Modal footer -->
            </div>
        </div>
    </div>


    <script>
        var _csrf = '{{ csrf_token() }}';
        var _commentUrl = '{{ route('ajax.comment') }}';

        function myFunctionLogin() {
            var _loginUrl = '{{ route('ajax.login') }}';
            var email = $('#email').val();
            var password = $('#password').val();

            $.ajax({
                url: _loginUrl,
                type: 'POST',
                data: {
                    email: email,
                    password: password,
                    _token: _csrf
                },
                success: function(res) {
                    if (res.error) {
                        let _html_error =
                            '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                        for (let error of res.error) {
                            _html_error += `<li>${error}</li>`;
                        }
                        _html_error += '</div>';

                        $('#error').html(_html_error);
                    } else {
                        alert('Đăng nhập thành công!');
                        location.reload();
                    }
                    // console.log(res);
                }
            });
            console.log(email, password, _csrf, _loginUrl);
        }



        function myFunctionComment() {
            let content = $('#content').val();

            $.ajax({
                url: _commentUrl,
                type: 'POST',
                data: {
                    content: content,
                    _token: _csrf
                },
                success: function(res) {
                    if (res.error) {
                        $('#comment-error').html(res.error)
                    } else {
                        $('#comment-error').html('');
                        $('#content').val('');
                        $('#comment').html(res);
                        //console.log(res);
                    }
                }
            });
        }



        function reply(ev) {
            var id = ev.getAttribute("data-id");
            var content_reply_id = '#content-reply-' + id;
            var form_reply = '.form-reply-' + id;
            var contentReply = $(content_reply_id).val();
            $('.formReply').slideUp();
            $(form_reply).slideDown();
        }

        function sendCommentReply(ev){
            var id = ev.getAttribute("data-id");
            var content_reply_id = '#content-reply-' + id;
            var contentReply = $(content_reply_id).val();
            var form_reply = '.form-reply-' + id;

            $.ajax({
                url: _commentUrl,
                type: 'POST',
                data: {

                    content: contentReply,
                    reply_id: id,
                    _token: _csrf
                },
                success: function(res) {
                    if (res.error) {
                        $('#comment-error').html(res.error)
                    } else {
                        $('#comment-error').html('');
                        $('#content').val('');
                        $('#comment').html(res);
                        //console.log(res);
                    }
                }
            });

        }
    </script>


@endsection
