<x-base-layout>
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-12 text-center">
            <div class="avatar h-16 w-16">
                <div class="is-initial rounded-full bg-gradient-to-br from-pink-500 to-rose-500 text-white">
                    <i class="fa-solid fa-user-lock text-2xl"></i>
                </div>
            </div>
            <h3 class="mt-3 text-xl font-semibold text-slate-600 dark:text-navy-100">
                Políticas de privacidad
            </h3>
            <p class="mt-0.5 text-base">
                Leer antes de continuar
            </p>
        </div>
        <div class="mx-auto mt-8 grid w-full max-w-4xl grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:gap-6">
            {!! $policy !!}
        </div>
    </main>
</x-base-layout>
