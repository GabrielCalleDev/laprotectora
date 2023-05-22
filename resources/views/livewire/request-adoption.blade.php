<div>
    <form wire:submit.prevent="submit">
        <input type="text" wire:model.defer="message">
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
