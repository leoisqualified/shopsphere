@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-xl font-bold">Categories</h2>

    <div class="grid grid-cols-3 gap-4 mt-4">
        @foreach($categories as $category)
            <div class="border p-4 bg-white rounded-lg shadow">
                <h3 class="text-lg font-semibold">{{ $category->name }}</h3>
                <a href="#" class="block mt-2 bg-blue-600 text-white text-center py-2 rounded">View Products</a>
            </div>
        @endforeach
    </div>
</div>
@endsection
