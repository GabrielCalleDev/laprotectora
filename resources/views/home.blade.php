<x-main-layout>
    <x-slot name="title"> Inicio </x-slot>

    <!-- Welcome section -->
    <section id="welcome" class="container mx-auto">
        <div class="grid grid-cols-1 gap-4 my-14 justify-center">
            <div class="flex items-center px-6 xl:px-1 text-justify">
            Sit voluptate aute cupidatat tempor dolore laborum proident qui nostrud aute officia laborum. Pariatur laboris anim commodo et ipsum eu eu esse mollit non dolore. Commodo esse esse mollit aliquip. Do reprehenderit incididunt cupidatat aliqua deserunt sint excepteur proident proident. Aliqua occaecat Lorem dolor dolore eu ea irure dolore nulla proident amet dolor veniam. <br>
            Sit voluptate aute cupidatat tempor dolore laborum proident qui nostrud aute officia laborum. Pariatur laboris anim commodo et ipsum eu eu esse mollit non dolore. Commodo esse esse mollit aliquip. Do reprehenderit incididunt cupidatat aliqua deserunt sint excepteur proident proident. Aliqua occaecat Lorem dolor dolore eu ea irure dolore nulla proident amet dolor veniam. <br>
            Sit voluptate aute cupidatat tempor dolore laborum proident qui nostrud aute officia laborum. Pariatur laboris anim commodo et ipsum eu eu esse mollit non dolore. Commodo esse esse mollit aliquip. Do reprehenderit incididunt cupidatat aliqua deserunt sint excepteur proident proident. Aliqua occaecat Lorem dolor dolore eu ea irure dolore nulla proident amet dolor veniam. <br>
            Sit voluptate aute cupidatat tempor dolore laborum proident qui nostrud aute officia laborum. Pariatur laboris anim commodo et ipsum eu eu esse mollit non dolore. Commodo esse esse mollit aliquip. Do reprehenderit incididunt cupidatat aliqua deserunt sint excepteur proident proident. Aliqua occaecat Lorem dolor dolore eu ea irure dolore nulla proident amet dolor veniam. <br>
            Sit voluptate aute cupidatat tempor dolore laborum proident qui nostrud aute officia laborum. Pariatur laboris anim commodo et ipsum eu eu esse mollit non dolore. Commodo esse esse mollit aliquip. Do reprehenderit incididunt cupidatat aliqua deserunt sint excepteur proident proident. Aliqua occaecat Lorem dolor dolore eu ea irure dolore nulla proident amet dolor veniam. <br>
            Sit voluptate aute cupidatat tempor dolore laborum proident qui nostrud aute officia laborum. Pariatur laboris anim commodo et ipsum eu eu esse mollit non dolore. Commodo esse esse mollit aliquip. Do reprehenderit incididunt cupidatat aliqua deserunt sint excepteur proident proident. Aliqua occaecat Lorem dolor dolore eu ea irure dolore nulla proident amet dolor veniam. <br>
            Sit voluptate aute cupidatat tempor dolore laborum proident qui nostrud aute officia laborum. Pariatur laboris anim commodo et ipsum eu eu esse mollit non dolore. Commodo esse esse mollit aliquip. Do reprehenderit incididunt cupidatat aliqua deserunt sint excepteur proident proident. Aliqua occaecat Lorem dolor dolore eu ea irure dolore nulla proident amet dolor veniam. <br>
            Sit voluptate aute cupidatat tempor dolore laborum proident qui nostrud aute officia laborum. Pariatur laboris anim commodo et ipsum eu eu esse mollit non dolore. Commodo esse esse mollit aliquip. Do reprehenderit incididunt cupidatat aliqua deserunt sint excepteur proident proident. Aliqua occaecat Lorem dolor dolore eu ea irure dolore nulla proident amet dolor veniam. <br>
            </div>
            <div class="bg-content"></div>
        </div>
    </section>
    
    @push('scripts')
        <script>
            console.log("test")
        </script>
        
        <script>
            // Change the background dinamically with setInterval
            const images = [
                `url("{{ Vite::asset('resources/img/template/header1.jpg') }}")`,
                `url("{{ Vite::asset('resources/img/template/fondo.jpg') }}")`,
                `url("{{ Vite::asset('resources/img/template/header2.jpg') }}")`,
            ];

            let i = 0;

            function changeBg() {
                document.querySelector('header').style.backgroundImage = images[i];
                i++;
                if (i === images.length) {
                    i = 0;
                }
                setTimeout(changeBg, 4000);
            }

            changeBg();
        </script>
    @endpush
</x-main-layout>
