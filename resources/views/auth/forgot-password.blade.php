<x-base-layout title="Olvidaste la contraseña">
    <div class="hidden w-full place-items-center lg:grid">
        <div class="w-full flex items-center justify-between space-x-2 p-6 lg:px-12 bg-white dark:bg-navy-800">
            <img class="h-20 w-auto" x-show="!$store.global.isDarkModeEnabled"
                 src="{{asset('images/app-logo-tribunal.png') }}" alt="logo"/>

            <img class="h-20 w-auto" x-show="$store.global.isDarkModeEnabled"
                 src="{{asset('images/app-logo-tribunal-dark.png') }}" alt="logo"/>


            <div class="grid grid-cols-1">
                <p class="text-3xl font-semibold text-primary dark:text-accent">
                    {{ config('app.name') }}
                </p>
                <p class="text-sm font-thin text-slate-700 dark:text-navy-100">
                    {{ config('app.subname') }}
                </p>
            </div>

            <img class="h-20 w-auto" x-show="!$store.global.isDarkModeEnabled"
                 src="{{asset('images/app-logo-consejo.png') }}" alt="logo"/>
            <img class="h-20 w-auto" x-show="$store.global.isDarkModeEnabled"
                 src="{{asset('images/app-logo-consejo-dark.png') }}" alt="logo"/>
        </div>
        <div class="w-full max-w-2xl p-6">
            <img class="w-full opacity-80"
                 src="{{asset('images/illustrations/teamwork.svg') }}" alt="image"/>
        </div>
    </div>
    <main class="flex w-full flex-col items-center
    bg-white dark:bg-navy-800 lg:max-w-md">
        <div class="flex w-full max-w-sm grow flex-col justify-center p-5">
            <div class="text-center">
                <img class="mx-auto h-40 w-40 lg:hidden"
                     src="{{asset('images/logo-escudo.png') }}" alt="logo" x-show="!$store.global.isDarkModeEnabled" />
                <img class="mx-auto h-40 w-40 lg:hidden"
                     src="{{asset('images/logo-escudo-dark.png') }}" alt="logo" x-show="$store.global.isDarkModeEnabled" />
                <p class="mt-4 text-xs+ font-thin text-slate-700 lg:hidden dark:text-navy-100">
                    {{ config('app.subname') }}
                </p>
                <div class="mt-4">
                    <h2 class="text-2xl font-semibold text-slate-600 dark:text-navy-100">
                        ¿Olvidó la contraseña?
                    </h2>
                    <p class="text-slate-400 dark:text-navy-400">
                        No hay problema, ingrese su dirección de correo electrónico y le enviaremos un enlace de recuperación para que pueda seleccionar una nueva contraseña.
                    </p>
                </div>
            </div>

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-center text-slate-600 dark:text-navy-300">
                    {{ session('status') }}
                </div>
            @endif

            <x-jet-validation-errors class="mb-4" />

            <form class="mt-16" action="{{ route('password.email') }}" method="post">
                @csrf

                <label class="relative flex">
                    <input
                        class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring
                        dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-400 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                        placeholder="Correo electrónico" type="email" name="email" required autofocus />
                    <span
                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </span>
                </label>

                <button
                    class="btn mt-10 h-10 w-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                    Envía un enlace de recuperación
                </button>
                <div class="mt-4 text-center text-xs+">
                    <p class="line-clamp-1">
                        <span>Ya tengo una cuenta</span>

                        <a class="text-primary transition-colors hover:text-primary-focus
                        dark:text-navy-600 dark:hover:text-accent"
                           href="{{ route('login') }}">Ingresar</a>
                    </p>
                </div>
            </form>
        </div>
        <div class="my-5 flex justify-center text-xs text-slate-400 dark:text-navy-400">
            <a href="{{ route('policy.show') }}" target="_blank">Política de privacidad</a>
            <div class="mx-3 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>
            <a href="{{ route('terms.show') }}" target="_blank">Términos de servicio</a>
        </div>
    </main>
</x-base-layout>
