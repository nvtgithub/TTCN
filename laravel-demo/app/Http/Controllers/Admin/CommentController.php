<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Comment\CommentServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;

class CommentController extends Controller
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
  public function index(Request $request)
  {
    // $comments = $this->commentService->searchAndPaginate('content', $request->get('search'));

    $comments = Comment::where(['reply_id' => 0])
                ->orderBy('id','DESC')
                ->get();

    return view('admin.comment.index', compact('comments'));
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
  public function destroy($id)
  {
    Comment::find($id)->delete();

    return redirect('admin/comment');
  }
}
