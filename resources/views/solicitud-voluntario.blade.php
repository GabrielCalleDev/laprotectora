<x-main-layout>
    <x-slot name="title"> Solicitud de voluntario </x-slot>

    <div class="bg-orange-400 h-[100px] lg:h-[250px]">
    </div>

    <!-- Sobre nosotros -->
    <section class="container mx-auto bg-yellow-100 rounded-3xl -mt-[50px] lg:-mt-[150px] border-2 border-primary p-4 md:p-8">
        <img src="{{ Vite::asset('resources/img/template/protectora/alta-voluntario.png') }}" class="rounded-3xl mx-auto md:w-1/3" alt="">

        <h1 class="text-4xl text-center font-poppinsBlack py-4">Solicitud de voluntario</h1>

        <div class="w-full md:w-2/3 mx-auto">
            <blockquote class="text-xl italic font-semibold text-gray-900 dark:text-white">
                <svg aria-hidden="true" class="w-10 h-10 text-gray-400 dark:text-gray-600" viewBox="0 0 24 27" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z" fill="currentColor"/></svg>
                <p>"El amor y la dedicación que brindas como voluntario de mascotas marcan una diferencia invaluable en las vidas de aquellos que no pueden hablar por sí mismos. Tu compromiso y generosidad son la fuerza que impulsa la protección, el cuidado y el bienestar de nuestras adoradas mascotas. ¡Gracias por ser un héroe en cuatro patas y hacer del mundo un lugar mejor para ellos!"</p>
            </blockquote>
        </div>
        
        {{-- Livewire component --}}
        @livewire('volunteer-request-form')

    </section>

    @push('scripts')
        <script>
            console.log('Hola desde la protectora')
        </script>
    @endpush
</x-main-layout>
