<x-main-layout>
    <x-slot name="title"> Mascota informácion </x-slot>
    
    <div class="bg-quinary h-[100px] lg:h-[250px]">
    </div>

    <!-- Sobre nosotros -->
    <section class="container mx-auto bg-white rounded-3xl -mt-[50px] lg:-mt-[180px] border-2 border-primary p-4 md:p-8 shadow-bottom">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 text-center py-4 mx-auto">
            <div class="px-2 pt-3 bg-quinary rounded-b-2xl">
                <hr class="border-8 border-quinary border-dashed mt-2">
                <h2 class="text-5xl font-poppinsBlack">{{ $pet->name }}</h2>
                <div class="flex justify-around pt-2 pb-3">
                    <p class="text-sm font-extrabold">
                        {{ __('Tamaño') }}<br>
                        {{ $pet->size }}
                    </p>
                    <p class="text-sm font-extrabold">
                        {{ __('Edad') }}<br>
                        {{ $pet->age }}
                    </p>
                    <p class="text-sm font-extrabold">
                        {{ __('Sexo') }}<br>
                        {{ $pet->sex === 'M' ? 'Macho' : 'Hembra' }}
                    </p>                           
                </div>

                <div class="flex justify-center items-center">
                    <a href="{{ route('pet.request.information', $pet) }}" class="block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Solicitar información
                    </a>
                    <a href="{{ route('pet.request.adoption', $pet) }}" class="ml-4 block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Solicitar adopción
                    </a>
                </div>
            </div>

            <div>
                <h1 class="text-4xl text-center font-poppinsBlack py-4">
                    Información de : {{ $pet->name }}
                    <div class="my-4 ml-20 w-3/4">
                        @livewire('favorite-button', ['pet' => $pet])
                    </div>
                </h1>
                <div class="w-full md:w-2/3 mx-auto">
                    <blockquote class="text-xl italic font-semibold text-gray-900 dark:text-white">
                        <svg aria-hidden="true" class="w-10 h-10 text-gray-400 dark:text-gray-600" viewBox="0 0 24 27" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z" fill="currentColor"/></svg>
                        <p>"Tu tiempo y esfuerzo como voluntario de mascotas crean un mundo más amable para ellos."</p>
                    </blockquote>
                </div>
            </div>
            <img src="{{ Vite::asset('resources/img/template/no-compres-adopta.png') }}" class="rounded-3xl w-auto mx-auto" alt="">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 text-center py-4 gap-10">          
            @forelse($pet->getMedia('pets') as $media)
                <div class="border-2 border-secondary rounded-2xl">
                    <img src="{{ $media->getUrl() }}" alt="{{ $pet->name }}" class="mx-auto w-full bg-white rounded-lg">
                    <hr class="border-8 border-quinary border-dashed mt-0 rounded-b-xl">
                </div>    
            @empty
                <div class="border-2 border-secondary rounded-2xl">
                    No hay imagenes de la mascota seleccionada
                    <hr class="border-8 border-quinary border-dashed mt-0 rounded-b-xl">
                </div>
            @endforelse
            
        </div>
    </section>

    @push('scripts')
        <script>
            console.log('Hola desde la protectora')
        </script>
    @endpush
</x-main-layout>
