<x-main-layout>
    <x-slot name="title"> Hazte voluntario </x-slot>

    <!-- Sobre nosotros -->
    <section class="container mx-auto py-4 bg-yellow-100 rounded-3xl mt-6">
        <h1 class="text-4xl text-center font-poppinsBlack py-4">Hazte voluntario</h1>
    </section>

    <div class="bg-content"></div>

    @push('scripts')
        <script>
            console.log('Hola desde la protectora')
        </script>
    @endpush
</x-main-layout>
