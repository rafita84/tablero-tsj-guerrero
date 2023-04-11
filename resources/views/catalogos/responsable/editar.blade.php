<x-app-layout title="Editar responsable" is-sidebar-open="true" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                Editar responsable
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
                    <form action="{{ route('catalogos.responsables.update', $responsable->id) }}" method="post">
                        @method('PATCH')
                        @csrf
                    <div class="mt-4 space-y-4">
                        <label class="block">
                            <span>Nombre</span>
                            <span class="relative mt-1.5 flex">
                                <input
                                    value="{{ $responsable->nombre }}"
                                    class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder="Nombre del responsable"
                                    name="nombre"
                                    type="text"/>
                                <span
                                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                    <i class="far fa-user text-base"></i>
                                </span>
                            </span>
                        </label>
                        @error('nombre')
                            <span class="text-tiny+ text-error">{{ $message }}</span>
                        @enderror
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <label class="block">
                                <span>Correo electrónico</span>
                                <span class="relative mt-1.5 flex">
                                  <input value="{{ $responsable->email }}"
                                      class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                      placeholder="Correo electrónico"
                                      name="email"
                                      type="email"/>
                                  <span
                                      class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                    <i class="fa fa-mail-bulk text-base"></i>
                                  </span>
                                </span>
                                @error('email')
                                <span class="text-tiny+ text-error">{{ $message }}</span>
                                @enderror
                            </label>
                            <label class="block">
                                <span>Número telefónico</span>
                                <span class="relative mt-1.5 flex">
                                  <input class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                         placeholder="(747) 123-4567"
                                         name="telefono"
                                         value="{{ $responsable->telefono }}"
                                         type="text"
                                         x-input-mask="{numericOnly: true, blocks: [0, 3, 3, 4], delimiters: ['(', ') ', '-']}"/>
                                      <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                        <i class="fa fa-phone"></i>
                                      </span>
                                </span>
                                @error('telefono')
                                    <span class="text-tiny+ text-error">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                        <div x-data="{selectedArea:'{{ $responsable->area_id }}'}">
                            <label class="block mb-1">
                                <span>Área de adscripción</span>
                                <select name="area"
                                    x-model="selectedArea"
                                    class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">
                                    @foreach($areas as $area)
                                        <option value="{{$area->id}}">{{ $area->nombre }}</option>
                                    @endforeach
                                </select>
                            </label>
                            <a href="{{ route('catalogos.areas.create') }}" class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"><i class="fa fa-plus"></i> Crear nueva área</a>
                        </div>
                        <div x-data="{selectedUser:'{{$responsable->user_id}}'}">
                            <label class="block mb-1">
                                <span>Asociar a un usuario del sistema </span>
                                <select name="usuario"
                                    x-model="selectedUser"
                                    class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">
                                    <option value="0">- Sin usuario asignado -</option>
                                    @foreach($usuarios as $usuario)
                                        <option value="{{$usuario->id}}">{{ $usuario->name }}</option>
                                    @endforeach
                                </select>
                            </label>
                            <a href="#" class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"><i class="fa fa-plus"></i> Crear un nuevo usuario</a>
                        </div>
                        <div x-data="{hasComentarios:false}">
                            <div class="flex-wrap items-start space-y-2 pt-2 sm:flex sm:space-y-0 sm:space-x-5">
                                <label class="inline-flex items-center space-x-2">
                                    <input
                                        x-model="hasComentarios"
                                        class="form-checkbox is-basic h-5 w-5 rounded border-slate-400/70 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                                        type="checkbox"/>
                                    <span>Comentarios adicionales</span>
                                </label>
                                <div>
                                    <a
                                        @click="hasComentarios = !hasComentarios"
                                        class="cursor-pointer border-b border-dotted border-current pb-0.5 font-medium text-primary outline-none transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">
                                        <span x-show="!hasComentarios">Mostrar</span><span x-show="hasComentarios">Ocultar</span>
                                    </a>
                                </div>
                            </div>
                            <div x-show="hasComentarios" x-collapse>
                                <label class="block pt-4">
                                    <span>Comentarios</span>
                                    <textarea rows="4"
                                              placeholder="Agregar comentarios adicionales"
                                              name="observaciones"
                                              class="form-textarea mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent">{{ $responsable->observaciones }}</textarea>
                                </label>
                            </div>
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
                                <span>Cancelar</span>
                            </a>
                            <button type="submit"
                                class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                <span>Guardar cambios</span>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5"
                                    viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        fill-rule="evenodd"
                                        d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
