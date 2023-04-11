<x-base-layout title="Confirmar contraseña">
    <div class="fixed top-0 hidden p-6 lg:block lg:px-12">
        <a href="#" class="flex items-center space-x-2">
            <img class="h-20 w-20"
                 src="{{asset('images/logo-escudo.png') }}" alt="logo" x-show="!$store.global.isDarkModeEnabled"/>
            <img class="h-20 w-20"
                 src="{{asset('images/logo-escudo-dark.png') }}" alt="logo" x-show="$store.global.isDarkModeEnabled"/>
            <div class="grid grid-cols-1">
                <p class="text-xl font-semibold text-slate-700 dark:text-accent">
                    {{ config('app.name') }}
                </p>
                <p class="text-xs+ font-thin text-slate-700 dark:text-navy-100">
                    {{ config('app.subname') }}
                </p>
            </div>
        </a>
    </div>
    <div class="hidden w-full place-items-center lg:grid">
        <div class="w-full max-w-2xl p-6">
            <img class="w-full"
                 src="{{asset('images/illustrations/teamwork.svg') }}" alt="image"/>
        </div>
    </div>
    <main class="flex w-full flex-col items-center
    bg-white dark:bg-navy-800 lg:max-w-md border-l-accent border-l-2 dark:border-l-primary">

        <div class="flex w-full max-w-sm grow flex-col justify-center p-5">
            <div class="text-center mb-4">
                <img class="mx-auto h-40 w-40 lg:hidden"
                     src="{{asset('images/logo-escudo.png') }}" alt="logo" x-show="!$store.global.isDarkModeEnabled"/>
                <img class="mx-auto h-40 w-40 lg:hidden"
                     src="{{asset('images/logo-escudo-dark.png') }}" alt="logo"
                     x-show="$store.global.isDarkModeEnabled"/>
                <p class="mt-4 text-xs+ font-thin text-slate-700 lg:hidden dark:text-navy-100">
                    {{ config('app.subname') }}
                </p>
                <div class="mt-4">
                    <h2 class="text-2xl font-semibold text-slate-600 dark:text-navy-100">
                        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                    </h2>
                </div>
            </div>

            <x-jet-validation-errors class="mb-4"/>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div>
                    <x-jet-label for="password" value="{{ __('Password') }}"/>
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                 autocomplete="current-password" autofocus/>
                </div>

                <div class="flex justify-end mt-4">
                    <x-jet-button class="ml-4">
                        {{ __('Confirm') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </main>
</x-base-layout>
