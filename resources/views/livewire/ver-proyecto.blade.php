<main class="main-content w-full px-[var(--margin-x)] pb-8" x-data="{activeTab:'tabGeneral'}">
    <div class="flex items-center space-x-4 py-5 lg:py-6">
        <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
            Detalles
        </h2>
        <div class="hidden h-full py-1 sm:flex">
            <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
        </div>
        <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
            <li class="flex items-center space-x-2">
                <a class="text-primary transition-colors hover:text-accent
                dark:text-accent dark:hover:text-primary"
                   href="{{ route('proyectos.todos') }}">Ver todos los proyectos</a>
                <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </li>
            <li>{{ $proyecto->nombre }}</li>
            <li class="flex items-center space-x-2">
                <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </li>
            <li><a class="text-primary transition-colors hover:text-accent
            dark:text-accent dark:hover:text-primary"
                   href="{{ route('proyectos.reporte', $proyecto->id) }}" target="_blank">
                    <i class="fa fa-print"></i> Imprimir formato</a>
            </li>
        </ul>
    </div>

    <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
        <div class="col-span-12 grid lg:col-span-2 lg:place-items-start place-items-center">
            <ol class="steps is-vertical line-space [--size:2.75rem] [--line:.5rem]">
                <li class="step space-x-4 pb-12 before:bg-slate-200 dark:before:bg-navy-500 cursor-pointer"
                    @click.prevent="activeTab = 'tabGeneral'">
                    <div class="step-header mask is-hexagon"
                         :class="activeTab === 'tabGeneral' ? 'bg-primary text-white dark:bg-accent' : 'bg-slate-200 text-slate-500 dark:bg-navy-500 dark:text-navy-100'">
                        <i class="fa-solid fa-project-diagram text-base"></i>
                    </div>
                    <div class="text-left">
                        <h3 class="text-base font-medium"
                        :class="activeTab === 'tabGeneral' ? 'text-primary dark:text-accent' : ''">
                            Datos generales
                        </h3>
                        <p class="text-xs text-slate-400 dark:text-navy-300">
                            Datos principales del proyecto
                        </p>
                    </div>
                </li>
                <li class="step space-x-4 pb-12 before:bg-slate-200 dark:before:bg-navy-500 cursor-pointer"
                    @click.prevent="activeTab = 'tabRecursos'">
                    <div :class="activeTab === 'tabRecursos' ? 'bg-primary text-white dark:bg-accent' : 'bg-slate-200 text-slate-500 dark:bg-navy-500 dark:text-navy-100'"
                        class="step-header mask is-hexagon">
                        <i class="fa-solid fa-money-bill text-base"></i>
                    </div>
                    <div class="text-left">
                        <h3 class="text-base font-medium"
                            :class="activeTab === 'tabRecursos' ? 'text-primary dark:text-accent' : ''">
                            Recursos
                        </h3>
                        <p class="text-xs text-slate-400 dark:text-navy-300">
                            Recursos económicos
                        </p>
                    </div>
                </li>
                <li class="step space-x-4 pb-12 before:bg-slate-200 dark:before:bg-navy-500 cursor-pointer"
                    @click.prevent="activeTab = 'tabAreas'">
                    <div :class="activeTab === 'tabAreas' ? 'bg-primary text-white dark:bg-accent' : 'bg-slate-200 text-slate-500 dark:bg-navy-500 dark:text-navy-100'"
                        class="step-header mask is-hexagon">
                        <i class="fa-solid fa-building text-base"></i>
                    </div>
                    <div class="text-left">
                        <h3 class="text-base font-medium"
                            :class="activeTab === 'tabAreas' ? 'text-primary dark:text-accent' : ''">
                            Áreas
                        </h3>
                        <p class="text-xs text-slate-400 dark:text-navy-300">
                            Áreas involucradas en el proyecto
                        </p>
                    </div>
                </li>
                <li class="step space-x-4 pb-12 before:bg-slate-200 dark:before:bg-navy-500 cursor-pointer"
                    @click.prevent="activeTab = 'tabActividades'">
                    <div :class="activeTab === 'tabActividades' ? 'bg-primary text-white dark:bg-accent' : 'bg-slate-200 text-slate-500 dark:bg-navy-500 dark:text-navy-100'"
                        class="step-header mask is-hexagon">
                        <i class="fa-solid fa-bars-staggered text-base"></i>
                    </div>
                    <div class="text-left">
                        <h3 class="text-base font-medium"
                            :class="activeTab === 'tabActividades' ? 'text-primary dark:text-accent' : ''">
                            Actividades
                        </h3>
                        <p class="text-xs text-slate-400 dark:text-navy-300">
                            Detalle de actividades a realizar
                        </p>
                    </div>
                </li>
                <li class="step space-x-4 pb-12 before:bg-slate-200 dark:before:bg-navy-500 cursor-pointer"
                    @click.prevent="activeTab = 'tabObservaciones'">
                    <div :class="activeTab === 'tabObservaciones' ? 'bg-primary text-white dark:bg-accent' : 'bg-slate-200 text-slate-500 dark:bg-navy-500 dark:text-navy-100'"
                         class="step-header mask is-hexagon">
                        <i class="fa-solid fa-search text-base"></i>
                    </div>
                    <div class="text-left">
                        <h3 class="text-base font-medium"
                            :class="activeTab === 'tabObservaciones' ? 'text-primary dark:text-accent' : ''">
                            Observaciones
                        </h3>
                        <p class="text-xs text-slate-400 dark:text-navy-300">
                            Observaciones agregadas
                        </p>
                    </div>
                </li>
                <li class="step space-x-4 before:bg-slate-200 dark:before:bg-navy-500 cursor-pointer"
                    @click.prevent="activeTab = 'tabBitacora'">
                    <div :class="activeTab === 'tabBitacora' ? 'bg-primary text-white dark:bg-accent' : 'bg-slate-200 text-slate-500 dark:bg-navy-500 dark:text-navy-100'"
                         class="step-header mask is-hexagon">
                        <i class="fa-solid fa-list-check text-base"></i>
                    </div>
                    <div class="text-left">
                        <h3 class="text-base font-medium"
                            :class="activeTab === 'tabBitacora' ? 'text-primary dark:text-accent' : ''">
                            Bitácora
                        </h3>
                        <p class="text-xs text-slate-400 dark:text-navy-300">
                            Acciones realizadas por los usuarios
                        </p>
                    </div>
                </li>
            </ol>
        </div>
        <div
            x-show="activeTab === 'tabGeneral'"
            x-transition:enter="transition-all duration-500 easy-in-out"
            x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
            x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
            class="col-span-12 grid lg:col-span-10">
            <div class="card">
                <div class="border-b border-slate-200 dark:border-navy-500">
                    <img
                        class="h-48 w-full shrink-0 rounded-t-lg bg-cover bg-center object-cover object-center"
                        src="{{ $ruta_imagen }}" alt="image"/>
                </div>
                <div class="space-y-4 p-4 sm:p-5">
                    <label class="block">
                        <p class="text-lg font-medium dark:text-accent text-primary">{{ $proyecto->nombre }}</p>
                    </label>
                    <label class="block">
                        <span class="font-thin">Eje estratégico</span>
                        <p class="text-sm font-normal text-slate-700 dark:text-navy-100">{{ $proyecto->eje_estrategico }}</p>
                    </label>
                    <label class="block">
                        <span class="font-thin">Objetivo</span>
                        <p class="text-sm font-normal text-slate-700 dark:text-navy-100">{{ $proyecto->objetivo }}</p>
                    </label>
                    <label class="block">
                        <span class="font-thin">Encargado del proyecto</span>
                        <p class="text-sm font-normal text-slate-700 dark:text-navy-100">{{ $proyecto->responsable->nombre }}</p>
                        <p class="text-sm font-normal dark:text-accent text-primary">{{ $proyecto->responsable->area->nombre }}</p>
                    </label>
                    <label class="block">
                        <span class="font-thin">Justificación</span>
                        <p class="text-sm font-normal text-slate-700 dark:text-navy-100">{{ $proyecto->justificacion }}</p>
                    </label>
                    <div class="grid grid-cols-12 space-y-2">
                    <label class="block col-span-12 lg:col-span-4">
                        <span class="font-thin">Elaboró</span>
                        <p class="text-sm font-normal text-slate-700 dark:text-navy-100">{{ $proyecto->elabora }}</p>
                    </label>
                    <label class="block col-span-12 lg:col-span-4">
                        <span class="font-thin">Aprobó</span>
                        <p class="text-sm font-normal text-slate-700 dark:text-navy-100">{{ $proyecto->aprueba }}</p>
                    </label>
                    <label class="block col-span-12 lg:col-span-4">
                        <span class="font-thin">Fecha de aprobación</span>
                        <p class="text-sm font-normal text-slate-700 dark:text-navy-100">{{ $proyecto->fecha_aprobacion }}</p>
                    </label>
                    </div>
                </div>
            </div>
        </div>
        <div
            x-show="activeTab === 'tabRecursos'"
            x-transition:enter="transition-all duration-500 easy-in-out"
            x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
            x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
            class="col-span-12 grid lg:col-span-10">
            <div class="card">
                <div class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5">
                    <div class="flex items-center space-x-2">
                        <div
                            class="flex h-7 w-7 items-center justify-center rounded-lg bg-primary/10 p-1 text-primary dark:bg-accent-light/10 dark:text-accent-light">
                            <i class="fa-solid fa-money-bill text-base"></i>
                        </div>
                        <h4 class="text-lg font-medium text-slate-700 dark:text-navy-100">
                            Recursos económicos
                        </h4>
                    </div>
                </div>
                <table class="is-zebra w-full text-left">
                    @if(count($proyecto->recursos))
                        <thead>
                        <tr>
                            <th class="w-10 bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                #
                            </th>
                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Concepto
                            </th>
                            <th class="w-40 text-center bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Costo
                            </th>
                            <th class="w-40 text-center bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Periodicidad
                            </th>
                            <th class="w-40 text-center bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Costo anual
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $total_recursos = 0;
                        @endphp
                        @foreach($proyecto->recursos as $key => $recurso)
                            <tr>
                                <td class="px-4 py-3 sm:px-5">{{ $key + 1 }}</td>
                                <td class="px-4 py-3 sm:px-5">{{ $recurso->concepto }}</td>
                                <td class="text-center pr-6px-4 py-3 sm:px-5">{{ number_format($recurso->costo) }}</td>
                                <td class="text-center px-4 py-3 sm:px-5">{{ \App\Models\Recurso::getPeriodicidad($recurso->periodicidad) }}</td>
                                <td class="text-right pr-6px-4 py-3 sm:px-5">{{ number_format($recurso->costo * $recurso->periodicidad) }}</td>
                            </tr>
                            @php
                                $total_recursos += $recurso->costo * $recurso->periodicidad;
                            @endphp
                        @endforeach
                        <tr>
                            <td class="text-right px-4 py-3 sm:px-5"></td>
                            <td class="text-right px-4 py-3 sm:px-5"></td>
                            <td class="text-right px-4 py-3 sm:px-5"></td>
                            <td class="text-right font-medium text-error text-right px-4 py-3 sm:px-5">TOTAL</td>
                            <td class="text-right font-medium text-error pr-6 px-4 py-3 sm:px-5">{{ number_format($total_recursos) }}</td>
                        </tr>
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
            x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
            class="col-span-12 grid lg:col-span-10">
            <div class="card">
                <div class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5">
                    <div class="flex items-center space-x-2">
                        <div
                            class="flex h-7 w-7 items-center justify-center rounded-lg bg-primary/10 p-1 text-primary dark:bg-accent-light/10 dark:text-accent-light">
                            <i class="fa-solid fa-building text-base"></i>
                        </div>
                        <h4 class="text-lg font-medium text-slate-700 dark:text-navy-100">
                            Áreas involucradas en el proyecto
                        </h4>
                    </div>
                </div>
                <table class="is-zebra w-full text-left">
                    @if(count($proyecto->areas))
                        <thead>
                        <tr>
                            <th class="w-10 bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                #
                            </th>
                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Nombre del área
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($proyecto->areas as $key => $area)
                            <tr>
                                <td class="px-4 py-3 sm:px-5">{{ $key + 1 }}</td>
                                <td class="px-4 py-3 sm:px-5">{{ $area->nombre }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    @else
                        <th colspan="3"
                            class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            NO HAY ÁREAS REGISTRADAS
                        </th>
                    @endif
                </table>
            </div>
        </div>

        <div
            x-show="activeTab === 'tabActividades'"
            x-transition:enter="transition-all duration-500 easy-in-out"
            x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
            x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
            class="col-span-12 grid lg:col-span-10">
            <div class="card">
                <div class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5">
                    <div class="flex items-center space-x-2">
                        <div
                            class="flex h-7 w-7 items-center justify-center rounded-lg bg-primary/10 p-1 text-primary dark:bg-accent-light/10 dark:text-accent-light">
                            <i class="fa-solid fa-bars-staggered text-base"></i>
                        </div>
                        <h4 class="text-lg font-medium text-slate-700 dark:text-navy-100">
                            Actividades a realizar
                        </h4>
                    </div>
                </div>
                <table class="is-zebra w-full text-left">
                    @if(count($proyecto->actividades))
                        <thead>
                        <tr>
                            <th class="w-10 bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                #
                            </th>
                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Actividad
                            </th>
                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Responsable
                            </th>
                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Inicio
                            </th>
                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Fin
                            </th>
                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Entregable
                            </th>
                            <th class="w-20 bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Concluida
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($proyecto->actividades()->orderBy('fecha_final')->get() as $key => $actividad)
                            <tr>
                                <td class="px-4 py-3 sm:px-5">{{ $key+1 }}</td>
                                <td class="px-4 py-3 sm:px-5">{{ $actividad->nombre }}</td>
                                <td class="px-4 py-3 sm:px-5">{{ $actividad->responsable->nombre }}</td>
                                <td class="px-4 py-3 sm:px-5">{{ $actividad->fecha_inicio }}</td>
                                <td class="px-4 py-3 sm:px-5">{{ $actividad->fecha_final }}</td>
                                <td class="px-4 py-3 sm:px-5">{{ $actividad->entregable }}</td>
                                <td class="text-center px-4 py-3 sm:px-5">
                                    @if($actividad->concluida == 0)
                                        <span class="mt-1 badge rounded-full text-error bg-error/10 hover:bg-error/20">
                                            No
                                        </span>
                                    @else
                                        <span class="mt-1 badge rounded-full text-success bg-success/10 hover:bg-success/20">
                                            Sí
                                        </span>
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
        </div>

        <div
            x-show="activeTab === 'tabObservaciones'"
            x-transition:enter="transition-all duration-500 easy-in-out"
            x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
            x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
            class="col-span-12 grid lg:col-span-10">
            <div class="card">
                <div class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5">
                    <div class="flex items-center space-x-2">
                        <div
                            class="flex h-7 w-7 items-center justify-center rounded-lg bg-primary/10 p-1 text-primary dark:bg-accent-light/10 dark:text-accent-light">
                            <i class="fa-solid fa-search text-base"></i>
                        </div>
                        <h4 class="text-lg font-medium text-slate-700 dark:text-navy-100">
                            Observaciones agregadas
                        </h4>
                    </div>
                </div>
                <table class="is-zebra w-full text-left">
                    @if(count($proyecto->observacions))
                        <thead>
                        <tr>
                            <th class="w-10 bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                #
                            </th>
                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Agregada por...
                            </th>
                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Observación
                            </th>
                            <th class="w-20  text-center bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Leída
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($proyecto->observacions as $key => $observacion)
                            <tr>
                                <td class="px-4 py-3 sm:px-5">{{ $key+1 }}</td>
                                <td class="px-4 py-3 sm:px-5">{{ $observacion->user->name }}</td>
                                <td class="px-4 py-3 sm:px-5">{{ $observacion->observacion }}</td>
                                <td class="text-center px-4 py-3 sm:px-5">
                                    @if($observacion->leida == 0)
                                        <span class="mt-1 badge rounded-full text-error bg-error/10 hover:bg-error/20">
                                            No
                                        </span>
                                    @else
                                        <span class="mt-1 badge rounded-full text-success bg-success/10 hover:bg-success/20">
                                            Sí
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    @else
                        <th colspan="3"
                            class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            NO HAY OBSERVACIONES REGISTRADAS
                        </th>
                    @endif
                </table>
            </div>
        </div>

        <div
            x-show="activeTab === 'tabBitacora'"
            x-transition:enter="transition-all duration-500 easy-in-out"
            x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
            x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
            class="col-span-12 grid lg:col-span-10">
            <div class="card">
                <div class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5">
                    <div class="flex items-center space-x-2">
                        <div
                            class="flex h-7 w-7 items-center justify-center rounded-lg bg-primary/10 p-1 text-primary dark:bg-accent-light/10 dark:text-accent-light">
                            <i class="fa-solid fa-list-check text-base"></i>
                        </div>
                        <h4 class="text-lg font-medium text-slate-700 dark:text-navy-100">
                            Acciones realizadas por los usuarios
                        </h4>
                    </div>
                </div>
                <table class="is-zebra w-full text-left">
                    @if(count($proyecto->bitacoras))
                        <thead>
                        <tr>
                            <th class="w-10 bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                #
                            </th>
                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Usuario
                            </th>
                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Acción
                            </th>
                            <th class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Fecha/hora
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($proyecto->bitacoras as $key => $bitacora)
                            <tr>
                                <td class="px-4 py-3 sm:px-5">{{ $key + 1 }}</td>
                                <td class="px-4 py-3 sm:px-5">{{ $bitacora->user->name }}</td>
                                <td class="text-xs+ px-4 py-3 sm:px-5">{{ $bitacora->accion }}</td>
                                <td class="px-4 py-3 sm:px-5">{{ $bitacora->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    @else
                        <th colspan="3"
                            class="bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            NO HAY ACCIONES REGISTRADAS
                        </th>
                    @endif
                </table>
            </div>
        </div>
    </div>
</main>
