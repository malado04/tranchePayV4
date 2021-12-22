<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
            <img src="{{asset ('image/logo.jpeg')}}" class="block h-10 w-auto fill-current text-gray-600"alt="">
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Prenom -->
            <div class="mt-4">
                <x-label for="prenom" :value="__('Prenom')" /> 

                <x-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus />
            </div>

            <!-- Nom -->
            <div class="mt-4">
                <x-label for="nom" :value="__('Nom')" />

                <x-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus />
            </div>

            <!-- Telephone -->
            <div class="mt-4">
                <x-label for="telephone" :value="__('Telephone')" />

                <x-input id="telephone" class="block mt-1 w-full" type="tel" name="telephone" :value="old('telephone')" required autofocus />
            </div>

            <input type="text" name="type" value="client" style="display:none;" >
            <!-- Password -->
            <div class="mt-4"> 
                <x-label for="password" :value="__('Code PIN')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirme Code PIN')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 " style="color:rgb(255,221,0);" href="{{ route('login') }}">
                    {{ __('Deja enregistrer') }}
                </a>

                <x-button class="ml-4" style="background-color:rgb(255,221,0); color:black;">
                    {{ __('Enregistrer') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
