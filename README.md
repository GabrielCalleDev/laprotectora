![Descripción del proyecto](./docs/dog.png)

# Información del proyecto
Desarrollado con el stack TALL
- [TailwindCSS](https://tailwindcss.com/)
- [AlpineJS](https://alpinejs.dev/)
- [Laravel](https://laravel.com/)
- [Livewire](https://laravel-livewire.com/)

![Tecnologías utilizadas](./docs/stack%20tall.png)

- [FilamentPHP](https://filamentphp.com/)

![Tecnologías utilizadas](./docs/filament.png)

---


# Instrucciones
Para ejecutar el proyecto hay que copiar el archivo .env.example a .env
```bash
cp .env.example .env
```

Iniciar docker con sail
```bash
./vendor/bin/sail up -d
```

Si nos hemos descargado el proyecto en otro ordenador y estamos en linux:
```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

Ejecutar el comando para crear el enlace simbólico para que storage pueda funcionar:
```bash
php artisan storage:link
```

Y dentro de Sail ejecutar:
```bash
composer install
npm install
npm run dev
```

Ejecutar las migraciones:
>php artisan migrate:fresh --seed

Usuario y contraseña de prueba:

>Usuario: admin@admin.com

>contraseña: password

Navegar a: 
>http://localhost/

# Sprint 1.0 
# Sprint 2.0 
# Sprint 3.0 

Primera parte del proyecto de fin de curso. 
- [Diagrama de casos de uso](#casos_de_uso)
- [Diagrama de bases de datos](#bases_de_datos)
- [Wireframes](#wireframes)
- [Vistas](#vistas)
- [Rutas](#rutas)



<a name="casos_de_uso"></a>
## Diagrama de casos de uso
![Alt text](docs/diagrama_casos_de_uso/casos_de_uso.protectora.png)
![Alt text](docs/diagrama_casos_de_uso/proceso_adopcion.png)

<a name="bases_de_datos"></a>
## Diagrama de bases de datos
![Alt text](docs/diagrama_bbdd/diagrama_relacional_bbdd.png)
![Alt text](docs/diagrama_bbdd/diagrama_relacional_phpmyadmin.PNG)

<a name="wireframes"></a>
## Diagrama de casos de uso
![Alt text](docs/wireframes/wireframe-administrador.png)
![Alt text](docs/wireframes/wireframe-usuario-gestor.png)
![Alt text](docs/wireframes/wireframe-usuario-logueado.png)
![Alt text](docs/wireframes/wireframe-usuario.png)



<a name="vistas"></a>
## Vistas de la aplicación
![Alt text](docs/capturas_app/cabecera.png)
![Alt text](docs/capturas_app/home.png)
![Alt text](docs/capturas_app/footer.png)
![Alt text](docs/capturas_app/home-page.png)
![Alt text](docs/capturas_app/la_protectora.png)
![Alt text](docs/capturas_app/hacer_donacion.png)
![Alt text](docs/capturas_app/hacerse_voluntario.png)
![Alt text](docs/capturas_app/adopciones.png)
![Alt text](docs/capturas_app/perfil_animal.png)
![Alt text](docs/capturas_app/solicitud_informacion.png)
![Alt text](docs/capturas_app/solicitud_adopcion.png)
![Alt text](docs/capturas_app/contacto.png)
![Alt text](docs/capturas_app/perfil_usuario.png)
![Alt text](docs/capturas_app/perfil_con_gestion_avatar.png)


## Vistas del administrador
![Alt text](docs/capturas_app/admin/dashboard.png)
![Alt text](docs/capturas_app/admin/mascotas.png)
![Alt text](docs/capturas_app/admin/mascota_registro.png)
![Alt text](docs/capturas_app/admin/mascotas_relaciones.png)
![Alt text](docs/capturas_app/admin/casa_de_acogida.png)
![Alt text](docs/capturas_app/admin/adopciones.png)
![Alt text](docs/capturas_app/admin/contactos.png)
![Alt text](docs/capturas_app/admin/donaciones.png)
![Alt text](docs/capturas_app/admin/usuarios_personas.png)



<a name="rutas"></a>
## Listado de rutas.

>php artisan route:list

![Alt text](docs/php_artisan_route_list.png)


## Desarrollo
Para inicializar el proyecto en entorno dev y arrancar Vite para escuchar cambios:
>npm run dev

## Producción
Para compilar todos los archivos a través de Vite:
>npm run build

---

![Desarrollo](./docs/web_development.png)
# Información sobre las dependencias utilizadas

## Instalación de Sass
>npm install sass --save-dev

## Instalación de Tailwind sobre laravel.
>npm install -D tailwindcss postcss autoprefixer
>npx tailwindcss init -p

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
```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```

## Instalación AlpineJS
https://alpinejs.dev/
>npm install alpinejs

```js
import Alpine from 'alpinejs'
 
window.Alpine = Alpine
 
Alpine.start()
```

## Instalación de Livewire
>composer require livewire/livewire

Incluir los assets de livewire:
```php
  <html>
  <head>
      ...
      @livewireStyles
  </head>
  <body>
      ...
      @livewireScripts
  </body>
  </html>
```

<hr>

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>