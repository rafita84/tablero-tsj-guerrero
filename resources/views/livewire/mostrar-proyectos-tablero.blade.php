<main class="main-content w-full px-[var(--margin-x)] pb-8">
    <div class="flex items-center space-x-4 py-5 lg:py-6 relative">
        <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
            Catálogo de Proyectos
        </h2>
        <div class="hidden h-full py-1 sm:flex">
            <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
        </div>
        <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
            <li class="flex items-center space-x-2 text-primary dark:text-accent">
                Resumen global de proyectos
            </li>
        </ul>
        <!-- Búsqueda -->
        <div class="flex absolute right-0" x-data="usePopper({ placement: 'bottom-end', offset: 12 })"
             @click.outside="if(isShowPopper) isShowPopper = false">
            <div class="relative mr-4 flex h-8">
                <input :placeholder="isShowPopper ? 'Buscar proyecto' : 'Buscar ...'"
                       class="form-input peer h-full rounded-full bg-slate-150 px-4 pl-9 text-xs+ text-slate-800 ring-primary/50 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:text-navy-100 dark:placeholder-navy-300 dark:ring-accent/50 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                       :class="isShowPopper ? 'w-80' : 'w-40'" @focus="isShowPopper= true" type="text"
                       x-ref="popperRef" wire:model.lazy="buscar"/>
                <div
                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-4.5 w-4.5 transition-colors duration-200" fill="currentColor"
                         viewBox="0 0 24 24">
                        <path
                            d="M3.316 13.781l.73-.171-.73.171zm0-5.457l.73.171-.73-.171zm15.473 0l.73-.171-.73.171zm0 5.457l.73.171-.73-.171zm-5.008 5.008l-.171-.73.171.73zm-5.457 0l-.171.73.171-.73zm0-15.473l-.171-.73.171.73zm5.457 0l.171-.73-.171.73zM20.47 21.53a.75.75 0 101.06-1.06l-1.06 1.06zM4.046 13.61a11.198 11.198 0 010-5.115l-1.46-.342a12.698 12.698 0 000 5.8l1.46-.343zm14.013-5.115a11.196 11.196 0 010 5.115l1.46.342a12.698 12.698 0 000-5.8l-1.46.343zm-4.45 9.564a11.196 11.196 0 01-5.114 0l-.342 1.46c1.907.448 3.892.448 5.8 0l-.343-1.46zM8.496 4.046a11.198 11.198 0 015.115 0l.342-1.46a12.698 12.698 0 00-5.8 0l.343 1.46zm0 14.013a5.97 5.97 0 01-4.45-4.45l-1.46.343a7.47 7.47 0 005.568 5.568l.342-1.46zm5.457 1.46a7.47 7.47 0 005.568-5.567l-1.46-.342a5.97 5.97 0 01-4.45 4.45l.342 1.46zM13.61 4.046a5.97 5.97 0 014.45 4.45l1.46-.343a7.47 7.47 0 00-5.568-5.567l-.342 1.46zm-5.457-1.46a7.47 7.47 0 00-5.567 5.567l1.46.342a5.97 5.97 0 014.45-4.45l-.343-1.46zm8.652 15.28l3.665 3.664 1.06-1.06-3.665-3.665-1.06 1.06z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    @if(count($proyectos))
    <div class="card mt-3">
        <table class="is-zebra w-full text-left" wire:loading.class="animation-unload">
            <thead>
            <tr>
                <th class="bg-accent px-4 py-3 font-semibold uppercase text-white dark:bg-navy-800 dark:text-navy-400 lg:px-5">
                    Inicio/Fin
                </th>
                <th class="bg-accent px-4 py-3 font-semibold uppercase text-white dark:bg-navy-800 dark:text-navy-400 lg:px-5">
                    Responsable
                </th>
                <th class="bg-accent px-4 py-3 font-semibold uppercase text-white dark:bg-navy-800 dark:text-navy-400 lg:px-5">
                    Nombre del proyecto
                </th>
                <th class="bg-accent px-4 py-3 font-semibold uppercase text-white dark:bg-navy-800 dark:text-navy-400 lg:px-5">
                    Áreas involucradas
                </th>
                <th class="bg-accent px-4 py-3 font-semibold uppercase text-white dark:bg-navy-800 dark:text-navy-400 lg:px-5">
                    Avance
                </th>
                <th class="bg-accent px-4 py-3 font-semibold uppercase text-white dark:bg-navy-800 dark:text-navy-400 lg:px-5">
                    Estatus
                </th>
                <th class="bg-accent px-4 py-3 font-semibold uppercase text-white dark:bg-navy-800 dark:text-navy-400 lg:px-5">
                    Costo anual
                </th>
                <th class="bg-accent px-4 py-3 font-semibold uppercase text-white dark:bg-navy-800 dark:text-navy-400 lg:px-5">
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($proyectos as $proyecto)
                <tr class="animation-load" wire:loading.class.remove="animation-load">
                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <p class="font-medium">{{ $proyecto->fechaInicio() }}</p>
                        <p class="mt-0.5 text-xs">{{ $proyecto->fechaFinal() }}</p>
                    </td>
                    <td class="px-4 py-3 sm:px-5">
                        <div class="flex items-center space-x-4">
                            <div class="avatar h-6 w-6">
                                @if($proyecto->responsable->user)
                                    <img class="mask is-squircle"
                                         src="{{ $proyecto->responsable->user->profile_photo_url }}"
                                         alt="avatar" />
                                @else
                                    <img class="mask is-squircle" src="{{asset('images/user_icon.png')}}"
                                         alt="avatar"/>
                                @endif
                            </div>
                            <span class="font-thin text-md">
                                        {{ $proyecto->responsable->nombre }}
                                    <p class="font-thin text-xs text-slate-500 dark:text-navy-300">
                                            {{ $proyecto->responsable->area->nombre }}
                                    </p>
                            </span>
                        </div>

                    </td>
                    <td class="px-4 py-3 sm:px-5">
                        <p class="overflow-hidden text-ellipsis text-sm text-slate-700 dark:text-navy-300">
                            {{ $proyecto->nombre }}
                        </p>
                    </td>
                    <td class="px-4 py-3 sm:px-5">
                        <table>
                            <tbody>
                            @foreach($proyecto->areas as $area)
                                <tr>
                                    <td>
                                        <p class="overflow-hidden text-ellipsis text-xs+">
                                            {{ $area->nombre }}
                                        </p>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </td>
                    <td class="px-4 py-3 sm:px-5">
                        @if($proyecto->avance() <= 30)
                            <div class="w-full badge bg-error/10 text-error dark:bg-error/30 text-center">
                                {{ $proyecto->avance() }} %
                            </div>
                        @elseif($proyecto->avance() > 30 && $proyecto->avance() <= 60)
                            <div class="w-full badge bg-warning/10 text-warning dark:bg-warning/30 text-center">
                                {{ $proyecto->avance() }} %
                            </div>
                        @else
                            <div class="w-full badge bg-success/10 text-success dark:bg-success/30 text-center">
                                {{ $proyecto->avance() }} %
                            </div>
                        @endif
                    </td>

                    <td class=" px-4 py-3 sm:px-5">
                        @if($proyecto->avance() == 100)
                            <div class="w-full badge bg-success/10 text-success dark:bg-success/30 text-center">
                                Concluido
                            </div>
                        @else
                            @if($proyecto->fechaFinal() > date('Y-m-d'))
                                <div class="w-full badge bg-success/10 text-success dark:bg-success/30 text-center">
                                    Restan {{ $proyecto->restarDias() }} días
                                </div>
                            @else
                                <div class="w-full badge bg-error/10 text-error dark:bg-error/30 text-center">
                                    Desfase {{ $proyecto->restarDias() }} días
                                </div>
                            @endif
                        @endif
                    </td>

                    <td class=" px-4 py-3 sm:px-5">
                        <p class="text-sm+ font-normal text-center">
                            ${{ $proyecto->costo() }}
                        </p>
                    </td>
                    <td class="px-4 py-3 sm:px-5">
                        <a title="Ver detalles" href="{{ route('proyectos.ver', $proyecto->id) }}" target="_blank"
                           class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25
                           dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <i class="fa fa-search"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $proyectos->links() }}
    </div>
    @else
        <div
            class="m-0 w-full text-center border-b-2 border-warning rounded-lg px-4 py-4 text-error sm:px-5">
            NO SE ENCONTRARON PROYECTOS
        </div>
    @endif

    <x-jet-dialog-modal wire:model="mostrarRecordatorios" maxWidth="6xl">
        <x-slot name="title">
            Mis recordatorios
        </x-slot>

        <x-slot name="content">
            <div class="mt-4 shadow-sm shadow-slate-400 dark:shadow-navy-500">
                <table class="w-full text-left">
                    @if(count($recordatorios))
                        <thead>
                        <tr>
                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-900 dark:text-navy-100 lg:px-5">
                                #
                            </th>
                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-900 dark:text-navy-100 lg:px-5">
                                Mensaje
                            </th>
                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-900 dark:text-navy-100 lg:px-5">
                                Fecha
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($recordatorios as $key => $recordatorio)
                            <tr>
                                <td class="px-4 py-3 sm:px-5">{{ $key+1 }}</td>
                                <td class="px-4 py-3 sm:px-5">
                                    {{ $recordatorio['mensaje'] }}
                                    <p class="text-xs text-slate-400 dark:text-navy-500">Proyecto: {{ $recordatorio['proyecto'] }}</p>
                                </td>
                                <td class="px-4 py-3 sm:px-5 whitespace-nowrap">{{ $recordatorio['fecha'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    @else
                        <th colspan="3"
                            class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            NO TIENES RECORDATORIOS PENDIENTES
                        </th>
                    @endif
                </table>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="ocultarRecordatorios" wire:loading.attr="disabled">
                Enterado(a)
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</main>
