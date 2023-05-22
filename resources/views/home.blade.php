<x-main-layout>
    <x-slot name="title"> Inicio </x-slot>

    <!-- Nuestros objetivos -->
    <section class="container mx-auto py-4 bg-yellow-100 rounded-3xl mt-6">
        <h1 class="text-4xl text-center font-poppinsBlack py-4">{{ __('Nuestros objetivos') }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 text-center py-4">
            <div>
                <img src="{{ Vite::asset('resources/img/template/main/1.png') }}" alt="Objetivo 1" class="mx-auto rounded-xl w-8/12">
                <p class="text-center font-poppinsBlack px-4 py-2">
                    {{ __('Recogida de animales abandonados y maltratados') }}
                </p>
            </div>
            <div>
                <img src="{{ Vite::asset('resources/img/template/main/2.png') }}" alt="Objetivo 1" class="mx-auto rounded-xl w-8/12">
                <p class="text-center font-poppinsBlack px-4 py-2">
                    {{ __('Cuidado y tratamientos veterinarios') }}
                </p>
            </div>
            <div>
                <img src="{{ Vite::asset('resources/img/template/main/3.png') }}" alt="Objetivo 1" class="mx-auto rounded-xl w-8/12">
                <p class="text-center font-poppinsBlack px-4 py-2">
                    {{ __('Búsqueda de hogares para mascotas que lo necesitan.') }}
                </p>
            </div>
            <div>
                <img src="{{ Vite::asset('resources/img/template/main/4.png') }}" alt="Objetivo 1" class="mx-auto rounded-xl w-8/12">
                <p class="text-center font-poppinsBlack px-4 py-2">
                    {{ __('Actividades para fomentar la protección y cuidado de los animales') }}
                </p>
            </div>
        </div>
    </section>

    <!-- Ayudanos a encontrarles un hogar -->
    @livewire('pets') {{-- Componente de livewire --}}

    <!-- Welcome section -->
    <section id="welcome" class="container mx-auto bg-gray-100 rounded-3xl mt-6 py-6">

        <h1 class="text-4xl text-center font-poppinsBlack my-4">{{ __('Nuestra historia') }}</h1>

        <div class="grid grid-cols-1 gap-4 justify-center">
            <div class="flex items-center px-6 xl:px-4 text-justify">
            Sit voluptate aute cupidatat tempor dolore laborum proident qui nostrud aute officia laborum. Pariatur laboris anim commodo et ipsum eu eu esse mollit non dolore. Commodo esse esse mollit aliquip. Do reprehenderit incididunt cupidatat aliqua deserunt sint excepteur proident proident. Aliqua occaecat Lorem dolor dolore eu ea irure dolore nulla proident amet dolor veniam. <br>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem enim consequatur voluptatum animi vel molestias nulla quod, aut error mollitia ducimus dolor possimus magni totam obcaecati dolore perspiciatis eos assumenda.
            </div>
            <div class="bg-content"></div>
        </div>
    </section>
    
    <!-- Como puedes colaborar? -->
    <section class="container mx-auto py-4 bg-yellow-100 rounded-3xl mt-6">
        <h1 class="text-4xl text-center font-poppinsBlack py-4">{{ __('¿Como puedes colaborar?') }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 text-center py-4">
            <div>
                <img src="{{ Vite::asset('resources/img/template/main/colabora1.png') }}" alt="Objetivo 1" class="mx-auto rounded-xl">
                <p class="text-center font-poppinsBlack px-4 py-2">
                    {{ __('Adopta un animal') }}
                </p>
            </div>
            <div>
                <img src="{{ Vite::asset('resources/img/template/main/colabora2.png') }}" alt="Objetivo 1" class="mx-auto rounded-xl">
                <p class="text-center font-poppinsBlack px-4 py-2">
                    {{ __('Hazte voluntario') }}
                </p>
            </div>
            <div>
                <img src="{{ Vite::asset('resources/img/template/main/colabora3.png') }}" alt="Objetivo 1" class="mx-auto rounded-xl">
                <p class="text-center font-poppinsBlack px-4 py-2">
                    {{ __('Haz donativo') }}
                </p>
            </div>
        </div>
    </section>


    @push('scripts')
        <script>
            // *******************************************************************
            // Change the background dinamically with setInterval
            const images = [
                `url("{{ Vite::asset('resources/img/template/header1.jpg') }}")`,
                `url("{{ Vite::asset('resources/img/template/fondo.jpg') }}")`,
                `url("{{ Vite::asset('resources/img/template/header2.jpg') }}")`,
            ];
            let i = 0;
            function changeBg() {
                document.querySelector('header').style.backgroundImage = images[i];
                if (++i === images.length) i = 0;
                setTimeout(changeBg, 4000);
            }
            changeBg();
            // End change the background dinamically with setInterval
            // *******************************************************************
        </script>
    @endpush
</x-main-layout>
