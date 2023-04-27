<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        //  $products = Product::query()->inRandomOrder()->take(10)->get();
        $products = Product::query()->orderByDesc('id')->limit(5)->get();
        $orders = Order::query()->orderByDesc('id')->limit(5)->get();
        $users = User::query()->orderByDesc('id')->limit(5)->get();
        $collections = Collection::query()->orderByDesc('id')->limit(5)->get();


        return view('pages.admin.index', compact('products', 'orders', 'users', 'collections'));
    }

    public function createProduct()
    {
        $collections = Collection::all();

        return view('pages.admin.product.create', compact('collections'));
    }
}
