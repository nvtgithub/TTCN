<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Product\ProductServiceInterface;
use App\Services\ProductComment\ProductCommentServiceInterface;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use Illuminate\Http\Request;

class ShopController extends Controller
{
  private $productService;
  private $productCommentService;
  private $productCategoryService;

  public function __construct(
    ProductServiceInterface $productService,
    ProductCommentServiceInterface $productCommentService
    ,
    ProductCategoryServiceInterface $productCategoryService
  ) {
    $this->productService = $productService;
    $this->productCommentService = $productCommentService;
    $this->productCategoryService = $productCategoryService;
  }

  public function show($id)
  {
    $product = $this->productService->find($id);
    $relatedProducts = $this->productService->getRelatedProducts($product);

    return view('front.shop.show', compact('product', 'relatedProducts'));
  }

  public function postComment(Request $request)
  {
    $this->productCommentService->create($request->all());

    return redirect()->back();
  }

  public function index(Request $request)
  {
    $categories = $this->productCategoryService->all();
    $products = $this->productService->getProductOnIndex($request);
    return view('front.shop.index', compact(var_name: 'products', var_names: 'categories'));
  }
}
