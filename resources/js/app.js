/*
|--------------------------------------------------------------------------
| Import de bootstrap de laravel
|--------------------------------------------------------------------------
*/
import './bootstrap';

/*-------------------------------------------------------------------------
| Configuración de VITE
|--------------------------------------------------------------------------
*/
import.meta.glob([
    '../img/**',
]);

/*
|--------------------------------------------------------------------------
| Import de AlpineJs
|--------------------------------------------------------------------------
*/
import Alpine from 'alpinejs'
import collapse from '@alpinejs/collapse'

window.Alpine = Alpine

Alpine.plugin(collapse)
Alpine.start()

/*
|--------------------------------------------------------------------------
| Código de la aplicación
|--------------------------------------------------------------------------
*/

// Change the background when scrolling
window.addEventListener("load", changeStyle);
window.addEventListener("scroll", changeStyle);

function changeStyle(){
    var navbar    = document.getElementById("nav-bar");
    var navChange = document.getElementsByClassName("nav-change");

    // When the scroll is at the top
    navbar.classList.toggle("bg-transparent", window.scrollY === 0);
    for (let i = 0; i < navChange.length; i++) {
        navChange[i].classList.toggle("nav-change-style", window.scrollY === 0);
    }
    
    // When the scroll is down
    navbar.classList.toggle("bg-primary", window.scrollY > 0);
    navbar.classList.toggle("nav-shadow", window.scrollY > 0);
    for (let i = 0; i < navChange.length; i++) {
        navChange[i].classList.toggle("nav-change-style", window.scrollY > 0);
    }
}