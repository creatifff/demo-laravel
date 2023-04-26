<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Home page
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function home()
    {
        return view('pages.home');
    }

    /**
     * Login page
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function login()
    {
        return view('pages.auth.login');
    }

    /**
     * Register page
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function register()
    {
        return view('pages.auth.register');
    }

    /**
     * All products page
     *
     * @return Factory|\Illuminate\Foundation\Application|View|Application
     */
    public function allProducts(Request $request): Factory|\Illuminate\Foundation\Application|View|Application
    {
        $collections = Collection::all();

        $products = Product::query()->where('is_published', '=', true);

        if($request->has('collection')) {
            $products = $products->where('collection_id', '=', $request->get('collection'));
        }

        $products = $products->paginate(20)->withQueryString();

        return view('pages.products', compact('products', 'collections'));
    }
}
