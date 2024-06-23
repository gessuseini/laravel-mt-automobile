<x-user-panel>
    <main class="bg-white shadow">
        <header>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Settings</h1>
            </div>
        </header>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                    <div class="w-full px-6 py-6 mx-auto loopple-min-height-78vh text-slate-500">
                        <div class="flex flex-wrap -mx-3 removable">
                            <div class="relative flex-col max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 sm:rounded-lg">
                                    <div class="max-w-xl">
                                        @include('profile.partials.update-profile-information-form')
                                    </div>
                                </div>
                                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 sm:rounded-lg">
                                    <div class="max-w-xl">
                                        @include('profile.partials.update-password-form')
                                    </div>
                                </div>
                                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 sm:rounded-lg">
                                    <div class="max-w-xl">
                                        @include('profile.partials.update-phone-number')
                                    </div>
                                </div>

                                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 sm:rounded-lg">
                                    <div class="max-w-xl">
                                        @include('profile.partials.delete-user-form')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </main>
</x-user-panel>
