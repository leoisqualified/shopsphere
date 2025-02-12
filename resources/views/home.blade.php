@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-10">
        <h1 class="text-3xl font-bold mb-5">Welcome to Our Store</h1>

        <!-- Display Latest Products -->
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <div class="border p-4 rounded-lg shadow">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded">
                    <h2 class="text-xl font-semibold mt-3">{{ $product->name }}</h2>
                    <p class="text-gray-600">${{ $product->price }}</p>
                    <a href="{{ route('products.show', $product->id) }}" class="mt-3 inline-block bg-blue-500 text-white px-4 py-2 rounded">
                        View Product
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
