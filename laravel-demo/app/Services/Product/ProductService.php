<?php

namespace App\Services\Product;

use App\Repositories\Product\ProductRepositoryInterface;
use App\Services\BaseService;

class ProductService extends BaseService implements ProductServiceInterface
{
    public $repository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->repository = $productRepository;
    }

    public function find(int $id)
    {
       $product = $this->repository->find($id);

       $avgRating = 0;
       $sumRating = array_sum(array_column($product->productComments->toArray(),'rating' ));
       $countRating = count($product->productComments);
        if($countRating != 0 )
        {
            $avgRating = $sumRating/$countRating;
        }

        $product->avgRating = $avgRating;

        return $product;
    }

    public function getRelatedProducts($product, $limit = 4)
    {
        return $this->repository->getRelatedProducts($product, $limit);
    }

    public function getFeaturedProducts()
    {
        return [
            "SmartPhone" => $this->repository->getFeatureProductByCategory( categoryId: 1),
            "Laptop" => $this->repository->getFeatureProductByCategory( categoryId: 2),
            "SmartWatch" => $this->repository->getFeatureProductByCategory( categoryId: 3),
            "HeadPhone" => $this->repository->getFeatureProductByCategory( categoryId: 4),
            "Accessory" => $this->repository->getFeatureProductByCategory( categoryId: 4),
        ];
    }

    public function getProductOnIndex($request)
    {
        return $this->repository->getProductOnIndex($request);
    }
}
