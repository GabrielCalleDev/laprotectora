<x-main-layout>
    <x-slot name="title"> Adoptar mascotas </x-slot>

    <!-- Sobre nosotros -->
    <section class="container mx-auto py-4 bg-yellow-100 rounded-3xl mt-6">
        <h1 class="text-4xl text-center font-poppinsBlack py-4">¡Adopta no compres!</h1>

            <!-- Filtros -->
            <form action="{{ route('adoptions.search') }}" method="get">
                <label for="select-specie" class="">Mascota</label>
                <select id="select-specie" name="species" class="form-select mb-2">
                    <option value="" selected>Especie</option>
                    <option value="Perro" {{ request()->input('species') == 'Perro' ? 'selected' : '' }}>Perro</option>
                    <option value="Gato" {{ request()->input('species') == 'Gato' ? 'selected' : '' }}>Gato</option>
                </select>

                <label for="input-select" class="">Edad</label>
                <select id="input-select" name="age" class="form-select mb-2">
                    <option value="" selected>Selecciona edad</option>
                    <option value="1" {{ request()->input('age') == '1' ? 'selected' : '' }}>Menos de 1 año</option>
                    <option value="1-2" {{ request()->input('age') == '1-2' ? 'selected' : '' }}>Entre 1 año y 2 años</option>
                    <option value="2-3" {{ request()->input('age') == '2-3'? 'selected' : '' }}>Entre 2 año y 3 años</option>
                    <option value="3up" {{ request()->input('age') == '3up'? 'selected' : '' }}>Más de 3 años</option>
                </select>

                <label for="input-select" class="">Sexo</label>
                <select id="input-select" name="genre" class="form-select mb-2">
                    <option value="" selected>Selecciona sexo</option>
                    <option value="M" {{ request()->input('genre') == 'M' ? 'selected' : '' }}>Masculino</option>
                    <option value="F" {{ request()->input('genre') == 'G' ? 'selected' : '' }}>Femenino</option>
                </select>

                <label for="input-select" class="">Tamaño</label>
                <select id="input-select" name="size" class="form-select mb-2">
                    <option value="" selected>Selecciona tamaño</option>
                    <option value="Grande" {{ request()->input('size') == 'Grande'? 'selected' : '' }}>Grande</option>
                    <option value="Mediano" {{ request()->input('size') == 'Mediano'? 'selected' : '' }}>Mediano</option>
                    <option value="Pequeño" {{ request()->input('size') == 'Pequeño' ? 'selected' : '' }}>Pequeño</option>
                </select>

                <div class="input-group mt-2">
                    <button type="submit" class="bg-green-400"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
                </div>
            </form>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 text-center gap-8 p-6 md:p-0 mt-4">

            @forelse ($pets as $pet)

                @php($petImageUrl = $pet->getMedia('pets')->first()->getUrl())

                <div class="border-2 border-secondary rounded-2xl">
                    <a href="{{ route('pet.show', $pet) }}" class="block">
                        <img src="{{ $petImageUrl }}" alt="{{ $pet->name }}" class="mx-auto w-full bg-white rounded-lg">
                    </a>
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
        <div class="bg-white max-w-2xl mx-auto mt-6 ">
            {{ $pets->links() }}
        </div>
    </section>

    

    

    <div class="bg-content"></div>

    @push('scripts')
        <script>
            console.log('Hola desde la protectora')
        </script>
    @endpush
</x-main-layout>
