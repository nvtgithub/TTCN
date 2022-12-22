<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Product\ProductServiceInterface;
use App\Services\User\UserServiceInterface;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
  private $productService;
  private $productCategoryService;

  public function __construct(ProductServiceInterface $productService, ProductCategoryServiceInterface $productCategoryService)
  {
    $this->productService = $productService;
    $this->productCategoryService = $productCategoryService;
  }

  public function index()
  {
    $featuredProducts = $this->productService->getFeaturedProducts();
    $categories = $this->productCategoryService->all();
    $banners = DB::table('decoration')->get();

    return view('front.index', compact('featuredProducts', 'categories', 'banners'));
  }

  public function indexContact() {
    $categories = $this->productCategoryService->all();

    $data = DB::table('comments')
    ->join('users', 'comments.user_id', '=', 'users.id')
    ->select(
        DB::raw("comments.id as id"),
        DB::raw("users.name as name"),
        DB::raw("comments.reply_id as replies"),
        DB::raw("comments.content as content")
    )->orderBy("comments.id","DESC")->get();

    return view('front.contact', compact('data','categories'));

    // return view('front.contact', compact('categories'));
  }

  public function favoriteProducts() {
    $categories = $this->productCategoryService->all();
    return view('front.favorite', compact('categories'));
  }

  public function category($categoryName, Request $request)
  {
    $categories = $this->productCategoryService->all();
    $trademarks = $this->trademarksService->all();

    $products = $this->productService->getProductByCategory($categoryName, $request);
    return view('front.shop.index', compact('products', 'categories', 'trademarks'));
  }
}
