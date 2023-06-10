<?php

namespace App\Providers;

use App\Http\Controllers\Admin\ProductController;
use App\Models\ProductCategories;
use App\Models\WebInformation;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
class InformationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $informationView = [
            'client.pages.home',
            'client.pages.shop',
            'client.pages.blog',
            'client.pages.about',
            'client.pages.contact',
            'client.blocks.header',
            'client.blocks.footer',
            'client.blocks.cart',
        ];
        View::composer($informationView, function ($view) {
            $webInformation = WebInformation::first();
            $categories = ProductCategories::all();
            $view->with('webInformation', $webInformation)->with('categories' ,$categories);
        });
    }
}
