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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                @this.on('alert', (tipo, mensaje) => {
                    Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    }).fire({
                        icon: tipo,
                        title: mensaje
                    })
                });
            });
        </script>
    @endpush
</div>
