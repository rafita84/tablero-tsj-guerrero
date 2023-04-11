<x-base-layout title="Login">
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
        <!-- Dark Mode Toggle -->
        <button @click="$store.global.isDarkModeEnabled = !$store.global.isDarkModeEnabled"
                class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25
                    dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
            <svg x-show="$store.global.isDarkModeEnabled"
                 x-transition:enter="transition-transform duration-200 ease-out absolute origin-top"
                 x-transition:enter-start="scale-75" x-transition:enter-end="scale-100 static"
                 class="h-6 w-6 text-amber-400" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M11.75 3.412a.818.818 0 01-.07.917 6.332 6.332 0 00-1.4 3.971c0 3.564 2.98 6.494 6.706 6.494a6.86 6.86 0 002.856-.617.818.818 0 011.1 1.047C19.593 18.614 16.218 21 12.283 21 7.18 21 3 16.973 3 11.956c0-4.563 3.46-8.31 7.925-8.948a.818.818 0 01.826.404z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" x-show="!$store.global.isDarkModeEnabled"
                 x-transition:enter="transition-transform duration-200 ease-out absolute origin-top"
                 x-transition:enter-start="scale-75" x-transition:enter-end="scale-100 static"
                 class="h-6 w-6 text-amber-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                      d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                      clip-rule="evenodd"/>
            </svg>
        </button>
        <div class="flex w-full max-w-sm grow flex-col justify-center p-5 relative">
            <div class="text-center">
                <div class="flex">
                <img class="h-20 w-auto mx-auto lg:hidden"
                     src="{{asset('images/app-logo-tribunal.png') }}" alt="logo"/>
                <img class="h-20 w-auto mx-auto lg:hidden"
                     src="{{asset('images/app-logo-consejo.png') }}" alt="logo"/>
                </div>
                <p class="mt-4 text-sm font-thin text-accent lg:hidden dark:text-navy-100">
                    {{ config('app.subname') }}
                </p>
                <div class="mt-4">
                    <h2 class="text-2xl font-semibold text-slate-600 dark:text-navy-100">
                        Bienvenido(a)
                    </h2>
                    <p class="text-slate-400 dark:text-navy-400">
                        Por favor ingrese sus datos para continuar
                    </p>
                </div>
            </div>
            <form class="mt-16" action="{{ route('login') }}" method="post">
                @csrf
                <div>
                    <label class="relative flex">
                        <input
                            class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring
                            dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-400 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                            placeholder="Usuario o correo electrónico" type="text" name="identity"
                            value="{{ old('identity') }}"/>
                        <span
                            class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary
                            dark:text-navy-300 dark:peer-focus:text-accent">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </span>
                    </label>
                    @error('identity')
                    <span class="text-tiny+ text-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-4">
                    <label class="relative flex">
                        <input
                            class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring
                            dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-400 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                            placeholder="Contraseña" type="password" name="password"
                            value="{{ old('password') }}"/>
                        <span
                            class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </span>
                    </label>
                    @error('password')
                    <span class="text-tiny+ text-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-4 flex items-center justify-between space-x-2">
                    <label class="inline-flex items-center space-x-2">
                        <input
                            class="form-checkbox is-outline h-5 w-5 rounded border-slate-400/70 bg-slate-100 before:bg-primary checked:border-primary hover:border-primary focus:border-primary
                            dark:border-navy-600 dark:bg-navy-900 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                            type="checkbox" id="remember_me" name="remember"/>
                        <span class="line-clamp-1">Mantener sesión</span>
                    </label>
                    <a href="{{ route('password.request') }}"
                       class="text-xs text-slate-400 transition-colors line-clamp-1 hover:text-slate-800 focus:text-slate-800
                        dark:text-navy-400 dark:hover:text-accent dark:focus:text-accent">
                        ¿Olvidó la contraseña?
                    </a>
                </div>
                <button type="submit"
                        class="btn mt-10 h-10 w-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90
                    dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                    Ingresar
                </button>
            </form>
        </div>
        <div class="my-5 flex justify-center text-xs text-slate-400 dark:text-navy-400">
            <a href="{{ route('policy.show') }}" target="_blank">Política de privacidad</a>
            <div class="mx-3 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>
            <a href="{{ route('terms.show') }}" target="_blank">Términos de servicio</a>
        </div>
    </main>
</x-base-layout>
