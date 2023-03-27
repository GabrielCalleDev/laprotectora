<!-- Navbar Section -->
<section id="nav-bar" class="border-t-4 border-primary fixed inset-x-0 z-50 transition ease-out bg-transparent">
    <!-- Menu navigation  -->
    <nav class="container mx-auto px-2 py-2 sm:px-1">
        <div
            x-data="{
                openMenu: window.innerWidth >= 768 }" 
            x-init="() => {
                window.addEventListener('resize', () => {
                    openMenu = window.innerWidth >= 768;
                })
            }"
            class="container flex flex-wrap items-center justify-between mx-auto"
        >
            <a href="">
                <img id="logo" src="{{ Vite::asset('resources/img/template/logo.png') }}" class="w-16 md:ml-3 rounded-lg" alt="Logo protectora" />
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
                        <a href="#" class="block py-2 pl-3 pr-4 rounded-2xl md:border-0 md:py-2 md:px-2 lg:px-4">
                            Inicio
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 pl-3 pr-4 rounded-2xl md:border-0 md:py-2 md:px-2 lg:px-4">
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
                        <span 
                            x-ref="button"
                            x-on:click="toggle()"
                            :aria-expanded="open"
                            :aria-controls="$id('dropdown-button')"
                            type="button"
                            
                            class="block py-2 pl-3 pr-4 rounded-2xl md:border-0 md:py-2 md:px-2 lg:px-4 hover:cursor-pointer"
                            href="#" 
                        >
                            Cómo ayudar
                            <x-heroicon-o-chevron-down id="flecha-abajo" class="w-6 h-6 inline-block text-primary nav-change"/>
                        </span>

                        <!-- Panel de opciones -->
                        <div
                            x-ref="panel"
                            x-show="open"
                            x-collapse
                            x-on:click.outside="close($refs.button)"
                            :id="$id('dropdown-button')"
                            style="display: none;"
                            class="relative md:absolute md:left-0 md:mt-2 w-52 md:rounded-md bg-white md:border text-black md:shadow-md px-3 md:py-4"
                        >
                            <a href="#" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md md:px-4 py-2.5 text-left hover:bg-gray-50 disabled:text-gray-500 text-s {{ request()->routeIs('help.make-donation') ? 'font-bold' : '' }}">
                                Haz un donativo
                            </a>
                
                            <a href="" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md md:px-4 py-2.5 text-left hover:bg-gray-50 disabled:text-gray-500 text-s {{ request()->routeIs('help.make-volunteer') ? 'font-bold' : '' }}">
                                Hazte voluntario
                            </a>
                        </div>
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
                        <span 
                            x-ref="button"
                            x-on:click="toggle()"
                            :aria-expanded="open"
                            :aria-controls="$id('dropdown-button')"
                            type="button"
                            
                            class="block py-2 pl-3 pr-4 rounded-2xl md:border-0 md:py-2 md:px-2 lg:px-4 hover:cursor-pointer"
                            href="#" 
                        >
                            Adopta
                            <x-heroicon-o-chevron-down id="flecha-abajo" class="w-6 h-6 inline-block text-primary nav-change"/>
                        </span>

                        <!-- Panel de opciones -->
                        <div
                            x-ref="panel"
                            x-show="open"
                            x-collapse
                            x-on:click.outside="close($refs.button)"
                            :id="$id('dropdown-button')"
                            style="display: none;"
                            class="relative md:absolute md:left-0 md:mt-2 w-52 md:rounded-md bg-white md:border text-black md:shadow-md px-3 md:py-4"
                        >
                            <a href="#" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md md:px-4 py-2.5 text-left hover:bg-gray-50 disabled:text-gray-500 text-s {{ request()->routeIs('adopt.pets') ? 'font-bold' : '' }}">
                                Mascotas en adopción
                            </a>
                
                            <a href="" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md md:px-4 py-2.5 text-left hover:bg-gray-50 disabled:text-gray-500 text-s {{ request()->routeIs('adopt.happy-endings') ? 'font-bold' : '' }}">
                                Finales felices
                            </a>
                        </div>
                    </li>
                    <li>
                        <a href="" class="block py-2 pl-3 pr-4 rounded-2xl md:border-0 md:py-2 md:px-2 lg:px-4  {{ request()->routeIs('contact') ? 'font-bold' : '' }}">
                            Contacto
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>