<x-main-layout>
    <x-slot name="title"> Sobre nosotros </x-slot>

    <!-- Imagen de portada -->
    <section class="relative">
        <img src="{{ Vite::asset('resources/img/template/protectora/protectora.jpg') }}" alt="Imagen de portada" class="w-full md:h-[300px] lg:h-[450px] object-cover object-bottom">
        <div class="md:absolute md:top-20 md:left-20 font-poppinsBlack text-4xl text-quinary bg-white p-4 md:rounded-2xl shadow-square">
            <div class="shadow-text">La protectora</div>
            <div class="text-lg text-primary">"Un hogar para cada alma, una protectora para cada historia"</div>
        </div>
    </section>

    <!-- Sobre nosotros -->
    <section class="container mx-auto py-4 bg-yellow-100 rounded-3xl mt-6">
        <h1 class="text-4xl text-center font-poppinsBlack py-4">Sobre nosotros</h1>
    </section>

    <div class="bg-content"></div>

    @push('scripts')
        <script>
            console.log('Hola desde la protectora')
        </script>
    @endpush
</x-main-layout>
