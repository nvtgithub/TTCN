<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Comment\CommentServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;

class CommentReplyController extends Controller
{
  private $commentsService;

  public function __construct(CommentServiceInterface $commentService)
  {
    $this->commentService = $commentService;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request, $comment_id)
  {
    //show detail reply comment
    $data = Comment::where(['comments.id' => $comment_id ])->get();

    $commentReplies = Comment::where(['reply_id' => $comment_id])
    ->orderBy('id','DESC')
    ->get();

    return view('admin.comment.replycomment.index', compact('commentReplies','data'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($comment_id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($comment_id, $comment_reply_id)
  {
    Comment::find($comment_reply_id)->delete();


    return redirect('admin/comment/'.$comment_id.'/detail');
  }
}
