<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Http\Interfaces\EndUser\HomeInterface',
            'App\Http\Repositories\EndUser\HomeRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\AuthInterface',
            'App\Http\Repositories\AuthRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\CategoryInterface',
            'App\Http\Repositories\CategoryRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\Sub_CategoryInterface',
            'App\Http\Repositories\Sub_CategoryRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\ProductInterface',
            'App\Http\Repositories\ProductRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\ProductDetailsInterface',
            'App\Http\Repositories\ProductDetailsRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\SizeInterface',
             'App\Http\Repositories\SizeRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\SizeUnitInterface',
            'App\Http\Repositories\SizeUnitRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\Category_PolicyInterface',
            'App\Http\Repositories\Category_PolicyRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\PolicyInterface',
            'App\Http\Repositories\PolicyRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\EndUser\ProductsInterface',
            'App\Http\Repositories\EndUser\ProductsRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\EndUser\WishListInterface',
            'App\Http\Repositories\EndUser\WishListRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\EndUser\AddressInterface',
            'App\Http\Repositories\EndUser\AddressRepository'
        );

        $this->app->bind(
            "App\Http\Interfaces\ColorsInterface",
            "App\Http\Repositories\ColorsRepository",

        );

        $this->app->bind(
            "App\Http\Interfaces\EndUser\CartInterface",
            "App\Http\Repositories\EndUser\CartRepository",

        );
        $this->app->bind(
            'App\Http\Interfaces\EndUser\UserInterface',
            'App\Http\Repositories\EndUser\UserRepository'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
