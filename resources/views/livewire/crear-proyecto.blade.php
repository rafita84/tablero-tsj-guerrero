<main class="main-content w-full px-[var(--margin-x)] pb-8" x-data="{activeTab:'tabGeneral'}">
    <div class="flex items-center space-x-4 py-5 lg:py-6 relative">
        <i class="fa fa-plus"> </i>
        <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
            Nuevo Proyecto
        </h2>
        <div class="hidden h-full py-1 sm:flex">
            <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
        </div>
        <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
            <li class="flex items-center space-x-2">
                <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                   href="{{ route('proyectos.todos') }}">Ver todos los proyectos
                </a>
            </li>
        </ul>
        <div class="flex absolute right-0">
            <button wire:click="guardar"
                    class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                Guardar
            </button>
        </div>
    </div>

    @if (session()->has('messages'))
        <div
            class="alert flex rounded-lg bg-error px-4 py-4 mb-2 text-white dark:bg-error sm:px-5 duration-300">
            {{ session('messages') }}
        </div>
    @endif
    <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
        <div class="col-span-12 lg:col-span-8">
            <div class="card">
                <div class="tabs flex flex-col">
                    <div class="is-scrollbar-hidden overflow-x-auto">
                        <div class="border-b-2 border-slate-150 dark:border-navy-500">
                            <div class="tabs-list -mb-0.5 flex mt-1">
                                <button
                                    @click.prevent="activeTab = 'tabGeneral'"
                                    :class="activeTab === 'tabGeneral' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                                    class="btn shrink-0 space-x-2 rounded-none border-b-2 px-3 py-2 font-medium">
                                    <i class="fa-solid fa-project-diagram text-base"></i>
                                    <span>Datos Generales</span>
                                </button>
                                <button
                                    @click.prevent="activeTab = 'tabRecursos'"
                                    :class="activeTab === 'tabRecursos' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                                    class="btn shrink-0 space-x-2 rounded-none border-b-2 px-3 py-2 font-medium">
                                    <i class="fa-solid fa-money-bill text-base"></i>
                                    <span>Recursos</span>
                                </button>
                                <button
                                    @click.prevent="activeTab = 'tabAreas'"
                                    :class="activeTab === 'tabAreas' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                                    class="btn shrink-0 space-x-2 rounded-none border-b-2 px-3 py-2 font-medium">
                                    <i class="fa-solid fa-building text-base"></i>
                                    <span>Áreas involucradas</span>
                                </button>
                                <button
                                    @click.prevent="activeTab = 'tabActividades'"
                                    :class="activeTab === 'tabActividades' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                                    class="btn shrink-0 space-x-2 rounded-none border-b-2 px-3 py-2 font-medium">
                                    <i class="fa-solid fa-bars-staggered text-base"></i>
                                    <span>Actividades</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content p-4 sm:p-5">
                        <div
                            x-show="activeTab === 'tabGeneral'"
                            x-transition:enter="transition-all duration-500 easy-in-out"
                            x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                            x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">
                            <div class="space-y-5">
                                <label class="block">
                                        <span class="font-medium text-slate-600 dark:text-navy-100">
                                            Nombre o denominación
                                        </span>
                                    <input
                                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        placeholder="Nombre o denominación" type="text" required
                                        wire:model.defer="nombre"/>
                                    @error('nombre')
                                    <span class="text-tiny+ text-error">{{ $message }}</span>
                                    @enderror
                                </label>
                                <label class="block">
                                        <span class="font-medium text-slate-600 dark:text-navy-100">
                                            Eje estratégico
                                        </span>
                                    <select
                                        wire:model.defer="eje_estrategico"
                                        class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">
                                        <option value="">- Seleccione eje -</option>
                                        @foreach(\App\Models\Proyecto::$ejes as $eje)
                                            <option value="{{ $eje }}">{{ $eje }}</option>
                                        @endforeach
                                    </select>
                                    @error('eje_estrategico')
                                    <span class="text-tiny+ text-error">{{ $message }}</span>
                                    @enderror
                                </label>
                                <div class="block">
                                        <span class="font-medium text-slate-600 dark:text-navy-100">
                                            Objetivo
                                        </span>
                                    <textarea rows="4"
                                              placeholder="Objetivo..."
                                              wire:model.defer="objetivo"
                                              class="form-textarea mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"></textarea>
                                    @error('objetivo')
                                    <span class="text-tiny+ text-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="block">
                                        <span class="font-medium text-slate-600 dark:text-navy-100">
                                            Justificación del Proyecto
                                        </span>
                                    <textarea rows="4"
                                              placeholder="Justificación del Proyecto..."
                                              wire:model.defer="justificacion"
                                              class="form-textarea mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"></textarea>
                                    @error('justificacion')
                                    <span class="text-tiny+ text-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div
                                    x-data="{ isUploading: false, progress: 0 }"
                                    x-on:livewire-upload-start="isUploading = true"
                                    x-on:livewire-upload-finish="isUploading = false"
                                    x-on:livewire-upload-error="isUploading = false"
                                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                                    <!-- File Input -->
                                    <span class="font-medium text-slate-600 dark:text-navy-100">
                                        Imagen del proyecto
                                    </span>
                                    <div class="rounded-lg py-4">
                                        <label
                                            class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                            <input type="file" wire:model="imagen" class="pointer-events-none absolute inset-0 h-full w-full opacity-0"
                                                   accept="image/*"/>
                                            <div class="flex items-center space-x-2">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                                </svg>
                                                <span>Seleccionar archivo...</span>
                                            </div>
                                            @error('imagen')
                                            <span class="text-tiny+ text-error">{{ $message }}</span>
                                            @enderror
                                        </label>

                                        <!-- Progress Bar -->
                                        <div x-show="isUploading">
                                            <div class="w-full progress h-2 bg-info/15 dark:bg-info/25">
                                                <progress class="w-full rounded-full bg-info" max="100"
                                                          x-bind:value="progress"></progress>
                                            </div>
                                        </div>
                                        @if ($imagen)
                                            <div>
                                                <img
                                                    class="mt-1 h-48 w-full shrink-0 rounded-lg bg-cover bg-center object-cover object-center lg:h-auto lg:w-48"
                                                    src="{{ $imagen->temporaryUrl() }}" alt="Previsualización"/>
                                                <button
                                                    class="mt-1 badge rounded-full text-error bg-error/10 hover:bg-error/20"
                                                    wire:click.prevent="eliminarFoto">Quitar imagen
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            x-show="activeTab === 'tabRecursos'"
                            x-transition:enter="transition-all duration-500 easy-in-out"
                            x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                            x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">
                            <div class="space-x-5 grid grid-cols-12">
                                <label class="block col-span-4">
                                        <span class="font-medium text-slate-600 dark:text-navy-100">
                                            Concepto
                                        </span>
                                    <input wire:model.defer="concepto"
                                           class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                           placeholder="Concepto" type="text"/>
                                    @error('concepto')
                                    <span class="text-tiny+ text-error">{{ $message }}</span>
                                    @enderror
                                </label>
                                <label class="block col-span-3">
                                        <span class="font-medium text-slate-600 dark:text-navy-100">
                                            Costo
                                        </span>
                                    <input wire:model.defer="costo"
                                           class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                           placeholder="Costo" type="number"/>
                                    @error('costo')
                                    <span class="text-tiny+ text-error">{{ $message }}</span>
                                    @enderror
                                </label>
                                <label class="block col-span-3">
                                    <span class="font-medium text-slate-600 dark:text-navy-100">
                                        Periodicidad
                                    </span>
                                    <select
                                        wire:model.defer="periodicidad"
                                        class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">
                                        <option value="0">- Periodicidad -</option>
                                        @foreach(\App\Models\Recurso::$periodicidades as $clave => $valor)
                                            <option value="{{ $clave }}">{{ $valor }}</option>
                                        @endforeach
                                    </select>
                                    @error('periodicidad')
                                    <span class="text-tiny+ text-error">{{ $message }}</span>
                                    @enderror
                                </label>
                                <div class="col-span-2 relative">
                                    <button wire:click.prevent="agregarRecurso"
                                            class="absolute bottom-0 right-0 btn bg-primary max-h-9 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                        Agregar
                                    </button>
                                </div>
                            </div>
                            <div class="shadow-sm shadow-accent mt-4">
                                <table class="is-zebra w-full text-left">
                                    @if(count($recursos))
                                        <thead>
                                        <tr>
                                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                Concepto
                                            </th>
                                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                Costo
                                            </th>
                                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                Periodicidad
                                            </th>
                                            <th class="text-right bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                Borrar
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($recursos as $key => $recurso)
                                            <tr>
                                                <td class="px-4 py-3 sm:px-5">{{ $recurso['concepto'] }}</td>
                                                <td class="px-4 py-3 sm:px-5">{{ number_format($recurso['costo']) }}</td>
                                                <td class="px-4 py-3 sm:px-5">{{ \App\Models\Recurso::getPeriodicidad($recurso['periodicidad']) }}</td>
                                                <td class="px-4 py-3 sm:px-5 text-right">
                                                    <button
                                                        class="badge rounded-full  text-error bg-error/10 hover:bg-error/20"
                                                        wire:click.prevent="borrarRecurso({{$key}})"><i class="fa fa-xmark"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    @else
                                        <th colspan="3"
                                            class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            NO HAY RECURSOS REGISTRADOS
                                        </th>
                                    @endif
                                </table>
                            </div>
                        </div>
                        <div
                            x-show="activeTab === 'tabAreas'"
                            x-transition:enter="transition-all duration-500 easy-in-out"
                            x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                            x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">
                            <div class="grid grid-cols-12">
                                <label class="col-span-10 block mb-1">
                                    <span>Áreas involucradas en el proyecto</span>
                                    <select
                                        wire:model.defer="area_id"
                                        class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">
                                        <option value="0">- Selecciona un área -</option>
                                        @foreach($areasInvolucradas as $area)
                                            <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('area_id')
                                    <span class="text-tiny+ text-error">{{ $message }}</span>
                                    @enderror
                                </label>
                                <div class="col-span-2 relative">
                                    <button wire:click.prevent="agregarArea"
                                            class="absolute bottom-0 right-0 btn bg-primary max-h-9 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                        Agregar
                                    </button>
                                </div>
                            </div>
                            <div class="shadow-sm shadow-accent mt-4">
                                <table class="is-zebra w-full text-left">
                                    @if(count($areas))
                                        <thead>
                                        <tr>
                                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                Área agregada
                                            </th>
                                            <th class="text-right bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                Borrar
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($areas as $key => $area)
                                            <tr>
                                                <td class="px-4 py-3 sm:px-5">{{ $area['nombre'] }}</td>
                                                <td class="px-4 py-3 sm:px-5 text-right">
                                                    <button
                                                        class="badge rounded-full  text-error bg-error/10 hover:bg-error/20"
                                                        wire:click.prevent="borrarArea({{$key}})"><i
                                                            class="fa fa-xmark"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    @else
                                        <th colspan="3"
                                            class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            NO HAY ÁREAS ASIGNADAS
                                        </th>
                                    @endif
                                </table>
                            </div>
                        </div>
                        <div
                            x-show="activeTab === 'tabActividades'"
                            x-transition:enter="transition-all duration-500 easy-in-out"
                            x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                            x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">
                            <div class="space-x-5 grid grid-cols-12">
                                <label class="block col-span-6">
                                        <span class="font-medium text-slate-600 dark:text-navy-100">
                                            Actividad
                                        </span>
                                    <input wire:model.defer="actividad"
                                           class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                           placeholder="Actividad" type="text"/>
                                    @error('actividad')
                                    <span class="text-tiny+ text-error">{{ $message }}</span>
                                    @enderror
                                </label>
                                <label class="block col-span-6 mb-1">
                                    <span>Responsable</span>
                                    <select
                                        wire:model.defer="responsable"
                                        class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">
                                        <option value="0">- Selecciona un responsable -</option>
                                        @foreach($responsables as $responsable)
                                            <option
                                                value="{{ $responsable->id }}">{{ $responsable->nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('responsable')
                                    <span class="text-tiny+ text-error">{{ $message }}</span>
                                    @enderror
                                </label>
                            </div>
                            <div class="space-x-5 grid grid-cols-12 mt-2">
                                <label class="block col-span-3">
                                        <span class="font-medium text-slate-600 dark:text-navy-100">
                                            Fecha inicio
                                        </span>
                                    <span class="relative mt-1.5 flex">
                                    <input x-init="$el._x_flatpickr = flatpickr($el, {locale: 'es'})"
                                           wire:model.defer="fecha_inicio"
                                           class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                           placeholder="Fecha de inicio" type="text"/>
                                    <span
                                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="h-5 w-5 transition-colors duration-200"
                                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </span>
                                    </span>
                                    @error('fecha_inicio')
                                    <span class="text-tiny+ text-error">{{ $message }}</span>
                                    @enderror
                                </label>
                                <label class="block col-span-3">
                                        <span class="font-medium text-slate-600 dark:text-navy-100">
                                            Fecha fin
                                        </span>
                                    <span class="relative mt-1.5 flex">
                                    <input x-init="$el._x_flatpickr = flatpickr($el, {locale: 'es'})"
                                           wire:model.defer="fecha_fin"
                                           class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                           placeholder="Fecha de fin" type="text"/>
                                    <span
                                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="h-5 w-5 transition-colors duration-200"
                                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </span>
                                    </span>
                                    @error('fecha_fin')
                                    <span class="text-tiny+ text-error">{{ $message }}</span>
                                    @enderror
                                </label>
                                <label class="block col-span-4">
                                        <span class="font-medium text-slate-600 dark:text-navy-100">
                                            Entregable
                                        </span>
                                    <input wire:model.defer="entregable"
                                           class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                           placeholder="Entregable" type="text"/>
                                    @error('entregable')
                                    <span class="text-tiny+ text-error">{{ $message }}</span>
                                    @enderror
                                </label>
                                <div class="col-span-2 relative">
                                    <button wire:click.prevent="agregarActividad"
                                            class="absolute bottom-0 right-0 btn bg-primary max-h-9 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                        Agregar
                                    </button>
                                </div>
                            </div>
                            <div class="shadow-sm shadow-accent mt-4">
                                <table class="is-zebra w-full text-left">
                                    @if(count($actividades))
                                        <thead>
                                        <tr>
                                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                Actividad
                                            </th>
                                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                Responsable
                                            </th>
                                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                Fecha inicio
                                            </th>
                                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                Fecha fin
                                            </th>
                                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                Entregable
                                            </th>
                                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                Borrar
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($actividades as $key => $actividad)
                                            <tr>
                                                <td class="px-4 py-3 sm:px-5">{{ $actividad['actividad'] }}</td>
                                                <td class="px-4 py-3 sm:px-5">{{ $actividad['responsable'] }}</td>
                                                <td class="px-4 py-3 sm:px-5">{{ $actividad['fecha_inicio'] }}</td>
                                                <td class="px-4 py-3 sm:px-5">{{ $actividad['fecha_fin'] }}</td>
                                                <td class="px-4 py-3 sm:px-5">{{ $actividad['entregable'] }}</td>
                                                <td class="px-4 py-3 sm:px-5 text-right">
                                                    <button
                                                        class="badge rounded-full  text-error bg-error/10 hover:bg-error/20"
                                                        wire:click.prevent="borrarActividad({{$key}})"><i
                                                            class="fa fa-xmark"></i></button>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-4">
            <div class="card space-y-5 p-4 sm:p-5">
                <label class="block">
                    <div>
                        <label class="block mb-1">
                            <span>Encargado del proyecto</span>
                            <select
                                wire:model.defer="responsable_id"
                                class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">
                                <option value="0">- Selecciona un responsable -</option>
                                @foreach($responsables as $responsable)
                                    <option value="{{ $responsable->id }}">{{ $responsable->nombre }}</option>
                                @endforeach
                            </select>
                            @error('responsable_id')
                            <span class="text-tiny+ text-error">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>
                </label>

                <label class="block">
                    <span class="font-medium text-slate-600 dark:text-navy-100">Elabora</span>
                    <input
                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="Elabora" required type="text"
                        wire:model.defer="elabora"/>
                    @error('elabora')
                    <span class="text-tiny+ text-error">{{ $message }}</span>
                    @enderror
                </label>

                <label class="block">
                    <span class="font-medium text-slate-600 dark:text-navy-100">Aprueba</span>
                    <input
                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        wire:model.defer="aprueba" placeholder="Aprueba" required type="text"/>
                    @error('aprueba')
                    <span class="text-tiny+ text-error">{{ $message }}</span>
                    @enderror
                </label>

                <label>
                    <span class="font-medium text-slate-600 dark:text-navy-100">Fecha de aprobación</span>
                    <span class="relative mt-1.5 flex">
                            <input x-init="$el._x_flatpickr = flatpickr($el, {locale: 'es'})"
                                   wire:model.defer="fecha_aprobacion"
                                   class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                   placeholder="Selecciona la fecha..." type="text" required/>
                            <span
                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </span>
                        </span>
                    @error('fecha_aprobacion')
                    <span class="text-tiny+ text-error">{{ $message }}</span>
                    @enderror
                </label>
            </div>
        </div>
    </div>
</main>
