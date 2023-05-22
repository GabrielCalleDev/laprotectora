<!-- Header -->
<header class="bg-background pb-4 md:pb-0">
    <div id="header" class="container mx-auto">
        @include('layouts.navbar')
        
        <!-- Header section (Intro) -->
        <section id="intro" class="container mx-auto mt-24 lg:mt-32 xl:mt-48">
            <div class="mt-0 p-3 pt-0 text-center md:text-left md:max-w-md lg:max-w-lg lg:mt-14 xl:mt-24">
                <h1 class="text-2xl pt-3 pb-5 tracking-normal text-white font-poppinsBlack lg:text-2xl xl:text-4xl md:shadow-gray-700 md:shadow-bottom">
                    Estas preparado para ayudar a tu <span class="bg-text-move">próximo compañero?</span><br>Te está esperando :)
                </h1>
                <p class="md:mt-8 mb-2 md:mb-4 text-white">
                    Con tu apoyo se pueden salvar<span class="font-bold text-quinary"> muchas vidas</span>. No compres, adopta. Hay muchas mascotas que te necesitan.
                </p>
                <a href="{{ route('adoptions') }}"><button class="my-2.5 px-10 py-2.5 mx-auto md:mx-0 bg-primary rounded-3xl text-white leading-1 shadow-sm shadow-white">¡Ver mascotas!</button></a>
            </div>
        </section>
    </div>
</header>