<style>
    body {
        background-color: #F5F5F5;
        color: #2D2D2D;
    }
    .btn-primary {
        background-color: #1D4ED8;
        border: none;
    }
    .btn-primary:hover {
        background-color: #2EE2A2;
    }
</style>

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <h2 style="color: #1D4ED8; font-size: 24px;">ShopSphere Login</h2>
        </x-slot>

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div>
                <x-label for="email" value="Email" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" value="Password" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Login Button -->
            <div class="flex items-center justify-end mt-4">
                <x-button class="btn-primary">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
