<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="flex items-center min-h-fit padding-top-70 padding-bottom-70 sm:bg-white md:bg-gray-50 lg:bg-gray-50">
            <div class="flex-1 h-full max-w-4xl mx-auto bg-white rounded-2xl lg:shadow-xl md:shadow-xl">
                <div class="flex flex-col md:flex-row">
                    <div class="hidden md:flex lg:flex h-32 md:h-auto md:w-1/2">
                        <img class="object-cover h-full w-full" src="https://www.bp.com/content/dam/bp/country-sites/en_id/indonesia/home/products-and-services/fuels-retail/221221_article_1.png"
                             alt="img" />
                    </div>
                    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                        <div class="w-full">
                            <h1 class="mb-4 text-2xl font-bold text-center text-gray-700">
                                Neuen account erstellen
                            </h1>
                            <!-- Name -->
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('Passwort')" />

                                <x-text-input id="password" class="block mt-1 w-full"
                                              type="password"
                                              name="password"
                                              required autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-input-label for="password_confirmation" :value="__('Bestätige das Passwort')" />

                                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                              type="password"
                                              name="password_confirmation" required autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button class="ml-4">
                                    {{ __('Registrieren') }}
                                </x-primary-button>
                            </div>
                            <hr class="my-8" />

                            <div class="flex items-center text-center gap-4">
                                <h3 class="">Bereits registriert? <a href="{{ route('login') }}" class="text-blue-700 hover:text-blue-800">Anmelden</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-guest-layout>
