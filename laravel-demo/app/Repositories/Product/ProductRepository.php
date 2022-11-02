<?php

namespace App\Repositories\Product;

use App\Repositories\BaseRepository;
use App\Models\Product;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{

    public function getModel()
    {
        return Product::class;
    }

    public function getRelatedProducts($product, $limit = 4)
    {
        return $this->model->where('product_category_id', $product->product_category_id)
            ->where('tag', $product->tag)
            ->limit($limit)
            ->get();
    }

    public function getFeatureProductByCategory(int $categoryId)
    {
        return $this->model->where('featured', true)
            ->where('product_category_id', $categoryId)
            ->get();
    }

    public function getProductOnIndex() 
    {
        $products = $this->model->paginate(3);

        return $products;
    }
}
