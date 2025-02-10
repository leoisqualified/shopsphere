@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-xl font-bold">Shopping Cart</h2>

    @foreach($cartItems as $item)
        <div class="flex justify-between p-4 bg-white rounded shadow mt-4">
            <div>
                <h3 class="font-semibold">{{ $item->product->name }}</h3>
                <p>Price: ${{ number_format($item->product->price, 2) }}</p>
                <p>Quantity: {{ $item->quantity }}</p>
            </div>
            <form method="POST" action="{{ route('cart.remove', $item->product->id) }}">
                @csrf
                <button class="bg-red-500 text-white px-3 py-1 rounded">Remove</button>
            </form>
        </div>
    @endforeach

    <h3 class="text-lg font-bold mt-4">Total: ${{ number_format($totalPrice, 2) }}</h3>
    <a href="{{ route('checkout') }}" class="block mt-4 bg-blue-600 text-white text-center py-2 rounded">Proceed to Checkout</a>
</div>
@endsection
