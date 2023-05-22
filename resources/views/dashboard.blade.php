<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Escritorio') }}
        </h2>
    </x-slot>

    {{-- Livewire componente --}}
    @livewire('user-profile')
</x-app-layout>
