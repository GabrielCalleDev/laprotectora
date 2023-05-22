<x-main-layout>
    <x-slot name="title"> Mascota informácion </x-slot>

    <!-- Información de la mascota -->
    <section class="container mx-auto py-4 bg-yellow-100 rounded-3xl mt-6">
        <h1 class="text-4xl text-center font-poppinsBlack py-4">¡Solicitud de adoption de mascota!</h1>

        @dump($pet->toArray())

        @dump($pet->getMedia('pets')->toArray())

        @livewire('request-adoption', ['pet' => $pet])

    </section>

    @push('scripts')
        <script>
            console.log('Hola desde la protectora')
        </script>
    @endpush
</x-main-layout>
