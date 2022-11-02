<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Product\ProductServiceInterface;
use App\Services\ProductComment\ProductCommentServiceInterface;
use Illuminate\Http\Request;

class ShopController extends Controller
{
  private $productService;
  private $productCommentService;

  public function __construct(
    ProductServiceInterface $productService,
    ProductCommentServiceInterface $productCommentService
  ) {
    $this->productService = $productService;
    $this->productCommentService = $productCommentService;
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

  public function index()
  {
    return view('front.shop.index');
  }

  public function getProductOnIndex($request)
  {
    $perPage = $request->show ?? 3;
    $sortBy = $request->sort_by ?? 'Latest';
    $search = $request->search ?? '';
    $products = $this->model->where('name', 'like', '%' . $search . '%');

    switch ($sortBy) {
      case 'latest':
        $products = $products->orderBy('id');
        break;
      case 'oldest':
        $products = $products->orderByDesc('id');
        break;
      case 'name-ascending':
        $products = $products->orderBy('name');
        break;
      case 'name-descending':
        $products = $products->orderByDesc('name');
        break;
      case 'price-ascending':
        $products = $products->orderBy('price');
        break;
      case 'price-descending':
        $products = $products->orderByDesc('price');
        break;

      default:
        $products = $products->orderBy('id');
        break;
    }

    $products = $products->paginate($perPage);
    $products->appends(['sort_by' => $sortBy, 'show' => $perPage]);
    return $products;
  }
}
