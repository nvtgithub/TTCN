<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Product\ProductServiceInterface;
use App\Services\ProductComment\ProductCommentServiceInterface;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use App\Services\Trademarks\TrademarksService;
use App\Services\Trademarks\TrademarksServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ShopController extends Controller
{
  private $productService;
  private $productCommentService;
  private $productCategoryService;
  private $trademarksService;

  public function __construct(
    ProductServiceInterface $productService,
    ProductCommentServiceInterface $productCommentService,
    ProductCategoryServiceInterface $productCategoryService,
    TrademarksServiceInterface $trademarksService
    )
  {
    $this->productService = $productService;
    $this->productCommentService = $productCommentService;
    $this->productCategoryService = $productCategoryService;
    $this->trademarksService = $trademarksService;
  }

  public function show($id)
  {
    $categories = $this->productCategoryService->all();
    $trademarks = $this->trademarksService->all();
    $product = $this->productService->find($id);
    $relatedProducts = $this->productService->getRelatedProducts($product);
    $product_detail = DB::table('product_details')->get('qty');

    return view('front.shop.show', compact('product', 'relatedProducts', 'categories', 'trademarks', 'product_detail'));
  }

  public function postComment(Request $request)
  {
    $this->productCommentService->create($request->all());

    return redirect()->back();
  }

  public function index(Request $request)
  {
    $categories = $this->productCategoryService->all();
    $trademarks = $this->trademarksService->all();
    $products = $this->productService->getProductOnIndex($request);
    return view('front.shop.index', compact( 'products', 'categories', 'trademarks'));
  }

  public function category($categoryName, Request $request)
  {
    $categories = $this->productCategoryService->all();
    $trademarks = $this->trademarksService->all();

    $products = $this->productService->getProductByCategory($categoryName, $request);
    return view('front.shop.index', compact( 'products', 'categories', 'trademarks'));
  }
}
