<x-guest-layout>    
    <x-auth-card>
    
        <x-slot name="logo">
            <a href="/">
            <img src="{{asset ('image/logo.jpeg')}}" class="block h-10 w-auto fill-current text-gray-600"alt="">
            </a> 
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}" >
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="login" :value="__('Telephone')" />

                <x-input id="login" class="block mt-1 w-full" type="text" name="login" :value="old('login')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Code PIN')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a style="width:100%" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" href="{{ route('password.request') }}">
                        {{ __('Code PIN oublié?') }}
                    </a>
                @endif

                <x-button class="ml-3 btn-warning" style="width:100%">
                    {{ __('Se connecter') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>