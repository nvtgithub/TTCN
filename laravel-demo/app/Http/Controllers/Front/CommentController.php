<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function index()
    {
        $comments = DB::table('comments')
        ->join('users', 'comments.user_id', '=', 'users.id')
        ->select(DB::raw('users.name as name'),
                DB::raw('comments.content as content')
        )->orderBy('id','DESC');

        return view('front.contact', compact('comments'));
    }
}
