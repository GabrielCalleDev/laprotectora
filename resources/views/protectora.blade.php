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

        <p class="p-4 md:p-8">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure nam sit amet reiciendis sint assumenda ducimus pariatur in quo iste, optio voluptatum quibusdam officia cumque ratione mollitia culpa, labore excepturi. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam ad quibusdam nulla accusamus officiis accusantium obcaecati quia sequi itaque architecto, alias quam enim eaque fugit, ab fuga ducimus nisi non!Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure nam sit amet reiciendis sint assumenda ducimus pariatur in quo iste, optio voluptatum quibusdam officia cumque ratione mollitia culpa, labore excepturi. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam ad quibusdam nulla accusamus officiis accusantium obcaecati quia sequi itaque architecto, alias quam enim eaque fugit, ab fuga ducimus nisi non!</p>
    </section>

    <!-- Personal -->
    <section class="container mx-auto py-4 bg-gray-100 rounded-3xl mt-6">
        <h1 class="text-4xl text-center font-poppinsBlack py-4">Nuestro equipo</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 text-center gap-8 p-6 md:p-0 mt-4 justify-around">
            <div class="text-center">
                <img src="{{Vite::asset('resources/img/template/protectora/user.png')}}" class="w-1/2 mx-auto rounded-3xl" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod hic ipsam tempora voluptates officia est earum cupiditate sequi ipsa aspernatur repudiandae provident omnis ex, libero corrupti similique, enim sint eligendi!</p>
            </div>
            <div class="text-center">
                <img src="{{Vite::asset('resources/img/template/protectora/user.png')}}" class="w-1/2 mx-auto rounded-3xl" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod hic ipsam tempora voluptates officia est earum cupiditate sequi ipsa aspernatur repudiandae provident omnis ex, libero corrupti similique, enim sint eligendi!</p>
            </div>
            <div class="text-center">
                <img src="{{Vite::asset('resources/img/template/protectora/user.png')}}" class="w-1/2 mx-auto rounded-3xl" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod hic ipsam tempora voluptates officia est earum cupiditate sequi ipsa aspernatur repudiandae provident omnis ex, libero corrupti similique, enim sint eligendi!</p>
            </div>
        </div>
    </section>

    <!-- banner -->
    <section class="container mx-auto rounded-3xl mt-6">
        <img src="{{ Vite::asset('resources/img/template/protectora/banner.png') }}" class="mx-auto max-full md:w-4/5 rounded-xl" alt="">
    </section>

    
    @push('scripts')
        <script>
            console.log('Hola desde la protectora')
        </script>
    @endpush
</x-main-layout>
