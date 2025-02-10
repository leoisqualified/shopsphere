@extends('layouts.app')

@section('content')
<div class="container">
    <div class="grid grid-cols-2 gap-4">
        <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-96 object-cover rounded">

        <div>
            <h1 class="text-2xl font-bold">{{ $product->name }}</h1>
            <p class="text-gray-600 mt-2">{{ $product->description }}</p>
            <p class="text-xl font-semibold mt-4 text-blue-600">${{ number_format($product->price, 2) }}</p>

            <form method="POST" action="{{ route('cart.add', $product->id) }}">
                @csrf
                <button class="mt-4 bg-green-500 text-white px-4 py-2 rounded">Add to Cart</button>
            </form>
        </div>
    </div>
</div>
@endsection
