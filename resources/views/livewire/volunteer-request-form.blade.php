<div class="p-4 md:p-8">
    @if ($showForm)
        
        <form wire:submit.prevent="submit" class="max-w-3xl bg-white mx-auto border-2 border-gray-500 rounded-3xl p-4 md:p-8">
            <h1 class="text-xl text-center font-poppinsBlack py-4">¿Quieres ser voluntario?</h1>

            <div class="mb-6">
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                <input type="text"  wire:model.defer="name" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ej. Gabriel" value="{{ auth()->user()->name }}">
            </div>
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="text" wire:model.defer="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ej. Correo electronico" >
            </div>
            <div class="mb-6">
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
                <input type="text" wire:model.defer="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ej. +34 680271717" >
            </div>
            <div class="mb-6">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mensaje para tu solicitud</label>
                <input type="text"  wire:model.defer="message" id="message" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Mensaje para añadir a la solicitud" >
            </div>
            <div class="flex items-start mb-6">
                <div class="flex items-center h-5">
                <input id="remember" type="checkbox"  wire:model.defer="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" >
                </div>
                <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Acepto los términos y condiciones</label>
            </div>
            <div class="w-60 mx-auto">
                <span wire:click="submit" class="cursor-pointer group relative inline-block text-sm font-medium text-white focus:outline-none focus:ring">
                    <span class="absolute inset-0 border border-green-600 group-active:border-green-500"></span>
                    <span class="block border border-green-600 bg-green-600 px-12 py-3 transition-transform active:border-green-500 active:bg-green-500 group-hover:translate-x-1 group-hover:translate-y-1">
                        Enviar solicitud
                    </span>
                </span>
            </div>
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="bg-red-400 my-4 p-2 text-white rounded">- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>

    @else
        <div class="max-w-3xl bg-white mx-auto border-2 border-gray-500 rounded-3xl p-4 md:p-8">
            <h1 class="text-xl text-center font-poppinsBlack py-4">Gestión realizada correctamente</h1>
            <p class="text-center p-6 bg-green-300 rounded border-2 border-green-500">Ya has enviado una solicitud de voluntariado, en breve nos pondremos en contacto contigo.</p>
        </div>
    @endif


    
    @push('scripts')
        @include('components.alert')
    @endpush
</div>
