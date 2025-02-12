@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto my-10">
    <h1 class="text-2xl font-bold mb-5">Shopping Cart</h1>

    @if(session('success'))
        <div class="p-4 mb-4 text-green-800 bg-green-200 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if(empty($cart))
        <p class="text-gray-500">Your cart is empty.</p>
    @else
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 border">Product</th>
                    <th class="p-2 border">Price</th>
                    <th class="p-2 border">Quantity</th>
                    <th class="p-2 border">Total</th>
                    <th class="p-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $id => $item)
                    @php $total += $item['price'] * $item['quantity']; @endphp
                    <tr>
                        <td class="p-2 border">{{ $item['name'] }}</td>
                        <td class="p-2 border">${{ number_format($item['price'], 2) }}</td>
                        <td class="p-2 border">{{ $item['quantity'] }}</td>
                        <td class="p-2 border">${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                        <td class="p-2 border">
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                <button class="bg-red-500 text-white px-2 py-1 rounded">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-5">
            <p class="text-xl font-bold">Total: ${{ number_format($total, 2) }}</p>
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button class="mt-2 bg-red-500 text-white px-4 py-2 rounded">Clear Cart</button>
            </form>
        </div>
    @endif
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto my-10">
    <h1 class="text-2xl font-bold mb-5">Shopping Cart</h1>

    @if(session('success'))
        <div class="p-4 mb-4 text-green-800 bg-green-200 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if(empty($cart))
        <p class="text-gray-500">Your cart is empty.</p>
    @else
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 border">Product</th>
                    <th class="p-2 border">Price</th>
                    <th class="p-2 border">Quantity</th>
                    <th class="p-2 border">Total</th>
                    <th class="p-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $id => $item)
                    @php $total += $item['price'] * $item['quantity']; @endphp
                    <tr>
                        <td class="p-2 border">{{ $item['name'] }}</td>
                        <td class="p-2 border">${{ number_format($item['price'], 2) }}</td>
                        <td class="p-2 border">{{ $item['quantity'] }}</td>
                        <td class="p-2 border">${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                        <td class="p-2 border">
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                <button class="bg-red-500 text-white px-2 py-1 rounded">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-5">
            <p class="text-xl font-bold">Total: ${{ number_format($total, 2) }}</p>
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button class="mt-2 bg-red-500 text-white px-4 py-2 rounded">Clear Cart</button>
            </form>
        </div>
    @endif
</div>
@endsection
