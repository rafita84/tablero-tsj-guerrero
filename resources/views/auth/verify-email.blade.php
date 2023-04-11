<x-base-layout title="Verificación de correo">
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
                        {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                    </h2>
                </div>
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-slate-600 dark:text-navy-400">
                    {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
                </div>
            @endif

            <div class="mt-4 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <x-jet-button type="submit">
                            {{ __('Resend Verification Email') }}
                        </x-jet-button>
                    </div>
                </form>

                <div>
                    <a
                        href="{{ route('profile.show') }}"
                        class="underline text-sm text-gray-600 hover:text-gray-900"
                    >
                        {{ __('Edit Profile') }}</a>

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf

                        <button type="submit" class="underline text-sm ml-2">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-base-layout>
