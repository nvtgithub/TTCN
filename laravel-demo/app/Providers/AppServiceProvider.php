<?php

namespace App\Providers;

use App\Models\ProductComment;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\ProductComment\ProductCommentRepository;
use App\Repositories\ProductComment\ProductCommentRepositoryInterface;
use App\Services\Product\ProductService;
use App\Services\Product\ProductServiceInterface;
use App\Services\ProductComment\ProductCommentService;
use App\Services\ProductComment\ProductCommentServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    //Product
    $this->app->singleton(
      ProductRepositoryInterface::class,
      ProductRepository::class
    );
    $this->app->singleton(
      ProductServiceInterface::class,
      ProductService::class
    );

    //ProductComment
    $this->app->singleton(
      ProductCommentRepositoryInterface::class,
      ProductCommentRepository::class
    );
    $this->app->singleton(
      ProductCommentServiceInterface::class,
      ProductCommentService::class
    );

    // ProductCategory
    $this->app->singleton(
      ProductCategoryRepositoryInterface::class,
      ProductCategoryRepository::class
    );
    $this->app->singleton(
      ProductCategoryServiceInterface::class,
      ProductCategoryService::class
    );
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    //
  }
}
