<div>
    @if (auth()->user()->favorites->contains($pet))
        <div class="flex items-center">
            <span class="bg-green-500 text-white py-1 px-2 rounded border-green-600 border-2"> Favorito</span>
            <x-heroicon-s-trash wire:click="deleteFavorite({{ $pet->id }})" class="w-6 h-6  cursor-pointer text-red-500 inline-block" />
        </div>
    @else
        <div wire:click="addFavorite( {{ $pet->id }} )" class="text-green-600 cursor-pointer"><x-heroicon-s-plus-circle class="w-6 h-6 inline-block border border-green-600 rounded-full"/> añadir favorito</div>
    @endif
</div>

@push('scripts')
    @include('components.alert')
@endpush

