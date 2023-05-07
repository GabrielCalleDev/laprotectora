{{-- Footer form svg --}}
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"  preserveAspectRatio="" class="-mt-20 md:-mt-40">
    <path fill="#161515" d="M0,288L60,277.3C120,267,240,245,360,234.7C480,224,600,224,720,240C840,256,960,288,1080,282.7C1200,277,1320,235,1380,213.3L1440,192L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
</svg>

<footer class="bg-primary px-0 md:px-2 py-10 text-gray-200 text-sm">
    <!-- Footer sections -->
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 md:text-center lg:text-start lg:grid-cols-5 p-4 md:p-0">
        <!-- Footer brand shelter -->
        <section id="shelter-brand" class="lg:col-span-2 pr-3 flex items-center">
            <img class="md:mx-auto lg:mx-0 rounded-md w-24 h-24" src="{{ Vite::asset('resources/img/dog.png') }}">
            <p class="info-brand p-5 leading-7">
                Cupidatat enim labore consectetur Lorem ullamco. Sunt nisi sit excepteur aute in eiusmod.
                Qui officia occaecat laboris anim nostrud elit commodo sit incididunt. Anim dolor esse sint
                labore dolor anim et nostrud dolor labore enim.
                <br>
                <span class="italic tracking-wider">
                    <img class="inline-block" src="{{ Vite::asset('resources/img/layout/footer-icono-email.svg') }}"/> <a href="mailto:info@info.com">info@info.com</a><br>
                    <img class="inline-block" src="{{ Vite::asset('resources/img/layout/footer-icono-phone.svg') }}"/> Phone: <a href="tel:+34654654654">654654654</a><br>
                    (De lunes a viernes de 9:00 a 18:00)
                </span>
            </p>
        </section>
        <!-- Footer legal -->
        <section id="legal" class="lg:pl-8">
            <nav>
                <h2 class="text-xl my-4 font-bold">Legal</h2>
                <ul>
                    <li class="py-1.5"><a href="{{ route('legal') }}">Condiciones de uso</a></li>
                    <li class="py-1.5"><a href="{{ route('legal') }}">Aviso legal</a></li>
                    <li class="py-1.5"><a href="#">Política de privacidad</a></li>
                    <li class="py-1.5"><a href="#">Política de cookies</a></li>
                </ul>
            </nav>
        </section>
        <section id="legal" class="lg:pl-8">
            <nav>
                <h2 class="text-xl my-4 font-bold">Legal</h2>
                <ul>
                    <li class="py-1.5"><a href="{{ route('legal') }}">Condiciones de uso</a></li>
                    <li class="py-1.5"><a href="{{ route('legal') }}">Aviso legal</a></li>
                    <li class="py-1.5"><a href="#">Política de privacidad</a></li>
                    <li class="py-1.5"><a href="#">Política de cookies</a></li>
                </ul>
            </nav>
        </section>
        <section id="legal" class="lg:pl-8">
            <nav>
                <h2 class="text-xl my-4 font-bold">Legal</h2>
                <ul>
                    <li class="py-1.5"><a href="{{ route('legal') }}">Condiciones de uso</a></li>
                    <li class="py-1.5"><a href="{{ route('legal') }}">Aviso legal</a></li>
                    <li class="py-1.5"><a href="#">Política de privacidad</a></li>
                    <li class="py-1.5"><a href="#">Política de cookies</a></li>
                </ul>
            </nav>
        </section>
    </div>
    <!-- Final ©Copyleft de footer -->
    <div class="container mx-auto p-4 lg:p-0">
        <hr class="bg-white mb-10 md:my-10">
        <section id="footer" class="flex justify-between">
            <div id="copyleft" class="italic">
                (ɔ)Protectora 2023
            </div>
            <div id="redes-sociales" class="flex">
                <div class="mr-1.5"><img src="{{ Vite::asset('resources/img/layout/iconos-rrss-facebook.svg') }}"></div>
                <div><img src="{{ Vite::asset('resources/img/layout/iconos-rrss-linstagram.svg') }}"></div>
            </div>
        </section>
    </div>
</footer>