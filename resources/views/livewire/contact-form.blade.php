<div>
    <form wire:submit.prevent="submit">
        nombre <input type="text" wire:model.defer="name"><br>
        email  <input type="text" wire:model.defer="email"><br>
        asunto <input type="text" wire:model.defer="subject"><br>
        mensaje <input type="text" wire:model.defer="message"><br>
        <input type="checkbox" wire:model.defer="checkbox"> Acepto los términos y condiciones<br>
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
