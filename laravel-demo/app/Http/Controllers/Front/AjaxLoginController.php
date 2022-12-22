<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class AjaxLoginController extends Controller
{


    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ],[
            'email.required' => 'Địa chỉ email không được để trống!',
            'email.email' => 'Địa chỉ email không đúng định dạng!',
            'email.exists' => 'Địa chỉ email không tồn tại!',
            'password.required' => 'Mật khẩu không được để trống!',
        ]);

        if($validator->passes()){
          $data = $request->only('email','password');
          $check_login = Auth::attempt($data);
          if($check_login){
            return redirect()->intended('/contact');
          }
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function comment(Request $request)
    {
        $user_id = Auth::user()->id;

        $validator = Validator::make($request->all(),[
            'content' => 'required',
        ],[
            'content.required' => 'Nội dung bình luận không được để trống!'
        ]);

        if($validator->passes()){
            $data = [
                'user_id' => $user_id,
                'content' => $request->content,
                'reply_id' => $request->reply_id ? $request->reply_id : 0
            ];

            if($comment = Comment::create($data)){
                $comments = Comment::where(['reply_id' => 0])
                ->orderBy('id','DESC')
                ->get();
                return view('front.list-comment', compact('comments'));
            }
        }

        return response()->json(['error' => $validator->errors()->all()]);
    }
}
