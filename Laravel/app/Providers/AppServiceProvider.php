<?php

namespace App\Providers;

use App\Services\AuthService;
use App\Services\ProfileService;
use App\Services\ProductService;
use App\Services\ImageService;
use App\Services\ItemService;

use App\Contracts\AuthServiceInterface;
use App\Contracts\AuthRepositoryInterface;
use App\Contracts\ProfileServiceInterface;
use App\Contracts\ProfileRepositoryInterface;
use App\Contracts\ProductServiceInterface;
use App\Contracts\ProductRepositoryInterface;
use App\Contracts\ImageServiceInterface;
use App\Contracts\ItemRepositoryInterface;
use App\Contracts\ItemServiceInterface;

use App\Repositories\ProfileRepository;
use App\Repositories\AuthRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ItemRepository;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    
    public function register()
    {

        $this->app->bind(AuthServiceInterface::class, AuthService::class);
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(ProfileServiceInterface::class, ProfileService::class);
        $this->app->bind(ProfileRepositoryInterface::class, ProfileRepository::class);
        $this->app->bind(ImageServiceInterface::class, ImageService::class);
        $this->app->bind(ProductServiceInterface::class, ProductService::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(ItemServiceInterface::class, ItemService::class);
        $this->app->bind(ItemRepositoryInterface::class, ItemRepository::class);
    }

    public function boot()
    {
        $this->app['request']->headers->set('Accept', 'application/json');
    }

}
