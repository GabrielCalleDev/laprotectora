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
## Wireframes
![Alt text](docs/wireframes/wireframe-administrador.png)
![Alt text](docs/wireframes/wireframe-usuario-gestor.png)
![Alt text](docs/wireframes/wireframe-usuario-logueado.png)
![Alt text](docs/wireframes/wireframe-usuario.png)



<a name="vistas"></a>
## Vistas de la aplicación
![Alt text](docs/capturas_app/cabecera.png)
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

## Video resultado final:
- [Video publico en drive](https://drive.google.com/file/d/12YqomvwwRe3ujQHTHY1Tb_XxMjEkmXMT/view)

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



Aplicación desarrollada bajo la licencia AGPLv3

La Licencia Pública General de Affero (AGPL) es una licencia de software libre y de código abierto que se aplica no solo a la distribución del software, sino también a su uso en red, como una aplicación web. Fue creada por la Free Software Foundation (FSF) como una extensión de la Licencia Pública General de GNU (GPL), ambas creadas por el reconocido programador y activista de software libre, Richard Stallman.

La AGPL garantiza que cualquier persona que acceda al software a través de una red, como una aplicación web, también tenga acceso al código fuente del software. Esto significa que si utilizas la AGPL para tu aplicación web, cualquier usuario que acceda a la aplicación web debe tener acceso al código fuente del software.

La AGPL también es una licencia copyleft, lo que significa que cualquier derivado del software se debe distribuir bajo los mismos términos de la AGPL. Esto ayuda a garantizar que el software permanezca libre y accesible para la comunidad de desarrolladores y usuarios.

Es importante tener en cuenta que la AGPL se aplica solo a la distribución pública del software, y no a su uso privado. Por lo tanto, si utilizas la AGPL para tu aplicación web, solo aquellos usuarios que accedan a la aplicación web a través de una red tendrán derecho al acceso al código fuente.

En resumen, la Licencia Pública General de Affero (AGPL) es una licencia de software libre y de código abierto que se aplica no solo a la distribución del software, sino también a su uso en red, como una aplicación web. La AGPL garantiza que los usuarios que acceden al software a través de una red también tengan acceso al código fuente, y es una licencia copyleft que ayuda a garantizar que el software permanezca libre y accesible para la comunidad de desarrolladores y usuarios.






Para desarrollar nuestra aplicación para la protectora de animales hemos elegido utilizar el stack TALL. Este acrónimo hace referencia a las tecnologías que utilizaremos para crear nuestra aplicación, que son las siguientes:

T de Tailwind CSS: Utilizaremos este framework CSS para diseñar la interfaz de usuario de nuestra aplicación. Tailwind nos permite crear diseños de manera rápida y fácil, gracias a una serie de clases predefinidas que nos permiten construir componentes complejos con facilidad.

A de Alpine.js: Utilizaremos este framework JavaScript para agregar interactividad a nuestra aplicación. Alpine nos permite crear componentes interactivos sin la necesidad de escribir código JavaScript complejo, gracias a una sintaxis sencilla y fácil de aprender.

L de Laravel: Utilizaremos el framework PHP Laravel para desarrollar nuestra aplicación. Laravel es un framework moderno y potente que nos permite crear aplicaciones web de forma rápida y eficiente, con una sintaxis elegante y fácil de usar.

L de Livewire: Utilizaremos este framework de Laravel para agregar interactividad a nuestra aplicación sin tener que escribir código JavaScript. Livewire nos permite crear componentes de forma sencilla, utilizando PHP y Blade, lo que nos permite mantener un flujo de trabajo coherente y productivo.

El stack TALL nos permitirá desarrollar una aplicación web moderna y eficiente para la protectora de animales, utilizando herramientas y tecnologías de última generación que nos permiten crear una experiencia de usuario atractiva y fácil de usar.


## Diseño de la base de datos:

Para el desarrollo de la base de datos se ha estudiado el caso previamente, buscando las necesidades de la protectora. En este caso después del estudio se ha desarrollado la base de datos siguiente:

Nombre de tablas:
mascotas
imagenes_mascotas
historial_mascotas
directorio_contactos
personas
usuarios
contactos_formulario
donaciones
favoritos
visitas
adopciones
historial_adopciones
cuestionarios
casas_acogida


### Mascotas

Descripción: Es la tabla donde se va a almacenar toda la información de las mascotas de la protectora

Nombre de la tabla: “mascotas”

id: Identificador único de la mascota en la base de datos.
nombre: Nombre de la mascota.
especie: Especie de la mascota (por ejemplo, perro, gato, etc.).
raza: Raza de la mascota (si corresponde).
edad: Edad de la mascota.
sexo: Sexo de la mascota.
color: Color del pelaje de la mascota.
tamaño: Tamaño de la mascota (por ejemplo, pequeño, mediano, grande, etc.).
peso: Peso de la mascota.
estado: Estado actual de la mascota (por ejemplo, disponible, adoptado, en cuarentena, etc.).
fecha_ingreso: Fecha en que la mascota ingresó a la protectora.
fecha_adopcion: Fecha en que la mascota fue adoptada (si corresponde).
enfermedades: Enfermedades o condiciones médicas de la mascota (si corresponde).
medicamentos: Medicamentos que debe tomar la mascota (si corresponde).
observaciones: Observaciones generales acerca de la mascota. Por ejemplo, si es alérgica a ciertos alimentos, si tiene miedo de los niños pequeños, etc.
historia: Historia o antecedentes de la mascota (por ejemplo, si fue rescatada de la calle, entregada por su dueño anterior, etc.).
castrado: Indicador de si la mascota ha sido castrada o no.
id_casa_acogida: Casa de acogida donde se encuentre el animal, si es que está en una casa de acogida


### Imágenes de las mascotas

Descripción: Contiene las imágenes de las mascotas

Nombre de la tabla: imagenes_mascotas

id: Identificador único de la imagen.
id_mascota: Identificador de la mascota a la que pertenece la imagen.
nombre: Nombre descriptivo de la imagen.
url: Archivo de imagen (en formato binario o enlace a un archivo externo).
descripción: Descripción de la imagen (opcional).


### Historial de la mascota

Descripción: Se registran en esta tabla todo el historial referente a la mascota, como puede ser: su llegada, las visitas que ha tenido, adopción, transferencias a otros centros, fallecimientos, etc)

