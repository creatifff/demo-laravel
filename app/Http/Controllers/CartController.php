<?php

namespace App\Http\Controllers;

use App\Mail\OrderCreatedMail;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    protected CartService $cartService;

    public function __construct()
    {
        $this->cartService = new CartService();
    }

    public function index()
    {
        $cart = $this->cartService;

        return view('pages.cart', compact('cart'));
    }

    public function remove(Product $product)
    {
        if ($this->cartService->remove($product)) {
            session()->flash('message', 'Product has been deleted');

            return back();
        }

        session()->flash('message', 'Product hasnt been deleted');

        return back();
    }



    public function createOrder()
    {
        if ($this->cartService->isEmpty()) {
            return back()->withErrors(['empty' => 'Вы ничего не добавили в корзину']);
        }

        $order = Order::query()->create([
            'user_id' => auth()->user()->id,
            'total' => $this->cartService->getTotal()
        ]);

        foreach ($this->cartService->get() as $item) {
            OrderProduct::query()->create([
               'order_id' => $order->id,
               'product_id' => $item->id
            ]);
        }

        $this->cartService->clear();

        Mail::to(auth()->user()->email)->send(new OrderCreatedMail($order));
        //oqfbjqeemuexkgmm
        return redirect()->route('page.home')->with('message', 'Order has been created');
    }
}
