<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function checkout() {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        $totalPrice = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        if ($totalPrice == 0) {
            return redirect()->route('cart')->with('error', 'Your cart is empty!');
        }

        return view('checkout.index', compact('cartItems', 'totalPrice'));
    }

    public function placeOrder() {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $totalPrice = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        if ($totalPrice == 0) {
            return redirect()->route('cart')->with('error', 'Your cart is empty!');
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('home')->with('success', 'Order placed successfully!');
    }
}
