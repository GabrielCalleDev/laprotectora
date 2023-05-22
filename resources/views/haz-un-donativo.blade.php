<x-main-layout>
    <x-slot name="title"> Haz un donativo </x-slot>

    <!-- Sobre nosotros -->
    <section class="container mx-auto py-4 bg-blue-100 rounded-3xl mt-6">
        <h1 class="text-4xl text-center font-poppinsBlack py-4">Haz un donativo</h1>
    </section>

    <!-- Quieres hacer un donativo? -->
    <section class="container mx-auto py-4 bg-yellow-100 rounded-3xl mt-6">
        <div class="flex p-6 md:p-0 mt-4">
            <div class="w-full md:w-7/12">
                <h1 class="text-4xl text-center font-poppinsBlack py-4">¿Quieres hacer un donativo?</h1>
                <p class="p-4 md:p-8">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Labore, saepe minus vitae vero quod illo laborum totam, eaque illum laboriosam similique non itaque tempore molestiae quae mollitia in quasi quam  Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus ipsam earum, accusamus quo, exercitationem assumenda in quae eius nemo nisi dicta at distinctio deserunt quasi similique nesciunt sit perspiciatis obcaecati. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi eum cum eveniet perferendis, ab consequuntur optio quidem error. Aliquam maxime ratione distinctio quis, iure alias placeat minus commodi facilis beatae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam quibusdam minima ad reiciendis velit corporis eligendi ipsa excepturi nisi nemo. Cumque temporibus deserunt cum sit quis deleniti voluptates ex harum.</p>
            </div>
            <div class="w-full md:w-5/12 p-4 md:p-8">
                <img src="{{ Vite::asset('resources/img/template/donacion/donacion.png') }}" class="w-full md:w-4/5 mx-auto my-auto rounded-3xl" alt="">
            </div>
        </div>
    </section>

    <!-- Tipos de donaciones -->
    <section class="container mx-auto py-4 bg-gray-100 rounded-3xl mt-6">
        <h1 class="text-4xl text-center font-poppinsBlack py-4">Maneras de ayudar</h1>

        <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 text-center gap-8 p-6 md:p-0 mt-4 justify-around">
            <div class="text-center bg-blue-100 rounded-2xl p-4">
                <img src="{{Vite::asset('resources/img/template/donacion/donacion-1.png')}}" class="w-1/2 h-52 mx-auto rounded-3xl" alt="">
                <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod hic ipsam tempora voluptates officia est earum cupiditate sequi ipsa aspernatur repudiandae provident omnis ex, libero corrupti similique, enim sint eligendi!</p>
            </div>
            <div class="text-center bg-blue-100 rounded-2xl p-4">
                <img src="{{Vite::asset('resources/img/template/donacion/donacion-2.png')}}" class="w-1/2 h-52 mx-auto rounded-3xl" alt="">
                <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod hic ipsam tempora voluptates officia est earum cupiditate sequi ipsa aspernatur repudiandae provident omnis ex, libero corrupti similique, enim sint eligendi!</p>
            </div>
            <div class="text-center bg-blue-100 rounded-2xl p-4">
                <img src="{{Vite::asset('resources/img/template/donacion/donacion-3.png')}}" class="w-1/2 h-52 mx-auto rounded-3xl" alt="">
                <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod hic ipsam tempora voluptates officia est earum cupiditate sequi ipsa aspernatur repudiandae provident omnis ex, libero corrupti similique, enim sint eligendi!</p>
            </div>
            <div class="text-center bg-blue-100 rounded-2xl p-4">
                <img src="{{Vite::asset('resources/img/template/donacion/donacion-4.png')}}" class="w-1/2 h-52 mx-auto rounded-3xl" alt="">
                <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod hic ipsam tempora voluptates officia est earum cupiditate sequi ipsa aspernatur repudiandae provident omnis ex, libero corrupti similique, enim sint eligendi!</p>
            </div>
        </div>
    </section>
    
    @push('scripts')
        <script>
            console.log('Hola desde la protectora')
        </script>
    @endpush
</x-main-layout>
