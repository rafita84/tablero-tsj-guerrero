<main class="main-content w-full px-[var(--margin-x)] pb-8">
    <div class="flex items-center space-x-4 py-5 lg:py-6 relative">
        <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
            Catálogo de Áreas
        </h2>
        <div class="hidden h-full py-1 sm:flex">
            <div class="h-full w-px bg-slate-200 dark:bg-navy-600"></div>
        </div>
        <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
            <li class="flex items-center space-x-2">
                <a class="text-primary transition-colors hover:text-accent
                dark:text-accent dark:hover:text-primary"
                   href="{{ route('catalogos.areas.create') }}"><i class="fa fa-plus"></i> Crear nueva área
                </a>
            </li>
        </ul>
        <!-- Búsqueda -->
        <div class="flex absolute right-0" x-data="usePopper({ placement: 'bottom-end', offset: 12 })"
             @click.outside="if(isShowPopper) isShowPopper = false">
            <div class="relative mr-4 flex h-8">
                <input :placeholder="isShowPopper ? 'Busca por nombre o titular' : 'Buscar ...'"
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
    <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
        @if(session()->get('success'))
            <div
                class="alert flex rounded-lg bg-primary px-4 py-4 text-white dark:bg-accent sm:px-5 duration-300">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->get('failure'))
            <div
                class="alert flex rounded-lg bg-error px-4 py-4 text-white dark:bg-error sm:px-5 duration-300">
                {{ session()->get('failure') }}
            </div>
        @endif

        @if(count($areas))
            <div class="card mt-4">
                <table class="is-zebra w-full text-left" wire:loading.class="animation-unload">
                    <thead>
                    <tr>
                        <th class="bg-accent px-4 py-3 font-semibold uppercase text-white dark:bg-navy-800 dark:text-navy-400 lg:px-5">
                            Nombre del área
                        </th>
                        <th class="bg-accent px-4 py-3 font-semibold uppercase text-white dark:bg-navy-800 dark:text-navy-400 lg:px-5">
                            Titular
                        </th>
                        <th class="bg-accent px-4 py-3 font-semibold uppercase text-white dark:bg-navy-800 dark:text-navy-400 lg:px-5">
                            Teléfono
                        </th>
                        <th class="bg-accent px-4 py-3 font-semibold uppercase text-white dark:bg-navy-800 dark:text-navy-400 lg:px-5">
                            Responsables
                        </th>
                        <th class="w-32 bg-accent px-4 py-3 font-semibold uppercase text-white dark:bg-navy-800 dark:text-navy-400 lg:px-5">
                            Acciones
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($areas as $area)
                        <tr class="animation-load" wire:loading.class.remove="animation-load">
                            <td class="px-4 py-3 sm:px-5">
                                {{ $area->nombre }}
                            </td>
                            <td class="px-4 py-3 sm:px-5">
                                {{ $area->titular }}
                            </td>
                            <td class="px-4 py-3 sm:px-5">
                                {{ $area->numero_telefonico }}
                            </td>
                            <td class="px-4 py-3 sm:px-5">
                                @isset($area->responsables)
                                    <table class="w-full text-left">
                                        @foreach($area->responsables as $responsable)
                                            <tr>
                                                <td>{{ $responsable->nombre }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @endisset
                            </td>
                            <td class="px-4 py-3 sm:px-5">
                                <div class="badge rounded-full  bg-info/10 text-info hover:bg-info/20">
                                    <a href="{{route('catalogos.areas.show', $area->id)}}" title="Mostrar detalles"><i
                                            class="fa fa-circle-info"></i></a>
                                </div>
                                <div
                                    class="badge rounded-full  text-warning bg-warning/10 hover:bg-warning/20">
                                    <a href="{{route('catalogos.areas.edit', $area->id)}}" title="Editar"><i
                                            class="fa fa-edit"></i></a>
                                </div>

                                <div x-data="{showEliminar:false}" style="display: inline-block">
                                    <button
                                        @click="showEliminar = true" title="Eliminar"
                                        class="badge rounded-full  text-error bg-error/10 hover:bg-error/20"
                                        type="button"><i class="fa fa-xmark"></i></button>
                                    <template x-teleport="#x-teleport-target">
                                        <div
                                            class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
                                            x-show="showEliminar"
                                            role="dialog"
                                            @keydown.window.escape="showEliminar = false">
                                            <div
                                                class="absolute inset-0 bg-slate-900/60 backdrop-blur transition-opacity duration-300"
                                                x-show="showEliminar"
                                                x-transition:enter="ease-out"
                                                x-transition:enter-start="opacity-0"
                                                x-transition:enter-end="opacity-100"
                                                x-transition:leave="ease-in"
                                                x-transition:leave-start="opacity-100"
                                                x-transition:leave-end="opacity-0"></div>
                                            <div
                                                class="relative max-w-lg rounded-lg bg-white px-4 py-10 text-center transition-opacity duration-300 dark:bg-navy-700 sm:px-5"
                                                x-show="showEliminar"
                                                x-transition:enter="ease-out"
                                                x-transition:enter-start="opacity-0"
                                                x-transition:enter-end="opacity-100"
                                                x-transition:leave="ease-in"
                                                x-transition:leave-start="opacity-100"
                                                x-transition:leave-end="opacity-0">


                                                <div class="mt-4">
                                                    <div class="avatar h-20 w-20">
                                                        <i class="fa fa-building text-8xl"></i>
                                                        <div
                                                            class="absolute right-0 m-1 h-4 w-4 rounded-full border-2 border-error bg-error-focus">
                                                        </div>
                                                    </div>
                                                    <div class="mt-4 px-4 sm:px-12">
                                                        <h3 class="text-lg text-slate-800 dark:text-navy-50">
                                                            Eliminando área
                                                        </h3>
                                                        <p class="mt-1 text-slate-500 dark:text-navy-200">
                                                            ¿Realmente deseas eliminar el
                                                            área {{ $area->nombre }}?
                                                        </p>
                                                    </div>
                                                    <div class="space-x-3 mt-4">
                                                        <form
                                                            action="{{ route('catalogos.areas.destroy', $area->id)}}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button
                                                                @click="showEliminar = false"
                                                                type="button"
                                                                class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                                                                Cancelar
                                                            </button>
                                                            <button
                                                                @click="showEliminar = false"
                                                                type="submit"
                                                                class="btn min-w-[7rem] rounded-full bg-error font-medium text-white hover:bg-error-focus focus:bg-error-focus active:bg-error-focus/90 dark:bg-error dark:hover:bg-error-focus dark:focus:bg-error-focus dark:active:bg-error/90">
                                                                Eliminar
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="p-4 relative">
                {{ $areas->links() }}
            </div>

        @else
            <div
                class="m-0 w-full text-center border-b-2 border-warning rounded-lg px-4 py-4 text-error sm:px-5">
                NO SE ENCONTRARON ÁREAS
            </div>
        @endif
    </div>
</main>
