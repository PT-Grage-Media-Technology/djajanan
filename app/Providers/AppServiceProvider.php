<?php

namespace App\Providers;

use App\Models\Cms;
use App\Models\Product;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View as ViewInstance; // Tambahkan alias View yang benar

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Paginator::currentPathResolver(function () {
            return request()->url();
        });

        Paginator::currentPageResolver(function ($pageName = 'page') {
            return request()->input($pageName, 1);
        });

        //
        Model::unguard();


        // Pastikan parameter closure adalah instance dari Illuminate\View\View
        View::composer(['layouts.main', 'admin.layouts.main-admin', 'home', 'layouts.navigation', 'contact-us'], function (ViewInstance $view) {
            $cms = Cms::all();
            $products = Product::where('is_vip', true)->with('toko', 'category')->get();
            $view->with(['cms' => $cms, 'products' => $products]);
        });
    }
}
