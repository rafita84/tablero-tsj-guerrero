<main class="main-content w-full px-[var(--margin-x)] pb-8">
    <div class="flex items-center space-x-4 py-5 lg:py-6 relative">
        <h2 class="text-xl font-medium text-slate-700 line-clamp-1 dark:text-navy-50 lg:text-2xl">
            Todos los Proyectos
        </h2>
        <div class="hidden h-full py-1 sm:flex">
            <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
        </div>
        <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
            <li class="flex items-center space-x-2">
                <a class="text-primary transition-colors hover:text-accent dark:text-accent dark:hover:text-primary"
                   href="{{ route('proyectos.nuevo') }}"><i class="fa fa-plus"></i> Crear nuevo proyecto
                </a>
            </li>
        </ul>
        <!-- Búsqueda -->
        <div class="flex absolute right-0" x-data="usePopper({ placement: 'bottom-end', offset: 12 })"
             @click.outside="if(isShowPopper) isShowPopper = false">
            <div class="relative mr-4 flex h-8">
                <input :placeholder="isShowPopper ? 'Busca por nombre, objetivo o justificación' : 'Buscar ...'"
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
    @if(session()->get('success'))
        <div
            class="mb-2 alert flex rounded-lg bg-primary px-4 py-4 text-white dark:bg-accent sm:px-5 duration-300">
            {{ session()->get('success') }}
        </div>
    @endif
    @if (session()->has('message'))
        <div
            class="mb-2 alert flex rounded-lg bg-primary px-4 py-4 text-white dark:bg-accent sm:px-5 duration-300">
            {{ session('message') }}
        </div>
    @endif
    @if(count($proyectos))
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:gap-6">
            @foreach($proyectos as $proyecto)
                <div class="card lg:flex-row animation-load" wire:loading.class.remove="animation-load"
                     wire:loading.class="animation-unload" wire:target="page">
                    @if($proyecto->imagen)
                        <img
                            class="h-48 w-full shrink-0 bg-slate-200 rounded-t-lg bg-cover bg-center object-cover object-center lg:h-auto lg:w-48 lg:rounded-t-none lg:rounded-l-lg"
                            src="{{asset('storage/proyectos/'.$proyecto->imagen)}}" alt="image"/>
                    @else
                        <img
                            class="h-48 w-full shrink-0 rounded-t-lg bg-cover bg-center object-cover object-center lg:h-auto lg:w-48 lg:rounded-t-none lg:rounded-l-lg"
                            src="{{asset('images/proyecto_default2.jpg')}}" alt="image"/>
                    @endif
                    <div class="flex w-full grow flex-col px-4 py-3 sm:px-5">
                        <div class="flex items-center justify-between">
                            <span class="text-xs+ font-thin text-primary dark:text-accent">{{ $proyecto->responsable->area->nombre }}</span>
                            <div class="-mr-1.5 flex space-x-1">
                                <div x-data="usePopper({ placement: 'bottom-end', offset: 4 })"
                                     @click.outside="if(isShowPopper) isShowPopper = false"
                                     class="inline-flex">
                                    <button x-ref="popperRef" @click="isShowPopper = !isShowPopper"
                                            class="btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                                        </svg>
                                    </button>

                                    <div wire:ignore.self x-ref="popperRoot" class="popper-root"
                                         :class="isShowPopper && 'show'">
                                        <div wire:ignore.self
                                            class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                                            <ul>
                                                <li>
                                                    <a href="{{ route('proyectos.ver', $proyecto->id) }}" target="_blank"
                                                       class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                                        Ver detalles
                                                    </a>
                                                </li>
                                                @if(!Auth::user()->isGerencial())
                                                <li>
                                                    <a href="{{ route('proyectos.editar', $proyecto->id) }}"
                                                       class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                                        Editar proyecto</a>
                                                </li>
                                                @endif
                                            </ul>
                                            <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
                                            <ul>
                                                <li>
                                                    <a wire:click="verObservaciones({{$proyecto->id}})"
                                                       class="cursor-pointer flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                                        Agregar observaciones</a>
                                                </li>
                                                @if(!Auth::user()->isGerencial() && (Auth::user()->responsable && Auth::user()->responsable->id == $proyecto->responsable_id))
                                                <li>
                                                    <a wire:click="verActividades({{$proyecto->id}})"
                                                       class="cursor-pointer flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                                        Marcar actividades</a>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                            <span class="text-lg font-normal line-clamp-1 text-slate-700 dark:text-navy-100"
                                  title="{{ $proyecto->nombre }}">
                                {{ $proyecto->nombre }}
                            </span>
                            </div>
                        </div>
                        <p class="mt-2 line-clamp-2 font-thin">
                            {{ $proyecto->objetivo }}
                        </p>

                        <div class="mt-1 flex">
                            <div class="grow">
                                <div class="mt-2 flex items-center text-xs">
                                    <span class="flex items-center space-x-2">
                                        <div class="avatar h-6 w-6">
                                            @if($proyecto->responsable->user)
                                                <img class="rounded-full "
                                                     src="{{ $proyecto->responsable->user->profile_photo_url }}"
                                                     alt="avatar"/>
                                            @else
                                                <img class="rounded-full " src="{{asset('images/user_icon.png')}}"
                                                     alt="avatar"/>
                                            @endif
                                        </div>
                                        <span class="line-clamp-1">
                                            {{ $proyecto->responsable->nombre }}
                                        </span>
                                    </span>
                                    <div class="mx-3 my-1 w-px self-stretch bg-slate-200 dark:bg-navy-500"></div>
                                    <span class="shrink-0 text-slate-400">
                                        Periodo: {{ $proyecto->fechaInicio() }} - {{ $proyecto->fechaFinal() }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div
            class="mx-2 w-full text-center border-b-2 border-warning rounded-lg px-4 py-4 text-error sm:px-5">
            NO SE ENCONTRARON PROYECTOS
        </div>
    @endif
    <div class="mt-2">
        {{ $proyectos->links() }}
    </div>

    <x-jet-dialog-modal wire:model="mostrarObservaciones" maxWidth="2xl">
        <x-slot name="title">
            Agregar observaciones al proyecto
        </x-slot>

        <x-slot name="content">
            <strong>
                {{ $nombre_proyecto }}
            </strong>
            <div class="mt-4 space-y-4">
                <label class="block">
                    <span>Observaciones</span>
                    <textarea
                        wire:model.lazy="observaciones"
                        rows="4"
                        placeholder="Agrega las observaciones al proyecto"
                        class="form-textarea mt-1.5 w-full resize-none rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"></textarea>
                </label>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('mostrarObservaciones')" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-button class="ml-3" wire:click="guardarObservaciones" wire:loading.attr="disabled">
                Guardar
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="mostrarActividades" maxWidth="6xl">
        <x-slot name="title">
            Marcar actividades
        </x-slot>

        <x-slot name="content">
            <strong>
                {{ $nombre_proyecto }}
            </strong>
            <div class="mt-4 shadow-sm shadow-slate-400 dark:shadow-navy-500">
                <table class="w-full text-left">
                    @if($actividades)
                        <thead>
                        <tr>
                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-900 dark:text-navy-100 lg:px-5">
                                #
                            </th>
                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-900 dark:text-navy-100 lg:px-5">
                                Actividad
                            </th>
                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-900 dark:text-navy-100 lg:px-5">
                                Responsable
                            </th>
                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-900 dark:text-navy-100 lg:px-5">
                                Inicio
                            </th>
                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-900 dark:text-navy-100 lg:px-5">
                                Fin
                            </th>
                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-900 dark:text-navy-100 lg:px-5">
                                Entregable
                            </th>
                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-900 dark:text-navy-100 lg:px-5">
                                Marcar
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($actividades as $key => $actividad)
                            <tr class="{{ $actividad->concluida == 1 ? 'bg-success/10':'' }}">
                                <td class="px-4 py-3 sm:px-5">{{ $key+1 }}</td>
                                <td class="px-4 py-3 sm:px-5">{{ $actividad->nombre }}</td>
                                <td class="px-4 py-3 sm:px-5">{{ $actividad->responsable->nombre }}</td>
                                <td class="px-4 py-3 sm:px-5">{{ $actividad->fecha_inicio }}</td>
                                <td class="px-4 py-3 sm:px-5">{{ $actividad->fecha_final }}</td>
                                <td class="px-4 py-3 sm:px-5">{{ $actividad->entregable }}</td>
                                <td class="px-4 py-3 sm:px-5 text-right">
                                    @if($actividad->concluida == 1)
                                        <button title="Marcar como inconclusa"
                                                class="badge rounded-full text-error bg-error/10 hover:bg-error/20"
                                                wire:click.prevent="desmarcarActividad({{$actividad->id}})"><i
                                                class="fa fa-xmark"></i></button>
                                    @else
                                        <button title="Marcar como concluida"
                                                class="badge rounded-full text-success bg-success/10 hover:bg-success/20"
                                                wire:click.prevent="marcarActividad({{$actividad->id}})"><i
                                                class="fa fa-check"></i></button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    @else
                        <th colspan="3"
                            class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            NO HAY ACTIVIDADES REGISTRADAS
                        </th>
                    @endif
                </table>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('mostrarActividades')" wire:loading.attr="disabled">
                Cerrar
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</main>
