<x-guest-layout>
    <div class="flex items-center min-h-fit padding-top-70 padding-bottom-70 sm:bg-white md:bg-gray-50 lg:bg-gray-50">
        <div class="flex-1 h-full max-w-2xl mx-auto bg-white rounded-2xl lg:shadow-xl md:shadow-xl">
            <div class="flex items-center justify-center p-6 sm:p-12">
                <div class="w-full">
                    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Danke für\'s Registrieren! Bevor Sie beginnen, können Sie Ihre E-Mail-Adresse überprüfen, indem Sie auf den Link klicken, den wir Ihnen gerade per E-Mail zugesandt haben. Wenn Sie die E-Mail nicht erhalten haben, senden wir Ihnen gerne eine neue zu.') }}
                    </div>

                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('Ein neuer Bestätigungslink wurde an die E-Mail-Adresse gesendet, die Sie bei der Registrierung angegeben haben.') }}
                        </div>
                    @endif

                    <div class="mt-4 flex items-center justify-between">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf

                            <div>
                                <x-primary-button>
                                    {{ __('Bestätigungsmail erneut senden') }}
                                </x-primary-button>
                            </div>
                        </form>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" style="text-decoration: none;" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                {{ __('Ausloggen') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
