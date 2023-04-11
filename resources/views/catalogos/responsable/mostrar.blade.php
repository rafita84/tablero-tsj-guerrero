<x-app-layout title="Mostrando datos del responsable" is-sidebar-open="true" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                Detalles del responsable
            </h2>
            <div class="hidden h-full py-1 sm:flex">
                <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
            </div>
            <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                <li class="flex items-center space-x-2">
                    <a class="text-primary transition-colors hover:text-accent
                    dark:text-accent dark:hover:text-primary"
                       href="{{ route('catalogos.responsables.index') }}">
                        Ver Todos los Responsables
                    </a>
                </li>
            </ul>
        </div>


        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
            <div class="col-span-12 sm:col-span-8">
                <div class="card p-4 sm:p-5">
                    <p class="text-base font-medium text-slate-700 dark:text-navy-100">
                        Datos del responsable
                    </p>
                    <div class="mt-4 space-y-4">
                        <label class="block">
                            <span>Nombre</span>
                            <span class="relative mt-1.5 flex text-primary dark:text-white">
                                {{ $responsable->nombre }}
                            </span>
                        </label>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <label class="block">
                                <span>Correo electrónico</span>
                                <span class="relative mt-1.5 flex text-primary dark:text-white">
                                {{ $responsable->email }}
                            </span>
                            </label>
                            <label class="block">
                                <span>Número telefónico</span>
                                <span class="relative mt-1.5 flex text-primary dark:text-white">
                                {{ $responsable->telefono }}
                            </span>
                            </label>
                        </div>
                        <div x-data="{selectedArea:'0'}">
                            <label class="block mb-1">
                                <span>Área de adscripción</span>
                                <span class="relative mt-1.5 flex text-primary dark:text-white">
                                    {{ $responsable->area->nombre }}
                                </span>
                            </label>
                        </div>
                        <div x-data="{selectedUser:'0'}">
                            <label class="block mb-1">
                                <span>Usuario asociado</span>
                                <span class="relative mt-1.5 flex text-primary dark:text-white">
                                    @if(isset($responsable->user))
                                        Login: {{ $responsable->user->username }}
                                    <br />
                                        Nombre: {{ $responsable->user->name }}
                                    @else
                                        No hay usuario asociado a este responsable
                                    @endif
                                </span>
                            </label>
                        </div>
                        <div>
                            <label class="block pt-4">
                                <span>Comentarios</span>
                                <span class="relative mt-1.5 flex text-primary dark:text-white">
                                    {{ $responsable->observaciones }}
                                </span>
                            </label>
                        </div>
                        <div class="flex justify-end space-x-2">
                            <a href="{{route('catalogos.responsables.index')}}"
                                class="btn space-x-2 bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-5 w-5"
                                     viewBox="0 0 20 20"
                                     fill="currentColor">
                                    <path fill-rule="evenodd"
                                          d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                                          clip-rule="evenodd"/>
                                </svg>
                                <span>Regresar</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
