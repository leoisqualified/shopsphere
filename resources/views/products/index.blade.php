<x-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">All Products</h2>
    </x-slot>

    <div class="grid grid-cols-3 gap-6">
        @foreach($products as $product)
            <div class="border p-4 rounded-lg shadow-md">
                <!-- Display Image -->
                <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-md mb-2">
                
                <h3 class="text-lg font-bold">{{ $product->name }}</h3>
                <p class="text-gray-600">${{ $product->price }}</p>
                <a href="{{ route('products.show', $product->id) }}" class="text-blue-500 hover:underline">View Details</a>
            </div>
        @endforeach
    </div>
</x-layout>
