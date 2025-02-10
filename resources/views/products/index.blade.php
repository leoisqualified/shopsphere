@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-xl font-bold text-gray-800">ShopSphere Products</h2>

    <div class="grid grid-cols-3 gap-4 mt-4">
        @foreach($products as $product)
            <div class="border p-4 bg-white rounded-lg shadow">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded">
                <h3 class="mt-2 text-lg font-semibold">{{ $product->name }}</h3>
                <p class="text-gray-600">${{ number_format($product->price, 2) }}</p>
                <a href="{{ route('products.show', $product->id) }}" class="block mt-2 bg-blue-600 text-white text-center py-2 rounded">View Product</a>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection
