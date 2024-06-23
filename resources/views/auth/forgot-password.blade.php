<x-guest-layout>
    <div class="flex items-center min-h-fit padding-top-70 padding-bottom-70 sm:bg-white md:bg-gray-50 lg:bg-gray-50">
        <div class="flex-1 h-full max-w-2xl mx-auto bg-white rounded-2xl lg:shadow-xl md:shadow-xl">
            <div class="flex items-center justify-center p-6 sm:p-12">
                <div class="w-full">
                    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Haben Sie Ihr Passwort vergessen? Kein Problem. Teilen Sie uns einfach Ihre E-Mail-Adresse mit und wir senden Ihnen per E-Mail einen Link zum Zurücksetzen Ihres Passworts, mit dem Sie ein neues Passwort auswählen können.') }}
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button>
                            {{ __('Passwort zurücksetzen') }}
                        </x-primary-button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
