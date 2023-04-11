<x-report-layout title="Formato del proyecto" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8 text-slate-800 ">
        <div class="flex justify-between flex-row space-x-2">
            <img class="h-16 w-auto"
                 src="{{asset('images/tribunalsuperior.png') }}" alt="tsj" />
            <div class="text-center">
                <p class="text-xs">PODER JUDICIAL DEL ESTADO DE GUERRERO</p>
                <p class="text-xs">TRIBUNAL SUPERIOR DE JUSTICIA - CONSEJO DE LA JUDICATURA</p>
                <p class="text-xs+ font-semibold">FICHA DE PROYECTO</p>
            </div>
            <img class="h-16 w-auto"
                 src="{{asset('images/consejo.png') }}" alt="consejo" />
        </div>

        <div class="dark:bg-white card px-2 py-1 dark:text-slate-800 mt-2">
            <p class="text-xs uppercase">
                Nombre o denominación del proyecto
            </p>
            <h2 class="text-lg font-medium">
                {{ $proyecto->nombre }}
            </h2>
        </div>

        <div class="card px-2 py-1 dark:bg-white dark:text-slate-800 mt-1">
            <div class="flex justify-between flex-row">
                <div class="text-left">
                    <p class="text-xs font-bold uppercase  ">
                        Eje estratégico
                    </p>
                    <p class="text-sm">
                        {{ $proyecto->eje_estrategico }}
                    </p>
                </div>
                <div class="text-right">
                    <p class="text-xs font-bold uppercase  ">
                        Encargado del proyecto
                    </p>
                    <div>
                        <p class="text-sm">{{ $proyecto->responsable->nombre }}</p>
                        <p class="text-sm">{{ $proyecto->responsable->area->nombre }}</p>
                    </div>
                </div>
            </div>
            <div class="my-1 h-px bg-slate-200 "></div>
            <p class="text-xs font-bold uppercase  ">
                Objetivo
            </p>
            <p class="text-sm text-justify">
                {{ $proyecto->objetivo }}
            </p>
            <div class="my-1 h-px bg-slate-200 "></div>
            <p class="text-xs font-bold uppercase  ">
                Justificación del proyecto / Diagnóstico actual
            </p>
            <p class="text-sm text-justify">
                {{ $proyecto->justificacion }}
            </p>
        </div>

            <div class="flex justify-between flex-row space-x-2">
                <div class="w-full mt-2">
                    <p class="text-xs font-bold uppercase  ">
                        Recursos necesarios
                    </p>
                    <div class="card dark:bg-white dark:text-slate-800 ">
                        <table class="is-zebra w-full text-left">
                            <thead>
                            <tr>
                                <th class="text-center rounded-l-lg bg-slate-200 px-2 py-1 font-semibold uppercase  text-xs">
                                    No.
                                </th>
                                <th class="bg-slate-200 px-2 py-1 font-semibold uppercase  text-xs">
                                    Concepto
                                </th>
                                <th class="rounded-r-lg bg-slate-200 px-2 py-1 text-right font-semibold uppercase  text-xs">
                                    Costo
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($proyecto->recursos as $key => $recurso)
                                <tr>
                                    <td class="text-center px-2 py-1 text-xs+">
                                        {{ $key+1 }}
                                    </td>
                                    <td class="px-2 py-1 text-xs+">
                                        {{ $recurso->concepto }}
                                    </td>
                                    <td class="px-2 py-1 text-right text-xs+">
                                        {{ number_format($recurso->costo, 2) }}
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="w-full mt-2">
                    <p class="text-xs font-bold uppercase  ">
                        Áreas involucradas
                    </p>
                    <div class="card dark:bg-white dark:text-slate-800">
                        <table class="is-zebra w-full text-left">
                            <thead>
                            <tr>
                                <th class="text-center rounded-l-lg bg-slate-200 px-2 py-1 font-semibold uppercase  text-xs">
                                    No.
                                </th>
                                <th class="rounded-r-lg bg-slate-200 px-2 py-1 text-center font-semibold uppercase  text-xs">
                                    Área
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($proyecto->areas as $key => $area)
                                <tr>
                                    <td class="px-2 py-1 text-center text-xs+">
                                        {{ $key+1 }}
                                    </td>
                                    <td class="text-right px-2 py-1 text-xs+">
                                        {{ $area->nombre }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <p class="text-xs font-bold text-center uppercase ">
                Desarrollo del proyecto
            </p>
            <div class="card dark:bg-white dark:text-slate-800 ">
                <table class="is-zebra w-full text-left">
                    <thead>
                    <tr>
                        <th class="text-center rounded-l-lg bg-slate-200 px-2 py-1 font-semibold uppercase  text-xs">
                            No.
                        </th>
                        <th class="bg-slate-200 px-2 py-1 font-semibold uppercase  text-xs">
                            Actividad
                        </th>
                        <th class="bg-slate-200 px-2 py-1 font-semibold uppercase  text-xs">
                            Responsable
                        </th>
                        <th class="bg-slate-200 px-2 py-1 font-semibold uppercase  text-xs text-center">
                            Fecha de inicio
                        </th>
                        <th class="bg-slate-200 px-2 py-1 font-semibold uppercase  text-xs text-center">
                            Fecha final
                        </th>
                        <th class="rounded-r-lg bg-slate-200 px-2 py-1 text-center font-semibold uppercase  text-xs">
                            Entregable
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($proyecto->actividades as $key => $actividad)
                        <tr>
                            <td class="px-2 py-1 text-center text-xs+">
                                {{ $key+1 }}
                            </td>
                            <td class="px-2 py-1 text-xs+">
                                {{ $actividad->nombre }}
                            </td>
                            <td class="px-2 py-1 text-xs+">
                                {{ $actividad->responsable->nombre }}
                            </td>
                            <td class="px-2 py-1 whitespace-nowrap text-center text-xs+">
                                {{ $actividad->fecha_inicio }}
                            </td>
                            <td class="px-2 py-1 whitespace-nowrap text-center text-xs+">
                                {{ $actividad->fecha_final }}
                            </td>
                            <td class="px-2 py-1 text-xs+">
                                {{ $actividad->entregable }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        <div class="card px-5 py-5 dark:bg-white dark:text-slate-800 mt-1">
            <div class="flex justify-between flex-row space-x-2">
                <div class="text-left">
                    <p class="text-xs font-bold uppercase  ">
                        Elaboró
                    </p>
                    <div class="text-sm ">
                        {{ $proyecto->elabora }}
                    </div>
                </div>
                <div class="text-left">
                    <p class="text-xs font-bold uppercase  ">
                        Aprobó
                    </p>
                    <div class="text-sm ">
                        {{ $proyecto->aprueba }}
                    </div>
                </div>
                <div class="text-left">
                    <p class="text-xs font-bold uppercase ">
                        Fecha de aprobación
                    </p>
                    <div class="text-sm ">
                        {{ $proyecto->fecha_aprobacion }}
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-report-layout>
