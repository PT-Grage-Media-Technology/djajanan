<?php

namespace App\Providers;

use App\Models\Cms;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
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

        if (request()->isSecure()) {
            URL::forceScheme('https');
        }

        Paginator::currentPathResolver(function () {
            return request()->url();
        });

        Paginator::currentPageResolver(function ($pageName = 'page') {
            return request()->input($pageName, 1);
        });

          // Cek apakah aplikasi sedang dijalankan di localhost:8091 atau localhost:8080
          if (in_array(Request::getHost(), ['localhost:8091', 'localhost:8080'])) {
            // Redirect ke https://djajanan.com dengan mempertahankan URI
            return Redirect::to('https://djajanan.com' . Request::getRequestUri(), 301);
        }

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
