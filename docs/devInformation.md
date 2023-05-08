## Instalación de laravel Breeze
Para instalar laravel breeze se ha ejecutado el siguiente comando:
>composer require laravel/breeze --dev

Después de la instalación se ha instalado breeze
>php artisan breeze:install

Una vez instalado se ejecutan los siguientes comandos:
>php artisan migrate

>npm install

>npm run dev

## Instalación de Sass
>npm install sass --save-dev

## Instalación de Tailwind sobre laravel.
Instala Tailwind y sus dependencias mediante el comando npm:
>npm install -D tailwindcss postcss autoprefixer

Luego ejecuta el siguiente comando para inicializar Tailwind y crear los archivos de configuración tailwind.config.js y postcss.config.js:

A modo de información, el flag -p se usa para crear el archivo postcss.config.js.
>npx tailwindcss init -p


A continuación edita el archivo tailwind.config.js y agrega las rutas hacia los archivos de plantilla con extensión .blade de Laravel, así como también hacia los posibles archivos JavaScript:
```js
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
```

Luego edita el archivo /resources/scss/app.scss de Laravel y agrega las directivas de los diferentes componentes o capas de Tailwind:
```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```

## Instalación Heroicons
https://heroicons.com/
https://github.com/tailwindlabs/heroicons
>composer require blade-ui-kit/blade-heroicons

Una vez instalado se puede utilizar de la siguiente manera: 
```php
<x-heroicon-o-chevron-down class="w-6 h-6 text-primary"/>
```

## Instalación AlpineJS
https://alpinejs.dev/
>npm install alpinejs

Ahora hay que impotar el paquete e iniciarlizarlo, editamos el archivo app.js y añadimos lo siguiente:
```js
import Alpine from 'alpinejs'
 
window.Alpine = Alpine
 
Alpine.start()
```

### Instalación del plugin alpinejs/collapse
Para instalar el plugin collapse de alpine se ha de ejecutar:
>npm install @alpinejs/collapse

Se ha de realizar su importanción en javascript
```js
import Alpine from 'alpinejs'
import collapse from '@alpinejs/collapse'

window.Alpine = Alpine

Alpine.plugin(collapse)
Alpine.start()
```

## Instalación de LiveWire

Para instalar LiveWire se ha de ejecutar el siguiente comando:
>composer require livewire/livewire

## Instalación de Filament
Para instalar Filament se ha de ejecutar el siguiente comando:
>composer require filament/filament

Para crear un usuario usuario se ha de ejecutar el siguiente comando:
>php artisan filament:user