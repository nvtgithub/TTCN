<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Product\ProductServiceInterface;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use Illuminate\Http\Request;

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

    return view('front.index', compact('featuredProducts', 'categories'));
  }
}
