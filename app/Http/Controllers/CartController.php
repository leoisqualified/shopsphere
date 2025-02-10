<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        $totalPrice = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        return view('cart.index', compact('cartItems', 'totalPrice'));
    }

    public function addToCart($id) {
        $product = Product::findOrFail($id);

        Cart::updateOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $id],
            ['quantity' => \DB::raw('quantity + 1')]
        );

        return redirect()->route('cart')->with('success', 'Product added to cart!');
    }

    public function removeFromCart($id) {
        Cart::where('user_id', Auth::id())->where('product_id', $id)->delete();

        return redirect()->route('cart')->with('success', 'Product removed from cart!');
    }
}
