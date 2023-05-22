<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Tus favoritos") }}
                </div>

                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @forelse ($favorites as $pet)

                            @php($petImageUrl = $pet->getMedia('pets')->first()->getUrl())

                            <div class="border-2 border-secondary rounded-2xl">
                                <img src="{{ $petImageUrl }}" alt="{{ $pet->name }}" class="mx-auto w-full bg-white rounded-lg">
                                <hr class="border-8 border-quinary border-dashed mt-2">
                                <div class="px-2 pt-3 bg-quinary rounded-b-2xl">
                                    <div class="flex justify-between">
                                        <h2 class="text-xl font-poppinsBlack ">{{ $pet->name }}</h2>
                                        <div class="">
                                            <button wire:click="removeFavorite({{ $pet->id }})" class="max-w-md mx-auto flex justify-center items-center bg-red-500 text-white text-sm p-2 rounded hover:bg-red-700 transition duration-300 ease-in-out">
                                                {{ __('Eliminar') }}
                                                <i class="fas fa-arrow-right ml-2"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="flex justify-around pt-2 pb-3">
                                        <p class="text-sm font-extrabold">
                                            {{ __('Tamaño') }}<br>
                                            {{ $pet->size }}
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
                </div>
            </div>
        </div>
    </div>
</div>
