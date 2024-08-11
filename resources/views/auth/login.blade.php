<x-guest-layout>
    <div class="flex justify-center items-center min-h-screen bg-gradient-to-r from-blue-300 to-purple-500">
        <div
            class="bg-white p-10 rounded-lg shadow-xl max-w-md w-full transform transition-all duration-500 hover:scale-105">
            <div class="flex justify-center mb-6">
                <x-authentication-card-logo class="w-24 h-24 transform transition-all duration-500 hover:rotate-180" />
            </div>

            <x-validation-errors class="mb-4" />



            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <x-label for="email" value="{{ __('Email') }}" class="text-gray-700 font-semibold" />
                    <x-input id="email"
                        class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-purple-500 focus:ring-purple-500"
                        type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div class="mb-4">
                    <x-label for="password" value="{{ __('Password') }}" class="text-gray-700 font-semibold" />
                    <x-input id="password"
                        class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-purple-500 focus:ring-purple-500"
                        type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="flex items-center mb-4">
                    <x-checkbox id="remember_me" name="remember" />
                    <label for="remember_me" class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</label>
                </div>

                <div class="flex items-center justify-end">

                    <x-button
                        class="bg-purple-600 text-white hover:bg-purple-700 px-4 py-2 rounded-lg shadow-lg transform transition-all duration-300 hover:scale-105">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
