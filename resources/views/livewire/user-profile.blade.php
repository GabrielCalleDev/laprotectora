<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if($user->hasAdoptionsInProgress())
                        <span class="group relative inline-block text-sm font-medium text-white focus:outline-none focus:ring">
                            <span class="absolute inset-0 border border-green-600 group-active:border-green-500"></span>
                            <span class="block border border-green-600 bg-green-600 px-12 py-3 transition-transform active:border-green-500 active:bg-green-500 group-hover:translate-x-1 group-hover:translate-y-1">
                                ADOPCIÓN EN PROCESO
                            </span>
                        </span>

                        <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            @forelse ($adoptionsInProcess as $adoption)
                                @php($pet = $adoption->pet)

                                @php($petImageUrl = $pet->getMedia('pets')->first()->getUrl())

                                <div class="relative border-2 border-secondary rounded-2xl">
                                    <span class="absolute -top-4 -left-3 bg-quinary border-yellow-500 text-green-800 font-bold capitalize px-auto w-28 p-2 text-center rounded">{{ $adoption->status }}</span>
                                    <img src="{{ $petImageUrl }}" alt="{{ $pet->name }}" class="mx-auto w-full bg-white rounded-lg">
                                    <hr class="border-8 border-green-300 border-dashed mt-2">
                                    <div class="px-2 pt-3 bg-green-200 rounded-b-2xl">
                                        <div class="flex justify-center">
                                            <h2 class="text-xl font-poppinsBlack ">{{ $pet->name }}</h2>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="p-4 bg-yellow-200 border border-yellow-200 max-w-2xl mx-auto rounded ">No tienes favoritos</p>
                            @endforelse
                        </div>
                        


                        
                        

                    @else
                        <span class="group relative inline-block text-sm font-medium text-white focus:outline-none focus:ring">
                            <span class="absolute inset-0 border border-red-600 group-active:border-red-500"></span>
                            <span class="block border border-red-600 bg-red-600 px-12 py-3 transition-transform active:border-red-500 active:bg-red-500 group-hover:translate-x-1 group-hover:translate-y-1">
                                NO TIENES ADOPCIONES EN CURSO
                            </span>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <span class="group relative inline-block text-sm font-medium text-white focus:outline-none focus:ring">
                        <span class="absolute inset-0 border border-yellow-600 group-active:border-yellow-500"></span>
                        <span class="block border border-yellow-600 bg-yellow-600 px-12 py-3 transition-transform active:border-yellow-500 active:bg-yellow-500 group-hover:translate-x-1 group-hover:translate-y-1">
                            TUS FAVORITOS
                        </span>
                    </span>
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
                            <p class="p-4 bg-yellow-200 border border-yellow-200 max-w-2xl mx-auto rounded ">No tienes favoritos</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    @include('components.alert')
@endpush