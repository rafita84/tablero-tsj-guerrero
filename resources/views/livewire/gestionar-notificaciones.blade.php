<div
    x-data="usePopper({ placement: 'bottom-end', offset: 12})"
    @click.outside="if(isShowPopper) isShowPopper = false" class="flex">
    <button
        @click="isShowPopper = !isShowPopper" x-ref="popperRef"
        class="btn relative h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-accent dark:text-navy-100"
             stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M15.375 17.556h-6.75m6.75 0H21l-1.58-1.562a2.254 2.254 0 01-.67-1.596v-3.51a6.612 6.612 0 00-1.238-3.85 6.744 6.744 0 00-3.262-2.437v-.379c0-.59-.237-1.154-.659-1.571A2.265 2.265 0 0012 2c-.597 0-1.169.234-1.591.65a2.208 2.208 0 00-.659 1.572v.38c-2.621.915-4.5 3.385-4.5 6.287v3.51c0 .598-.24 1.172-.67 1.595L3 17.556h12.375zm0 0v1.11c0 .885-.356 1.733-.989 2.358A3.397 3.397 0 0112 22a3.397 3.397 0 01-2.386-.976 3.313 3.313 0 01-.989-2.357v-1.111h6.75z"/>
        </svg>

        @if(count($notificaciones) || count($recordatorios))
            <span class="absolute -top-px -right-px flex h-3 w-3 items-center justify-center">
                <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-warning opacity-80"></span>
                <span class="inline-flex h-2 w-2 rounded-full bg-error"></span>
            </span>
        @endif
    </button>
    <div :class="isShowPopper && 'show'" class="popper-root" x-ref="popperRoot" wire:ignore.self>
        <div
            class="popper-box mx-4 mt-1 flex max-h-[calc(100vh-6rem)] w-[calc(100vw-2rem)] flex-col rounded-lg border border-slate-150 bg-white shadow-soft dark:border-navy-800 dark:bg-navy-700 dark:shadow-soft-dark sm:m-0 sm:w-80">

            @if(count($recordatorios))
                <div class="rounded-t-lg bg-slate-100 text-slate-600 dark:bg-navy-800 dark:text-navy-200">
                    <div class="flex items-center justify-between px-4 pt-2 pb-2">
                        <div class="flex items-center space-x-2">
                            <h3 class="font-medium text-slate-700 dark:text-navy-100">
                                Recordatorios
                            </h3>
                            <div
                                class="badge h-5 rounded-full bg-primary/10 px-1.5 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                                {{ count($recordatorios) }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content flex flex-col overflow-hidden">
                    <div
                        x-transition:enter="transition-all duration-300 easy-in-out"
                        x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                        x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
                        class="is-scrollbar-hidden overflow-y-auto">

                        @foreach($recordatorios as $recordatorio)
                            <div class="flex items-center space-x-3 py-4 px-4 hover:bg-info/10">
                                <div>
                                    <p class="font-medium text-slate-600 dark:text-navy-100">
                                        {{ $recordatorio['mensaje'] }}
                                    </p>
                                    <div class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                        {{ $recordatorio['proyecto'] }}
                                    </div>
                                    <div class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-400">
                                        {{ $recordatorio['fecha'] }}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            @endif

            @if(count($notificaciones))
                <div class="rounded-t-lg bg-slate-100 text-slate-600 dark:bg-navy-800 dark:text-navy-200">
                    <div class="flex items-center justify-between px-4 pt-2 pb-2">
                        <div class="flex items-center space-x-2">
                            <h3 class="font-medium text-slate-700 dark:text-navy-100">
                                Notificaciones
                            </h3>
                            <div
                                class="badge h-5 rounded-full bg-primary/10 px-1.5 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                                {{ count($notificaciones) }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content flex flex-col overflow-hidden">
                    <div
                        x-transition:enter="transition-all duration-300 easy-in-out"
                        x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                        x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
                        class="is-scrollbar-hidden overflow-y-auto">

                        @foreach($notificaciones as $notificacion)
                            <div class="flex items-center space-x-3 py-4 px-4 hover:bg-info/10">
                                <button title="Marcar como leída"
                                        wire:click="marcar({{$notificacion->id}})"
                                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-info/10 hover:bg-info text-info hover:text-white">
                                    <i class="fa fa-search"></i>
                                </button>
                                <div>
                                    <p class="font-medium text-slate-600 dark:text-navy-100">
                                        {{ $notificacion->observacion }}
                                    </p>
                                    <div class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                        {{ $notificacion->proyecto->nombre }}
                                    </div>
                                    <div class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-400">
                                        {{ $notificacion->created_at }}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            @endif
            @if(!count($notificaciones) && !count($recordatorios))
                <div class="mt-8 pb-8 text-center">
                    <img class="mx-auto w-36"
                         src="{{ asset('images/illustrations/empty-girl-box.svg') }}"
                         alt="image"/>
                    <div class="mt-5">
                        <p class="text-base font-semibold text-slate-700 dark:text-navy-100">
                            No hay notificaciones
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
