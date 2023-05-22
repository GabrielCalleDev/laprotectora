<x-main-layout>
    <x-slot name="title"> Hazte voluntario </x-slot>

    <!-- Sobre nosotros -->
    <section class="container mx-auto py-4 bg-orange-100 rounded-3xl mt-6">
        <h1 class="text-4xl text-center font-poppinsBlack py-4">Hazte voluntario</h1>
        <a href="{{ route('volunteer.request') }}" class="block w-80 bg-yellow-300 hover:bg-yellow-400 text-gray-800 font-bold py-4 px-4 rounded items-center mx-auto text-center">
            <div class="flex justify-center">
                <x-heroicon-o-user class="w-6 h-6" />
                <span class="mr-2">Hazte voluntario</span>
                <x-heroicon-o-arrow-right class="w-6 h-6" />
            </div>
        </a>
    </section>


    <div class="bg-content"></div>

    @push('scripts')
        <script>
            console.log('Hola desde la protectora')
        </script>
    @endpush
</x-main-layout>
