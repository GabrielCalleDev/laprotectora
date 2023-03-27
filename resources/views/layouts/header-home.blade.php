<!-- Header -->
<header class="bg-background pb-4 md:pb-0">
    <div id="header" class="container mx-auto">
        @include('layouts.navbar')
        
        <!-- Header section (Intro) -->
        <section id="intro" class="container mx-auto mt-24 lg:mt-32 xl:mt-48">
            <div class="text-black mt-0 p-3 md:w-1/2 lg:mt-14 xl:mt-24">
                <h1 class="text-2xl tracking-normal font-poppinsBlack lg:text-2xl xl:text-4xl">
                    Adipisicing veniam <span class="text-primary">quis irure</span> pariatur proident minim ea velit duis 
                </h1>
                <p class="mt-4 mb-2 md:mb-4">
                    Laborum sit ipsum aute excepteur velit quis amet quis. Irure ut exercitation amet aliqua ad adipisicing 
                    cupidatat cillum. Dolore non aliquip tempor consectetur veniam incididunt do dolor elit ipsum. Sint id e
                    nim irure sit anim. Enim officia aute cillum cupidatat enim reprehenderit.
                </p>
                <a href=""><button class="my-3 px-10 py-2.5 bg-primary rounded-3xl text-white leading-1">¡Ver mascotas!</button></a>
            </div>
        </section>
    </div>
    <img class="md:hidden w-full" src="{{ Vite::asset('resources/img/template/fondo.jpg') }}" alt="" style="margin-top:-30px;"/>
</header>