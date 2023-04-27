<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function toggleOrderStatus(Request $request, Order $order)
    {
        $order->update([
            'status' => $request->get('status')
        ]);

        return back();
    }
}
