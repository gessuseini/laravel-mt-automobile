<x-guest-layout>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="flex items-center min-h-fit padding-top-70 padding-bottom-70 sm:bg-white md:bg-gray-50 lg:bg-gray-50">
            <div class="flex-1 h-full max-w-4xl mx-auto bg-white rounded-2xl lg:shadow-xl md:shadow-xl">
                <div class="flex flex-col md:flex-row">
                    <div class="hidden md:flex lg:flex h-32 md:h-auto md:w-1/2">
                        <img class="object-cover h-full w-full" src="https://www.bp.com/content/dam/bp/country-sites/en_id/indonesia/home/products-and-services/fuels-retail/news-article/221221_article_1.png"
                             alt="img" />
                    </div>
                    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                        <div class="w-full">
                            <x-auth-session-status class="mb-4" :status="session('status')" />
                            <h1 class="mb-4 text-2xl font-bold text-center text-gray-700">
                                Ins konto einloggen
                            </h1>
                            <div>
                                <label class="block text-sm">
                                    Email
                                </label>
                                <x-text-input
                                       id="email"
                                       type="email"
                                       class="w-full px-4 py-2 text-sm border rounded-lg focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-600"
                                       placeholder=""
                                       name="email" :value="old('email')" required autofocus autocomplete="username"
                                />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div>
                                <label class="block mt-4 text-sm">
                                    Passwort
                                </label>
                                <x-text-input
                                    id="password"
                                    type="password"
                                    name="password"
                                    class="w-full px-4 py-2 text-sm border rounded-md focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-600"
                                    placeholder=""
                                    required autocomplete="current-password"
                                />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Remember Me -->
                            <div class="block mt-4">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            @if (Route::has('password.request'))
                            <p class="mt-4">
                                <a class="text-sm text-blue-600 hover:underline" style="color: {{ $globalSettings->website_theme_color }};" href="{{ route('password.request') }}">
                                    Haben Sie Ihr Passwort vergessen?
                                </a>
                            </p>
                            @endif

                            <x-primary-button>
                                {{ __('Log in') }}
                            </x-primary-button>
                            <hr class="my-8" />

                            @if (Route::has('password.request'))
                                <div class="flex items-center -center gap-4">
                                    <h3 class="">Sie haben noch kein Konto? <a href="{{ route('register') }}" style="color: {{ $globalSettings->website_theme_color }};" class="text-blue-700 hover:text-blue-800">Anmeldung</a></h3>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-guest-layout>