Nombre de la tabla: “historial_mascotas”

id: Identificador único del historial.
id_mascota: Identificador de la mascota a la que pertenece el historial
fecha: Fecha en que se registró el evento o la información.
tipo: Tipo de evento o información (llegada al refugio, visitas, adopción, transferencia, fallecimiento, etc.).
descripción: Descripción detallada del evento o la información.



### Directorios de contactos

Descripción: Se guarda en esta tabla la información de los contactos de la protectora, adoptantes, veterinarias, voluntarios, proveedores, etc..

Nombre de la tabla: “directorio_contactos”

id: Identificador único del contacto.
nombre: Nombre completo del contacto.
telefono: Número de teléfono del contacto.
email: Dirección de correo electrónico del contacto.
direccion: Dirección postal del contacto.
empresa: Nombre de la empresa o organización del contacto.
cargo: Cargo o posición del contacto en la empresa u organización.
notas: Notas adicionales sobre el contacto, como por ejemplo su fecha de cumpleaños o cualquier otra información relevante.
tipo: Clasificación del tipo de contacto (adoptante, veterinaria, voluntario, proveedor, organización, colaborador, otros).


### Personas

Descripción: Se guarda en esta tabla la información de todas las personas que actúan en la protectora. Los responsables, voluntarios, adoptantes, etc.

Nombre de la tabla: “personas”

id: Identificador único de la persona.
nombre: Nombre de la persona.
apellidos: Apellidos de la persona.
telefono: Número de teléfono de la persona.
fecha_nacimiento: Fecha de nacimiento de la persona.
direccion_calle: Dirección de la persona. (Calle de Guipúzcoa)
direccion_numero: Numero de la dirección de la persona (172)
direccion_detalles: Detalles de la dirección (2º 4º, ático, bajos 2º, etc..)
direccion_ciudad: Ciudad de residencia de la persona.
direccion_cp: Codigo postal de la dirección de la persona (08020)
tipo: Tipo de persona (voluntario, adoptante, colaborador, proveedor, etc.).
observaciones: Cualquier otra observación o información relevante sobre la persona.
ocupacion: Ocupación de la persona.
notas: Notas adicionales sobre la persona.


### Usuarios

Descripción: Se registra en esta tabla todos los usuarios del sistema

Nombre de la tabla: “usuarios”

