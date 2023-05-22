<x-main-layout>
    <x-slot name="title"> Mascota informácion </x-slot>

    <!-- Información de la mascota -->
    <section class="container mx-auto py-4 bg-yellow-100 rounded-3xl mt-6">
        <h1 class="text-4xl text-center font-poppinsBlack py-4">¡Solicitud de información para: {{ $pet->name }}  !</h1>

        @livewire('request-information', ['pet' => $pet])

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 text-center py-4 px-6 gap-10">          
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
