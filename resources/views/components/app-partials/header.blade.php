<nav class="header print:hidden">
    <!-- App Header  -->
    <div class="header-container relative flex w-full bg-slate-200 dark:bg-navy-800 print:hidden">
        <!-- Header Items -->
        <div class="flex w-full items-center justify-between">
            <!-- Left: Sidebar Toggle Button -->
            <div class="flex items-center">
                <div class="h-7 w-7">
                    <button
                        class="menu-toggle ml-0.5 flex h-7 w-7 flex-col justify-center space-y-1.5 text-accent-light outline-none focus:outline-none
                    dark:text-primary"
                        :class="$store.global.isSidebarExpanded && 'active'"
                        @click="$store.global.isSidebarExpanded = !$store.global.isSidebarExpanded">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>

            <div class="flex space-x-2 items-center">
                <img class="h-12 w-auto transition-transform duration-500 ease-in-out hover:rotate-[20deg]"
                     src="{{asset('images/app-logo-tribunal.png') }}" alt="logo" x-show="!$store.global.isDarkModeEnabled" />
                <img class="h-12 w-auto transition-transform duration-500 ease-in-out hover:rotate-[20deg]"
                     src="{{asset('images/app-logo-tribunal-dark.png') }}" alt="logo" x-show="$store.global.isDarkModeEnabled" />
                <div class="h-12 py-1 flex">
                    <div class="h-full w-px bg-primary/50 dark:bg-accent/60"></div>
                </div>
                <span class="text-slate-600 dark:text-navy-400">{{ config('app.subname') }}</span>
                <div class="h-12 py-1 flex">
                    <div class="h-full w-px bg-primary/50 dark:bg-accent/60"></div>
                </div>
                <img class="h-12 w-auto transition-transform duration-500 ease-in-out hover:rotate-[20deg]"
                     src="{{asset('images/app-logo-consejo.png') }}" alt="logo" x-show="!$store.global.isDarkModeEnabled" />
                <img class="h-12 w-auto transition-transform duration-500 ease-in-out hover:rotate-[20deg]"
                     src="{{asset('images/app-logo-consejo-dark.png') }}" alt="logo" x-show="$store.global.isDarkModeEnabled" />
            </div>

            <!-- Right: Header buttons -->
            <div class="-mr-1.5 flex items-center space-x-2">
                @if(Auth::user()->isAdministrador())
                    <!-- Main Searchbar -->
                    <template x-if="$store.breakpoints.smAndUp">
                        <div class="flex" x-data="usePopper({ placement: 'bottom-end', offset: 12 })"
                             @click.outside="if(isShowPopper) isShowPopper = false">
                            <div class="relative mr-4 flex h-8">
                                <input value="Accesos rápidos"
                                       class="peer h-full w-60 rounded-full bg-slate-300 px-4 pl-9 text-xs+ text-slate-800 ring-primary/50
                                hover:bg-slate-150/70 focus:ring focus:bg-slate-150/70
                                dark:bg-navy-700/50 dark:text-navy-300 dark:ring-accent/50 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                       type="button"
                                       @click="isShowPopper = !isShowPopper"
                                       x-ref="popperRef"/>
                                <div
                                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary
                                dark:text-navy-300 dark:peer-focus:text-accent">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="h-4.5 w-4.5 transition-colors duration-200" fill="currentColor"
                                         viewBox="0 0 24 24">
                                        <path
                                            d="M9.85714 3H4.14286C3.51167 3 3 3.51167 3 4.14286V9.85714C3 10.4883 3.51167 11 4.14286 11H9.85714C10.4883 11 11 10.4883 11 9.85714V4.14286C11 3.51167 10.4883 3 9.85714 3Z"
                                            class="fill-accent-light dark:fill-navy-200"/>
                                        <path
                                            d="M9.85714 12.8999H4.14286C3.51167 12.8999 3 13.4116 3 14.0428V19.757C3 20.3882 3.51167 20.8999 4.14286 20.8999H9.85714C10.4883 20.8999 11 20.3882 11 19.757V14.0428C11 13.4116 10.4883 12.8999 9.85714 12.8999Z"
                                            class="fill-accent-light dark:fill-navy-200"/>
                                        fill-opacity="0.3" />
                                        <path
                                            d="M19.757 3H14.0428C13.4116 3 12.8999 3.51167 12.8999 4.14286V9.85714C12.8999 10.4883 13.4116 11 14.0428 11H19.757C20.3882 11 20.8999 10.4883 20.8999 9.85714V4.14286C20.8999 3.51167 20.3882 3 19.757 3Z"
                                            class="fill-accent-light dark:fill-navy-200"/>
                                        fill-opacity="0.3" />
                                        <path
                                            d="M19.757 12.8999H14.0428C13.4116 12.8999 12.8999 13.4116 12.8999 14.0428V19.757C12.8999 20.3882 13.4116 20.8999 14.0428 20.8999H19.757C20.3882 20.8999 20.8999 20.3882 20.8999 19.757V14.0428C20.8999 13.4116 20.3882 12.8999 19.757 12.8999Z"
                                            class="fill-accent-light dark:fill-navy-200"/>
                                        fill-opacity="0.3" />
                                    </svg>
                                </div>
                            </div>
                            <div :class="isShowPopper && 'show'" class="popper-root" x-ref="popperRoot">
                                <div
                                    class="popper-box flex max-h-[calc(100vh-6rem)] w-60 flex-col rounded-lg border border-slate-150 bg-white shadow-soft
                                dark:border-navy-700 dark:bg-navy-800 dark:shadow-soft-dark">

                                    <div class="is-scrollbar-hidden overflow-y-auto overscroll-contain pb-2">
                                        <div
                                            class="mt-3 flex items-center justify-between bg-slate-100 py-1.5 px-3 dark:bg-navy-800">
                                            <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
                                                Accesos rápidos
                                            </p>
                                        </div>

                                        <div class="mt-1 font-inter font-medium">
                                            <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800
                                        dark:hover:bg-navy-900 dark:hover:text-navy-200 dark:focus:bg-navy-900 dark:focus:text-navy-200"
                                               href="{{ route('proyectos.todos') }}">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                                                     fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                     stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                                </svg>
                                                <span>Proyectos</span>
                                            </a>
                                            <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800
                                        dark:hover:bg-navy-900 dark:hover:text-navy-200 dark:focus:bg-navy-900 dark:focus:text-navy-200"
                                               href="{{ route('catalogos.areas.index') }}">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                                                     fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                     stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                                </svg>
                                                <span>Áreas</span>
                                            </a>
                                            <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800
                                        dark:hover:bg-navy-900 dark:hover:text-navy-200 dark:focus:bg-navy-900"
                                               href="{{ route('catalogos.responsables.index') }}">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                                                     fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                     stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                                </svg>
                                                <span>Responsables</span>
                                            </a>
                                            <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800
                                        dark:hover:bg-navy-900 dark:hover:text-navy-200 dark:focus:bg-navy-900 dark:focus:text-navy-200"
                                               href="{{ route('catalogos.usuarios.index') }}">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                                                     fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                     stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                                </svg>
                                                <span>Usuarios</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                @endif

                <!-- Dark Mode Toggle -->
                <button @click="$store.global.isDarkModeEnabled = !$store.global.isDarkModeEnabled"
                        class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25
                    dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg x-show="$store.global.isDarkModeEnabled"
                         x-transition:enter="transition-transform duration-200 ease-out absolute origin-top"
                         x-transition:enter-start="scale-75" x-transition:enter-end="scale-100 static"
                         class="h-6 w-6 text-accent" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M11.75 3.412a.818.818 0 01-.07.917 6.332 6.332 0 00-1.4 3.971c0 3.564 2.98 6.494 6.706 6.494a6.86 6.86 0 002.856-.617.818.818 0 011.1 1.047C19.593 18.614 16.218 21 12.283 21 7.18 21 3 16.973 3 11.956c0-4.563 3.46-8.31 7.925-8.948a.818.818 0 01.826.404z"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" x-show="!$store.global.isDarkModeEnabled"
                         x-transition:enter="transition-transform duration-200 ease-out absolute origin-top"
                         x-transition:enter-start="scale-75" x-transition:enter-end="scale-100 static"
                         class="h-6 w-6 text-accent" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                              clip-rule="evenodd"/>
                    </svg>
                </button>

                <!-- Notification-->
                @livewire('gestionar-notificaciones')
            </div>
        </div>
    </div>
</nav>
