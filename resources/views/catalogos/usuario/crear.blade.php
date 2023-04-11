<x-app-layout title="Crear nuevo usuario" is-sidebar-open="true" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                Nuevo usuario
            </h2>
            <div class="hidden h-full py-1 sm:flex">
                <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
            </div>
            <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                <li class="flex items-center space-x-2">
                    <a class="text-primary transition-colors hover:text-accent
                    dark:text-accent dark:hover:text-primary"
                       href="{{ route('catalogos.usuarios.index') }}">
                        Ver Todos los Usuarios
                    </a>
                </li>
            </ul>
        </div>


        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
            <div class="col-span-12 sm:col-span-8">
                <div class="card p-4 sm:p-5">
                    <p class="text-base font-medium text-slate-700 dark:text-navy-100">
                        Datos del Usuario
                    </p>
                    <form action="{{ route('catalogos.usuarios.store') }}" method="post">
                        @csrf
                    <div class="mt-4 space-y-4">
                        <label class="block">
                            <span>Nombre</span>
                            <span class="relative mt-1.5 flex">
                                <input
                                    class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder="Nombre de la persona"
                                    name="name" required
                                    type="text"/>
                                <span
                                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                    <i class="far fa-user text-base"></i>
                                </span>
                            </span>
                        </label>
                        @error('name')
                            <span class="text-tiny+ text-error">{{ $message }}</span>
                        @enderror
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <label class="block">
                                <span>Correo electrónico</span>
                                <span class="relative mt-1.5 flex">
                                  <input
                                      class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                      placeholder="Correo electrónico"
                                      name="email" required
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
                                <span>Nombre de usuario</span>
                                <span class="relative mt-1.5 flex">
                                  <input class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                         placeholder="Nombre de usuario"
                                         name="identity" required
                                         type="text" />
                                      <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                        <i class="fa fa-user-alt"></i>
                                      </span>
                                </span>
                                @error('identity')
                                    <span class="text-tiny+ text-error">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                        <div x-data="{selectedArea:'0'}">
                            <label class="block mb-1">
                                <span>Nivel</span>
                                <select name="nivel"
                                    x-model="selectedArea"
                                    class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">
                                    @foreach(\App\Models\User::$niveles as $clave => $valor)
                                        <option value="{{$clave}}">{{ $valor }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>

                        <div class="flex justify-end space-x-2">
                            <a href="{{route('catalogos.usuarios.index')}}"
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
                                <span>Guardar</span>
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
