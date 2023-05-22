<!-- Navbar Section -->
<section id="nav-bar" class="border-t-4 border-primary fixed inset-x-0 z-50 transition ease-out bg-transparent">
    <!-- Menu navigation  -->
    <nav class="container mx-auto px-2 py-2 sm:px-1">
        <div
            x-data="{
                openMenu: window.innerWidth >= 768 
            }" 
            x-init="() => {
                window.addEventListener('resize', () => {
                    openMenu = window.innerWidth >= 768;
                })
            }"
            class="container flex flex-wrap items-center justify-between mx-auto"
        >
            <a href="{{ route('home') }}" class="flex items-center">
                <img id="logo" src="{{ Vite::asset('resources/img/template/logo.png') }}" class="w-14 md:ml-3 rounded-lg border-b-2 border-r" alt="Logo protectora" />
                <h1 class="hidden lg:block text-2xl font-bold ml-2 nav-change rounded-lg p-3 border-b-2 border-l h-full nav-change-style">Protectora</h1>
            </a>
            <img x-on:click="openMenu = !openMenu" class="boton-menu w-10 h-10 p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" src="{{ Vite::asset('resources/img/template/icono-boton-menu.svg') }}" alt="" style="margin-top:-13px;">
            <div class="menu-responsive w-full md:block md:w-auto">
                <ul
                    x-show="openMenu"
                    x-on:click.away="openMenu = window.innerWidth < 768 ? false : true"
                    x-collapse
                    x-cloak
                    class="flex flex-col pt-2 py-4 bg-white md:flex-row md:space-x-1 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-transparent nav-change"
                >
                    <li>
                        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'bg-primary text-white' : '' }} hover:bg-quinary block py-2 pl-3 pr-4 rounded-lg md:border-2 border-quinary md:py-2 md:px-2 lg:px-4">
                            Inicio
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('protectora') }}" class="hover:bg-quinary block py-2 pl-3 pr-4 rounded-lg md:border-2 border-quinary md:py-2 md:px-2 lg:px-4">
                            La protectora
                        </a>
                    </li>
                    <li 
                        x-data="{
                            open: false,
                            toggle() {
                                if (this.open) {
                                    return this.close()
                                }                
                                this.$refs.button.focus()
                                this.open = true
                            },
                            close(focusAfter) {
                                if (! this.open) return
                                this.open = false
                                focusAfter && focusAfter.focus()
                            }
                        }"
                        x-on:keydown.escape.prevent.stop="close($refs.button)"
                        x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                        x-id="['dropdown-button']"
                        class="relative"
                    >
                        <!-- Boton -->
                        <button 
                            x-ref="button"
                            x-on:click="toggle()"
                            :aria-expanded="open"
                            :aria-controls="$id('dropdown-button')"
                            type="button"   
                            class="hover:bg-quinary md:block flex justify-between w-full rounded-lg md:border-2 border-quinary py-2 pl-3 pr-4 md:py-1.5 md:px-2 lg:px-4 hover:cursor-pointer"
                            href="#" 
                        >
                            Cómo ayudar
                            <x-heroicon-o-chevron-down id="flecha-abajo" class="w-6 h-6 inline-block text-primary nav-change"/>
                        </button>

                        <!-- Panel de opciones -->
                        <div
                            x-ref="panel"
                            x-show="open"
                            x-collapse
                            x-on:click.outside="close($refs.button)"
                            :id="$id('dropdown-button')"
                            style="display: none;"
                            class="relative md:absolute md:-left-5 md:mt-2 w-52 md:rounded-md bg-white md:border-2 text-black md:shadow-md"
                        >
                            <a href="{{ route('make.donation') }}" class="flex items-center px-4 gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md md:px-4 py-2.5 text-left hover:bg-gray-50 disabled:text-gray-500 text-s {{ request()->routeIs('help.make-donation') ? 'font-bold' : '' }}">
                                Haz un donativo
                            </a>
                
                            <a href="{{ route('make.volunteer') }}" class="flex items-center px-4 gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md md:px-4 py-2.5 text-left hover:bg-gray-50 disabled:text-gray-500 text-s {{ request()->routeIs('help.make-volunteer') ? 'font-bold' : '' }}">
                                Hazte voluntario
                            </a>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('adoptions') }}" class="hover:bg-quinary block py-2 pl-3 pr-4 rounded-lg md:border-2 border-quinary md:py-2 md:px-2 lg:px-4">
                            Adopciones
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="hover:bg-quinary block py-2 pl-3 pr-4 rounded-lg md:border-2 border-quinary md:py-2 md:px-2 lg:px-4  {{ request()->routeIs('contact') ? 'font-bold' : '' }}">
                            Contacto
                        </a>
                    </li>
                    <li 
                        x-data="{
                            open: false,
                            toggle() {
                                if (this.open) {
                                    return this.close()
                                }
                                this.$refs.button.focus()
                                this.open = true
                            },
                            close(focusAfter) {
                                if (! this.open) return
                                this.open = false
                                focusAfter && focusAfter.focus()
                            }
                        }"
                        x-on:keydown.escape.prevent.stop="close($refs.button)"
                        x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                        x-id="['dropdown-button']"
                        class="relative"
                    >
                        <!-- Boton -->
                        <button 
                            x-ref="button"
                            x-on:click="toggle()"
                            :aria-expanded="open"
                            :aria-controls="$id('dropdown-button')"
                            type="button"
                            class="hover:bg-quinary md:block flex justify-between w-full py-2 pl-3 pr-4 rounded-lg md:border-2 border-quinary md:py-1.5 md:px-2 lg:px-4 hover:cursor-pointer"
                            href="#" 
                        >
                            <div class="inline md:hidden">{{ __('Espacio personal') }}</div>
                            <span>
                                @auth
                                    @if (Auth::user()->getMedia('avatars')->first())
                                        <img class="h-6 w-6 inline rounded-full border border-quinary" src="{{ Auth::user()->getMedia('avatars')->first()->getUrl('thumb') }}" alt="{{ Auth::user()->name }}" />
                                    @endif
                                @endauth

                                @guest
                                    <img src=" {{ Vite::asset('resources/img/template/login.png') }} " alt="" class="h-6 w-6 inline">
                                @endguest
                                <x-heroicon-o-chevron-down id="flecha-abajo" class="w-6 h-6 inline-block text-primary nav-change"/>
                            </span>
                        </button>

                        <!-- Panel de opciones -->
                        <div
                            x-ref="panel"
                            x-show="open"
                            x-collapse
                            x-on:click.outside="close($refs.button)"
                            :id="$id('dropdown-button')"
                            style="display: none;"
                            class="relative md:absolute md:-left-14 md:mt-2 w-40 md:rounded-md bg-white md:border-2 text-black md:shadow-md"
                        >
                            @auth
                                <div class="p-2">Hola {{ Auth::user()->name }}</div>

                                <!-- Escritorio -->
                                <x-dropdown-link :href="route('dashboard')">
                                    {{ __('Escritorio') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </x-dropdown-link>
                                </form>
                            @endauth

                            @guest
                                <a href="{{ route('login') }}" class="flex items-center px-4 gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md md:px-4 py-2.5 text-left hover:bg-gray-50 disabled:text-gray-500 text-s {{ request()->routeIs('adopt.pets') ? 'font-bold' : '' }}">
                                    Iniciar sesión
                                </a>
                    
                                <a href="{{ route('register') }}" class="flex items-center px-4 gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md md:px-4 py-2.5 text-left hover:bg-gray-50 disabled:text-gray-500 text-s {{ request()->routeIs('adopt.happy-endings') ? 'font-bold' : '' }}">
                                    Registrarse
                                </a>
                            @endguest
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>