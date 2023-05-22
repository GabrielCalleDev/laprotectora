<x-main-layout>
    <x-slot name="title"> Mascota informácion </x-slot>

    <!-- Información de la mascota -->
    <section class="container mx-auto py-4 bg-yellow-100 rounded-3xl mt-6">
        <h1 class="text-4xl text-center font-poppinsBlack py-4">¡Ver información de mascota!</h1>

        @dump($pet->toArray())

        @dump($pet->getMedia('pets')->toArray())

        <a href="{{ route('pet.request.information', $pet) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Solicitar información
        </a>

        <a href="{{ route('pet.request.adoption', $pet) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Solicitar adopción
        </a>

    </section>

    @push('scripts')
        <script>
            console.log('Hola desde la protectora')
        </script>
    @endpush
</x-main-layout>
