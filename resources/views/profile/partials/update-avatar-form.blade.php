<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Avatar') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Actualiza el avatar de tu cuenta") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update.avatar') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        {{-- Si hay un avatar asignado al usuario --}}
        @if ( auth()->user()->getMedia('avatars')->first() ) 
            <!-- Avatar actual -->
            <div>
                Avatar actual
                <img src="{{ auth()->user()->getMedia('avatars')->first()->getUrl() }}" alt="avatar" class="w-28 h-28 rounded-full">
            </div>
        @endif

        {{-- Asignar al usuario un avatar nuevo o actualizarlo --}}
        <!-- Avatar -->
        <div>
            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="file">
                Avatar nuevo
            </label>
            <input id="file" type="file" name="avatar" class="dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full h-10 border border-gray-300 align-middle px-3 py-2 text-sm" />
            @error('avatar')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-4 mt-2">
            <x-primary-button>{{ __('Actualizar avatar') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif

            @if (session('status') === 'avatar-deleted')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Avatar eliminado.') }}</p>
            @endif

            @if (session('status') === 'avatar-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Avatar actualizado.') }}</p>
            @endif
        </div>
    </form>
    {{-- Si existe algún avatar, mostrar opcion de eliminarlo --}}
    @if(auth()->user()->getMedia('avatars')->first() !== null)
        <form method="post" action="{{ route('profile.destroy.avatar') }}" class="mt-6 space-y-6">
            @csrf
            @method('delete')
            
            <div>
                <x-danger-button>{{ __('Eliminar avatar') }}</x-danger-button>
            </div>
        </form>
    @endif
</section>
