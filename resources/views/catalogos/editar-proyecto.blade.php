<x-app-layout title="Editando proyecto" is-header-blur="true">
    <!-- Main Content Wrapper -->
    @livewire('editar-proyecto', ['id' => $id])

    @livewireStyles
    @livewireScripts
</x-app-layout>
