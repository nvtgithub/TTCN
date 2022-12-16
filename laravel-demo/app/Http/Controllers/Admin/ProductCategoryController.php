<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\DB;

class ProductCategoryController extends Controller
{
  private $productCategoryService;

  public function __construct(ProductCategoryServiceInterface $productCategoryService)
  {
    $this->productCategoryService = $productCategoryService;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $productCategories = $this->productCategoryService->searchAndPaginate('name', $request->get('search'));
    return view('admin.category.index', compact('productCategories'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.category.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $categoriesName = DB::table('product_categories')->pluck('name');

    foreach ($categoriesName as $name) {
      if (strcasecmp($name, $request->get('name'))) {
        return back()
          ->with('notification', 'ERROR: Danh mục này đã tồn tại!');
      }
    }

    $data = $request->all();
    $this->productCategoryService->create($data);
    return redirect('admin/category');
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
  public function edit($id)
  {
    $productCategory = $this->productCategoryService->find($id);
    return view('admin.category.edit', compact('productCategory'));
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
    $data = $request->all();
    $this->productCategoryService->update($data, $id);
    return redirect('admin/category');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $this->productCategoryService->delete($id);
    return redirect('admin/category');
    
  }
}
