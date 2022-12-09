<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Decoration\DecorationServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Decoration;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use App\Utilities\Common;

class DecorationController extends Controller
{
    private $productCategoryService;

    public function __construct(
        ProductCategoryServiceInterface $productCategoryService,
    ) {
        $this->productCategoryService = $productCategoryService;
    }

    public function index()
    {
        $banners = DB::table('decoration')->get();
        return view('admin.decoration.index', compact('banners'));
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Decoration $decoration)
    {
        $categories = $this->productCategoryService->all();
        return view('admin.decoration.edit', compact('decoration', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Decoration $decoration)
    {
        $data = $request->all();
        //xử lý file ảnh
        if ($request->hasFile('image')) {
            //Thêm file mới
            $data['avatar'] = Common::uploadFile($request->file('image'), 'front/img');

            //Xóa file cũ
            $file_name_old = $request->get('image_old');
            if ($file_name_old != '') {
                unlink('front/img/' . $file_name_old);
            }
        }


        //cập nhật dữ liệu
        $updated = DB::table('decoration')
            ->where('id', '=', $decoration->id)
            ->update([
                'category_name'  => $data['category'],
                'title'      => $data['title'],
                'content'    => $data['content'],
                'image' => $data['avatar'],
                ]);

        return redirect('admin/decoration');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
