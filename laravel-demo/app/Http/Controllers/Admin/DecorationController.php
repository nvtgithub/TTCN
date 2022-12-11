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

  public function __construct(ProductCategoryServiceInterface $productCategoryService
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
    $categories = $this->productCategoryService->all();

    return view('admin.decoration.create', compact('categories'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $data = $request->all();

    //Xử lý file:
    if ($request->hasFile('image')) {
      $data['avatar'] = Common::uploadFile($request->file('image'), 'front/img/banner');
    }

    $newDecoration = DB::table('decoration')->insert([
      'location'   => '1',
      'category_name'   => $data['category'],
      'image'      => $data['avatar'],
      'title'      => $data['title'],
      'content'    => $data['content'],
    ]);
    return redirect('admin/decoration');
  }

  public function show($id)
  {
    //
  }

  public function edit(Decoration $decoration)
  {
    $categories = $this->productCategoryService->all();
    return view('admin.decoration.edit', compact('decoration', 'categories'));
  }

  public function update(Request $request, Decoration $decoration)
  {
    $data = $request->all();
    //xử lý file ảnh
    if ($request->hasFile('image')) {
      //Thêm file mới
      $data['avatar'] = Common::uploadFile($request->file('image'), 'front/img/banner');

      //Xóa file cũ
      $file_name_old = $request->get('image_old');
      if ($file_name_old != '') {
        unlink('front/img/banner/' . $file_name_old);
      }
    }


    //cập nhật dữ liệu
    $updated = DB::table('decoration')
      ->where('id', '=', $decoration->id)
      ->update([
        'category_name'  => $data['category'],
        'title'      => $data['title'],
        'content'    => $data['content'],
        'product_id'    => $data['product_id'],
        'image' => $data['avatar'] ?? $data['image_old'],
      ]);

    return redirect('admin/decoration');
  }

  public function destroy(Decoration $decoration)
  {
    DB::table('decoration')->where('id', 'like', $decoration->id)->delete();

    //Xóa file
    $file_name = $decoration->image;
    if ($file_name != '') {
      unlink('front/img/banner/' . $file_name);
    }

    return redirect('admin/decoration');
  }
}