id: Identificador único del usuario.
usuario: Nombre de usuario del usuario.
password: Contraseña del usuario.
correo_electronico: Correo electrónico del usuario.
avatar: URL de la imagen de perfil del usuario.
estado: Estado del usuario (activo, inactivo, suspendido, etc.).
id_rol: Identificador único del rol asignado al usuario.
id_persona: Identificador único de la persona asociada al usuario.


### Contactos Formulario

Descripción: Se registran todos los contactos recibidos a través de la “página de contacto”.

Nombre de la tabla: “contactos_formulario”

id: Identificador único del contacto en la base de datos.
id_usuario: Identificador único del usuario que ha realizado el formulario
nombre: Nombre del contacto.
email: Dirección de correo electrónico del contacto.
telefono: Número de teléfono del contacto.
asunto: Asunto del mensaje del contacto.
mensaje: Mensaje enviado por el contacto.
estado: Estado del mensaje (por ejemplo, sin leer, respondido, cerrado, etc.).


### Donaciones

Descripción: Se registran todas las donaciones realizadas al centro.

Nombre de la tabla: "donaciones"

id: Identificador único de la donación en la base de datos.
id_usuario: Identificador del donante que realizó la donación.
fecha: Fecha en que se realizó la donación.
valor: Valor de la donación recibida
tipo_donacion: Tipo de donación (dinero, alimentos, suministros, etc.).
descripcion: Descripción de la donación realizada.


### Favoritos

Descripción: Se registran todos las mascotas favoritas de los usuarios

Nombre de la tabla: “favoritos”

id: Identificador único del favorito.
id_usuario: Identificador del usuario que guarda el favorito.
id_mascota: Identificador de la mascota que se ha guardado como favorita.


### Visitas

Descripción: Se guardan todas las visitas realizadas a las mascotas.

Nombre de la tabla: "visitas"

id: identificador único de la visita.
fecha: fecha en la que se ha realizado la visita. Ya incluido en los timestamps.
id_mascota: identificador de la mascota visitada.
id_usuario_visitante: identificador del usuario que hizo la visita.
id_usuario_encargado: identificador del usuario encargado de atender la visita.
descripcion: descripción detallada de la visita o cualquier otra información relevante sobre ella.


### Adopciones

Descripción: Se guarda la información referente a la adopción en curso.

Nombre de la tabla: "adopciones"

id: identificador único de la adopción.
id_mascota: identificador de la mascota que ha sido adoptada.
id_usuario: identificador del usuario que ha adoptado a la mascota.
estado: estado actual de la adopción (por ejemplo: en proceso, finalizada, cancelada, etc.).
observaciones: para agregar comentarios adicionales sobre la adopción.
id_cuestionario: identificador del cuestionario realizado



### Historial del proceso de la adopción

Descripción: Se guarda toda la información del proceso de adopcion.

Nombre de la tabla: "historial_adopciones"

id: identificador único del proceso de adopción.
id_adopcion: identificador de la adopción a la que pertenece el proceso.
estado: estado del proceso realizado en la adopción (por ejemplo: inicio del seguimiento, entrevista, cuestionario, firma del contrato, pago de la tasa, fin del seguimiento).
actualizacion: para agregar comentarios adicionales sobre el proceso.
fecha: Ya incluido en los timestamps




### Cuestionarios: 

Descripción: Se guardan todos los cuestionarios de los adoptantes.

Nombre de la tabla: “cuestionarios”

id: identificador único del cuestionario.
fecha: fecha en la que se completa el cuestionario.
respuestas: respuestas del cuestionario en formato JSON
observaciones: espacio para añadir comentarios adicionales.


### Casas de acogida

Descripción: Se guarda los datos de las casas de acogida

Nombre de la tabla: “casas_acogida”

id: identificador único de la casa de acogida.
nombre: nombre de la casa de acogida.
responsable: nombre de la persona responsable de la casa de acogida.
direccion_calle: dirección de la casa de acogida.
direccion_numero: número de la calle de la dirección de la casa de acogida.
direccion_detalles: detalles de la dirección de la casa de acogida.
direccion_ciudad: ciudad de ubicación de la casa de acogida.
direccion_cp: código postal de la ubicación de la casa de acogida.
telefono: número de teléfono de contacto de la casa de acogida.
correo_electronico: correo electrónico de contacto de la casa de acogida.
capacidad: capacidad máxima de animales que pueden ser acogidos en la casa.
observaciones: espacio para añadir cualquier otra información relevante.


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

