<div>
    <form wire:submit.prevent="submit">
        <input type="text" wire:model.defer="name">
        <input type="text" wire:model.defer="email">
        <input type="text" wire:model.defer="message">
        <input type="checkbox" wire:model.defer="checkbox"> Acepto los términos y condiciones
        <button class="rounded p-2 bg-green-500" type="submit">Submit</button>
    </form>

    @if ($errors->any())
        <div class="bg-red-300">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @push('scripts')
        @include('components.alert')
    @endpush
</div>
