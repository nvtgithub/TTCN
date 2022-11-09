<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Services\User\UserServiceInterface;
use App\Utilities\Common;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userService->all();

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->get('password') != $request->get('password_confirmation')) {
            return back()
                ->with('notification', 'ERROR: Mật khẩu không khớp vui lòng thử lại');
        }

        $data = $request->all();
        $data['password'] = bcrypt($request->get('password'));

        //Xử lý file:
        if($request->hasFile('image')) {
            $data['avatar'] = Common::uploadFile($request->file('image'), 'front/img/users');
        }

        $user = $this->userService->create($data);

        return redirect('admin/user/'. $user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->all();

        //xử lý mật khẩu
        if($request->get('password') != null)
        {
            if($request->get('password') != $request->get('password_confirmation'))
            {
                return back()
                    ->with('notification', 'ERROR: Mật khẩu không khớp');          
            }

            $data['password'] = bcrypt($request->get('password'));
        } else {
            unset($data['password']);
        }

        //xử lý file ảnh
        if($request->hasFile('image'))
        {
            //Thêm file mới
            $data['avatar'] = Common::uploadFile($request->file('image'), path: 'front/img/users');

            //Xóa file cũ
            $file_name_old = $request->get('image_old');
            if($file_name_old != '')
            {
                unlink('front/img/users/' . $file_name_old);
            }
        }

        //cập nhật dữ liệu
        $this->userService->update($data, $user->id);

        return redirect('admin/user/' . $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
