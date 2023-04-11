<x-base-layout title="Autenticación en dos pasos">
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
            </div>

            <div x-data="{ recovery: false }">
                <div class="mb-4 text-sm text-slate-600 dark:text-navy-400" x-show="! recovery">
                    {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
                </div>

                <div class="mb-4 text-sm text-slate-600 dark:text-navy-400" x-show="recovery">
                    {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
                </div>

                <x-jet-validation-errors class="mb-4"/>

                <form method="POST" action="{{ route('two-factor.login') }}">
                    @csrf

                    <div class="mt-4" x-show="! recovery">
                        <x-jet-label for="code" value="{{ __('Code') }}"/>
                        <x-jet-input id="code" class="block mt-1 w-full" type="text" inputmode="numeric" name="code"
                                     autofocus x-ref="code" autocomplete="one-time-code"/>
                    </div>

                    <div class="mt-4" x-show="recovery">
                        <x-jet-label for="recovery_code" value="{{ __('Recovery Code') }}"/>
                        <x-jet-input id="recovery_code" class="block mt-1 w-full" type="text" name="recovery_code"
                                     x-ref="recovery_code" autocomplete="one-time-code"/>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="button" class="text-sm text-slate-600 hover:text-slate-900 dark:text-navy-400 dark:hover:text-navy-200 underline cursor-pointer"
                                x-show="! recovery"
                                x-on:click="
                                        recovery = true;
                                        $nextTick(() => { $refs.recovery_code.focus() })
                                    ">
                            {{ __('Use a recovery code') }}
                        </button>

                        <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                                x-show="recovery"
                                x-on:click="
                                        recovery = false;
                                        $nextTick(() => { $refs.code.focus() })
                                    ">
                            {{ __('Use an authentication code') }}
                        </button>

                        <x-jet-button class="ml-4">
                            {{ __('Log in') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-base-layout>
