<x-main-layout>
    <x-slot name="title"> Hazte voluntario </x-slot>

    <!-- Quieres ser voluntario? -->
    <section class="container mx-auto py-4 bg-yellow-100 rounded-3xl mt-6">
        <div class="block md:flex p-6 md:p-0 mt-4">
            <div class="w-full md:w-5/12 p-4 md:p-8 flex items-center">
                <img src="{{ Vite::asset('resources/img/template/voluntario/voluntario-1.png') }}" class="w-full lg:h-full mx-auto my-auto rounded-3xl" alt="">
            </div>
            <div class="w-full md:w-7/12">
                <h1 class="text-4xl text-center font-poppinsBlack py-4">¿Quieres ser voluntario?</h1>
                <p class="p-4 md:p-8">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Labore, saepe minus vitae vero quod illo laborum totam, eaque illum laboriosam similique non itaque tempore molestiae quae mollitia in quasi quam  Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus ipsam earum, accusamus quo, exercitationem assumenda in quae eius nemo nisi dicta at distinctio deserunt quasi similique nesciunt sit perspiciatis obcaecati. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi eum cum eveniet perferendis, ab consequuntur optio quidem error. Aliquam maxime ratione distinctio quis, iure alias placeat minus commodi facilis beatae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam quibusdam minima ad reiciendis velit corporis eligendi ipsa excepturi nisi nemo. Cumque temporibus deserunt cum sit quis deleniti voluptates ex harum.</p>
            </div>
        </div>
    </section>

    <!-- Sobre nosotros -->
    <section class="container mx-auto py-4 bg-orange-100 rounded-3xl mt-6">
        <h1 class="text-4xl text-center font-poppinsBlack py-4">Hazte voluntario</h1>

        <div class="flex justify-center items-center">
            <img src="{{ Vite::asset('resources/img/template/logo.png') }}" class="rounded-3xl" alt=""/>
            <a href="{{ route('volunteer.request') }}" class="bg-yellow-300 hover:bg-yellow-400 text-gray-800 font-bold py-4 px-4 rounded items-center text-center">
                <div class="flex justify-center">
                    <x-heroicon-o-user class="w-6 h-6" />
                    <span class="mr-2">Hazte voluntario</span>
                    <x-heroicon-o-arrow-right class="w-6 h-6" />
                </div>
            </a>
        </div>
    </section>

    <!-- Apuntate? -->
    <section class="container mx-auto py-4 bg-yellow-100 rounded-3xl mt-6">
        <div class="p-6 md:p-0 mt-4">
            <img src="{{ Vite::asset('resources/img/template/voluntario/voluntario-2.png') }}" class="w-4/5 h-full mx-auto my-auto rounded-3xl" alt="">
            <p class="p-4 md:p-8"> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Inventore laboriosam minus dolorum natus beatae incidunt quasi. Reprehenderit commodi delectus blanditiis enim alias eligendi obcaecati incidunt. Accusamus vero nam optio esse. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum maxime, eius labore quisquam officia iure culpa ea iste in laboriosam mollitia nemo velit rem deleniti vitae hic impedit nulla quis! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quaerat quis impedit rem. Minus dolorum id incidunt veritatis asperiores quidem laboriosam ut. Alias quo exercitationem eaque architecto magni dolor consequuntur odio? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit nemo enim nobis totam exercitationem dolore expedita non omnis! Quia obcaecati voluptas voluptatum nobis est molestias quas rem accusantium deserunt odit!</p>
        </div>
    </section>



    @push('scripts')
        <script>
            console.log('Hola desde la protectora')
        </script>
    @endpush
</x-main-layout>
