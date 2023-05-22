<div>

<section class="container mx-auto py-4 bg-gray-100 rounded-3xl mt-6">
        <h1 class="text-4xl text-center font-poppinsBlack py-4">{{ __('Ayúdanos a encontrarles un hogar') }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 text-center gap-8 p-6 md:p-0 mt-4">

            @forelse ($pets as $pet)

                @php($petImageUrl = $pet->getMedia('pets')->first()->getUrl())

                <div class="border-2 border-secondary rounded-2xl">
                    <img src="{{ $petImageUrl }}" alt="{{ $pet->name }}" class="mx-auto w-full bg-white rounded-lg">
                    <hr class="border-8 border-quinary border-dashed mt-2">
                    <div class="px-2 pt-3 bg-quinary rounded-b-2xl">
                        <h2 class="text-xl font-poppinsBlack">{{ $pet->name }}</h2>
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
                    </div>
                </div>
            @empty
                <p>No hay animales</p>
            @endforelse
                       
        </div>

        <div>
            <a href="" class="max-w-md mx-auto flex justify-center items-center bg-secondary text-white font-poppinsBlack text-xl mt-8 mb-6 py-2 rounded-2xl hover:bg-secondaryHover transition duration-300 ease-in-out">
                {{ __('Ver más') }}
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </section>
</div>
