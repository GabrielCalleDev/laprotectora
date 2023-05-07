<!-- Header -->
<header class="bg-background pb-4 md:pb-0">
    <div id="header" class="container mx-auto">
        @include('layouts.navbar')
        
        <!-- Header section (Intro) -->
        <section id="intro" class="container mx-auto mt-24 lg:mt-40 xl:mt-48">
            <div class="text-black mt-0 p-3 pt-0 text-center md:text-left md:max-w-xs lg:max-w-md lg:mt-14 xl:mt-24">
                <h1 class="text-2xl p-5 tracking-normal md:text-white font-poppinsBlack lg:text-2xl xl:text-4xl shadow-gray-700 shadow-bottom">
                    Adipising veniam <span class="bg-text-move">quis irur</span> pariatur proident minim 
                </h1>
                <p class="mt-8 mb-2 md:mb-4 md:text-white">
                    Laborum sit ipsum <span class="font-bold text-primary">aute excepteur</span> velit quis amet quis. Irure ut exercitation amet aliqua
                </p>
                <a href=""><button class="my-2.5 px-10 py-2.5 mx-auto md:mx-0 bg-primary rounded-3xl text-white leading-1 shadow-sm shadow-white">¡Ver mascotas!</button></a>
            </div>
        </section>
    </div>
    <img class="md:hidden w-full" src="{{ Vite::asset('resources/img/template/fondo.jpg') }}" alt="" style="margin-top:-30px;"/>
</header>