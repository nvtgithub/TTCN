@foreach ($comments as $comment)
    <div class="media">
        @if ($comment->user->level == 1)
            <a href="#" class="pull-left mr-2">
                <img src="front/img/users/{{ $comment->user->avatar }}" alt="Ảnh của admin" class="comment-avatar">
            </a>
        @else
            <a href="#" class="pull-left mr-2">
                <img src="data:image/png;base64,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"
                    alt="" width="60" class="comment-avatar">
            </a>
        @endif
        <div class="media-body">
            @if ($comment->user->level == 1)
                <h4 class="media-heading"><strong>{{ $comment->user->name }} - <span
                            class="comment-user-admin"><i>Admin</i></span></strong></h4>
                <p class="comment-content">{{ $comment->content }}</p>
            @else
                <h4 class="media-heading"><strong>{{ $comment->user->name }}</strong></h4>
                <p class="comment-content">{{ $comment->content }}</p>
            @endif

            @if (Auth::User())
                @if (Auth::User()->level == 1)
                    <p>
                        <button onclick="reply(this)" class="btn btn-sm btn-primary btn-show-reply-form"
                            data-id="{{ $comment->id }}">Trả lời</button>
                    </p>
                @elseif(Auth::User()->id == $comment->user->id)
                    <p>
                        <button onclick="reply(this)" class="btn btn-sm btn-primary btn-show-reply-form"
                            data-id="{{ $comment->id }}">Trả lời</button>
                    </p>

                    {{-- <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modelId">Vui
                        lòng đăng nhập để trả lời</button> --}}
                @endif
            @endif



            <form action="" method="POST" role="form" style="display:none"
                class="formReply form-reply-{{ $comment->id }}">
                <div class="form-group">
                    <label for="">Nội dung bình luận</label>
                    <input type="hidden" value="" name="">
                    <textarea id="content-reply-{{ $comment->id }}" class="form-control" placeholder="Nhập nội dung bình luận...(*)"></textarea>
                </div>

                <button type="button" data-id="{{ $comment->id }}" class="btn btn-primary btn-send-comment-reply"
                    onclick="sendCommentReply(this)">Gửi nội dung
                    trả lời</button>
            </form>

            <!-- Bình luận con  -->
            <br>
            <hr><br>
            @foreach ($comment->replies as $child)
                <div class="media">
                    @if ($child->user->level == 1)
                        <a href="#" class="pull-left mr-2">
                            <img src="front/img/users/{{ $child->user->avatar }}" class="comment-avatar"
                                alt="Ảnh của admin">
                        </a>
                    @else
                        <a href="#" class="pull-left mr-2">
                            <img src="data:image/png;base64,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"
                                alt="" width="60" class="comment-avatar">
                        </a>
                    @endif
                    <div class="media-body">
                        @if ($child->user->level == 1)
                            <h4 class="media-heading"><strong>{{ $child->user->name }} - <span
                                        class="comment-user-admin"><i>Admin</i></span></strong></h4>
                        @else
                            <h4 class="media-heading"><strong>{{ $child->user->name }} </span></strong></h4>
                        @endif
                        <p class="comment-content">{{ $child->content }}</p><br>
                        {{-- <p>

                            @if (Auth::check())
                                <button onclick="reply(this)" class="btn btn-sm btn-primary btn-show-reply-form"
                                    data-id="{{ $child->id }}">Trả lời</button>
                            @endif

                        </p> --}}
                        {{-- <form action="" method="POST" role="form" style="display:none"
                            class="formReply form-reply-{{ $child->id }}">
                            <div class="form-group">
                                <label for="">Nội dung bình luận</label>
                                <input type="hidden" value="" name="">
                                <textarea id="content-reply-{{ $child->id }}" class="form-control" placeholder="Nhập nội dung bình luận...(*)"></textarea>
                            </div>

                            <button type="button" data-id="{{ $child->id }}"
                                class="btn btn-primary btn-send-comment-reply" onclick="sendCommentReply(this)">Gửi nội
                                dung trả lời</button>
                        </form> --}}

                        <!-- Bình luận con cấp 2-->
                        {{-- <br>
                        <hr><br>
                        @foreach ($child->replies as $child2)
                            <div class="media">
                                <a href="#" class="pull-left mr-2">
                                    <img src="data:image/png;base64,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"
                                        alt="" width="60">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><strong>{{ $child2->user->name }}</strong></h4>
                                    <p>{{ $child2->content }}</p>
                                    <!-- <p>
                                    <button onclick="reply(this)" class="btn btn-sm btn-primary btn-show-reply-form"
                                    data-id="{{ $child->id }}">Trả lời</button>
                                </p>  -->
                                </div>
                            </div>
                        @endforeach --}}
                    </div>
                </div>
            @endforeach


        </div>
    </div>
@endforeach
