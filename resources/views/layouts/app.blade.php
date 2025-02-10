<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ShopSphere</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Navigation Bar -->
    <nav class="bg-blue-600 text-white p-4 shadow">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold">ShopSphere</a>

            <!-- Search Bar -->
            <form action="{{ route('products.search') }}" method="GET" class="flex bg-white text-gray-800 rounded-lg">
                <input type="text" name="query" placeholder="Search products..." class="p-2 rounded-l-lg focus:outline-none w-64">
                <button type="submit" class="bg-green-500 px-4 rounded-r-lg">Search</button>
            </form>

            <!-- Nav Links -->
            <ul class="flex space-x-4">
                <li><a href="{{ route('home') }}" class="hover:underline">Home</a></li>
                <li><a href="{{ route('categories.index') }}" class="hover:underline">Categories</a></li>
                <li><a href="{{ route('cart') }}" class="hover:underline">Cart</a></li>

                @auth
                    <li><a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="hover:underline">Logout</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" class="hover:underline">Login</a></li>
                    <li><a href="{{ route('register') }}" class="hover:underline">Register</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="bg-green-500 text-white text-center p-2">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-500 text-white text-center p-2">
            {{ session('error') }}
        </div>
    @endif

    <!-- Main Content -->
    <div class="container mx-auto mt-6">
        @yield('content')
    </div>

</body>
</html>
