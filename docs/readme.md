
## Descripción de la base de datos

# ################################################################################### #

Mascotas

+-----------------+---------------+---------------------------------------------------+
| Campo           | Tipo          | Descripción                                       |
+-----------------+---------------+---------------------------------------------------+
| id_mascota      | integer       | Identificador único de la mascota                 |
| nombre          | string (50)   | Nombre de la mascota                              |
| especie         | string (20)   | Especie de la mascota (perro, gato, etc.)         |
| raza            | string (50)   | Raza de la mascota                                |
| edad            | integer       | Edad de la mascota en años                        |
| sexo            | character     | Sexo de la mascota (M: macho, H: hembra)          |
| color           | string (20)   | Color del pelaje de la mascota                    |
| tamaño          | string (20)   | Tamaño de la mascota (pequeño, mediano, grande)   |
| peso            | decimal(4,2)  | Peso actual de la mascota                         |
| estado          | string (20)   | Estado actual de la mascota (disponible, adoptado)|
| fecha_ingreso   | date          | Fecha de ingreso a la protectora                  |
| fecha_adopción  | date          | Fecha de adopción (si corresponde)                |
| enfermedades    | string (255)  | Enfermedades o condiciones médicas de la mascota  |
| medicamentos    | string (255)  | Medicamentos que debe tomar la mascota            |
| observaciones   | text          | Observaciones generales acerca de la mascota      |
| historia        | text          | Antecedentes de la mascota                        |
| castrado        | boolean       | ¿Ha sido castrada la mascota?                     |
+-----------------+---------------+---------------------------------------------------+

# ################################################################################### #

imagenes_mascotas

+-----------------+---------------+---------------------------------------------------+
| Campo           | Tipo          | Descripción                                       |
+-----------------+---------------+---------------------------------------------------+
| id_imagen       | integer       | Identificador único de la imagen                  |
| id_mascota      | integer       | Identificador mascota a la que pertenece la imagen|
| nombre          | string (50)   | Nombre descriptivo de la imagen                   |
| url             | varchar(255)  | Ruta al archivo de la imagen                      |
| fecha_subida    | date          | Fecha en que se subió la imagen a la base de datos|
| descripcion     | text          | Descripción de la imagen (opcional)               |
+-----------------+---------------+---------------------------------------------------+

# ################################################################################### #

historial_mascotas

+---------------+---------------+-----------------------------------------------------+
| Campo         | Tipo          | Descripción                                         |
+---------------+---------------+-----------------------------------------------------+
| id_historial  | integer       | Identificador único del historial                   |
| id_mascota    | integer       | Identificador de la mascota a la que pertenece      |
| fecha         | date          | Fecha en que se registró el evento o la info.       |
| tipo          | string (50)   | Tipo de evento o información                        |
| descripción   | text          | Descripción detallada del evento o la información   |
+-----------------+---------------+---------------------------------------------------+

# ################################################################################### #

directorio_contactos

+---------------+---------------+-----------------------------------------------------+
| Campo         | Tipo          | Descripción                                         |
+---------------+---------------+-----------------------------------------------------+
| id_contacto   | integer       | Identificador único del contacto                    |
| nombre        | string(100)   | Nombre completo del contacto                        |
| telefono      | string(20)    | Número de teléfono del contacto                     |
| email         | string(100)   | Dirección de correo electrónico del contacto        |
| direccion     | text          | Dirección postal del contacto                       |
| empresa       | string(100)   | Nombre de la empresa u organización del contacto    |
| cargo         | string(50)    | Cargo o posición del contacto                       |
| notas         | text          | Notas adicionales sobre el contacto                 |
| tipo          | string(50)    | Clasificación del tipo de contacto                  |
+---------------+---------------+-----------------------------------------------------+


# ################################################################################### #

personas

+-------------------+---------------+-------------------------------------------------+
| Campo             | Tipo          | Descripción                                     |
+-------------------+---------------+-------------------------------------------------+
| id_persona        | integer       | Identificador único de la persona               |
| nombre            | string(100)   | Nombre completo de la persona                   |
| telefono          | string(20)    | Número de teléfono de la persona                |
| fecha_nacimiento  | date          | Fecha de nacimiento de la persona.              |
| direccion         | text          | Dirección postal de la persona                  |
| direccion_detalles| string(50)    | Detalles de la dirección (2º 4º, etc..)         |
| ciudad            | string(50)    | Ciudad de residencia de la persona.             |
| codigo_postal     | string(10)    | Código postal de la persona.                    |
| tipo              | string(50)    | Tipo de persona (voluntario, adoptante, etc.).  |
| observaciones     | text          | Cualquier otra observación                      |
| ocupacion         | string(50)    | Ocupación de la persona.                        |
| notas             | text          | Notas adicionales sobre la persona.             |
+-------------------+---------------+-------------------------------------------------+


# ################################################################################### #

usuarios

+-------------------+---------------+-------------------------------------------------+
| Campo             | Tipo          | Descripción                                     |
+-------------------+---------------+-------------------------------------------------+
| id_usuario        | integer       | Identificador único del usuario                 |
| nombre_usuario    | string(50)    | Nombre de usuario del usuario                   |
| password          | string(255)   | Contraseña del usuario                          |
| correo_electronico| string(100)   | Correo electrónico del usuario                  |
| avatar            | varchar(255)  | URL de la imagen de perfil del usuario          |
| estado            | boolean       | Estado del usuario (activo o inactivo)          |
| rol               | string(20)    | Rol o nivel de acceso del usuario               |
| id_persona        | integer       | Identificador de la persona asociada al usuario |
+-------------------+---------------+-------------------------------------------------+

# ################################################################################### #

contactos_formulario

+-------------------+---------------+-------------------------------------------------+
| Campo             | Tipo          | Descripción                                     |
|-------------------|---------------|-------------------------------------------------|
| id_contacto       | integer       | Identificador único del contacto                |
| nombre            | string(100)   | Nombre del contacto                             |
| email             | string(100)   | Dirección de correo electrónico del contacto    |
| telefono          | string(20)    | Número de teléfono del contacto                 |
| asunto            | text          | Asunto del mensaje del contacto                 |
| mensaje           | text          | Mensaje enviado por el contacto                 |
| fecha             | datetime      | Fecha y hora en que se recibió el mensaje       |
| estado            | string(20)    | Estado del mensaje                              |
+-------------------+---------------+-------------------------------------------------+

# ################################################################################### #

donaciones:

+-------------------+---------------+-------------------------------------------------+
| Campo             | Tipo          | Descripción                                     |
|-------------------|---------------|-------------------------------------------------|
| id_donacion       | integer       | Identificador único de la donación              |
| id_usuario        | integer       | Identificador del usuario que hizo la donación  |
| fecha             | date          | Fecha en que se realizó la donación.            |
| valor             | decimal(10,2) | Valor de la donación recibida                   |
| tipo              | string(50)    | Tipo de donación                                |
| descripcion       | text          | Descripción de la donación realizada.           |
+-------------------+---------------+-------------------------------------------------+

# ################################################################################### #

favoritos:

+-------------------+---------------+-------------------------------------------------+
+-------------------+---------------+-------------------------------------------------+
| Campo             | Tipo          | Descripción                                     |
+-------------------+---------------+-------------------------------------------------+
| id_favorito       | integer       | Identificador único del favorito                |
| id_usuario        | integer       | Identificador del usuario                       |
| id_mascota        | integer       | Identificador de la mascota.                    |
+-------------------+---------------+-------------------------------------------------+

# ################################################################################### #

Visitas

+----------------------+----------+---------------------------------------------------+
| Campo                | Tipo     | Descripción                                       |
|----------------------|----------|---------------------------------------------------|
| id_visita            | integer  | Identificador único de la visita                  |
| fecha                | date     | Fecha en la que se ha realizado la visita         |
| id_mascota           | integer  | Identificador de la mascota visitada              |
| id_usuario_visitante | integer  | Identificador del usuario que hizo la visita      |
| id_usuario_encargado | integer  | Identificador del usuario                         |
| descripcion          | text     | Descripción detallada de la visita                |
+----------------------+----------+---------------------------------------------------+

# ################################################################################### #

seguimientos:

+----------------+---------------+----------------------------------------------------+
| Campo          | Tipo          | Descripción                                        |
|----------------|---------------|----------------------------------------------------|
| id_seguimiento | integer       | Identificador único del seguimiento.               |
| id_mascota     | integer       | Identificador de la mascota.                       |
| id_usuario     | integer       | Identificador del usuario.                         |
| fecha          | date          | Fecha en la que se realiza el seguimiento.         |
| estado         | string(50)    | Estado actual de la adopción.                      |
| observaciones  | text          | Comentarios adicionales sobre el seguimiento.      |
+----------------+---------------+----------------------------------------------------+

# ################################################################################### #

adopciones

+-------------------+---------------+-------------------------------------------------+
| Campo                 | Tipo      | Descripción                                     |
|-----------------------|-----------|-------------------------------------------------|
| id_adopcion           | integer   | Identificador único de la adopción              |
| id_mascota            | integer   | Identificador de la mascota                     |
| id_persona            | integer   | Identificador de la persona                     |
| estado_adopcion       | string(30)| Estado actual de la adopción                    |
| observaciones         | text      | Comentarios adicionales                         |
| id_seguimiento        | integer   | Identificador del seguimiento                   |
| id_cuestionario       | integer   | Identificador del cuestionario                  |
+-------------------+---------------+-------------------------------------------------+

# ################################################################################### #

procesos_adopciones

+-------------------+---------------+-------------------------------------------------+
| Campo             | Tipo          | Descripción                                     |
|-------------------|---------------|-------------------------------------------------|
| id_proceso        | integer       | Identificador único del proceso de adopción     |
| id_adopcion       | integer       | Identificador de la adopción                    |
| tipo              | string(50)    | Tipo de proceso realizado en la adopción        |
| observaciones     | text          | Observaciones o comentarios adicionales         |
+-------------------+---------------+-------------------------------------------------+

# ################################################################################### #

cuestionarios

+-------------------+---------------+-------------------------------------------------+
| Campo             | Tipo          | Descripción                                     |
|-------------------|---------------|-------------------------------------------------|
| id_cuestionario   | integer       | Identificador único del cuestionario            |
| fecha             | date          | Fecha en la que se completa el cuestionario     |
| respuesta_1       | string(255)   | Respuesta a la primera pregunta del cuestionario|
| respuesta_2       | string(255)   | Respuesta a la segunda pregunta del cuestionario|
| respuesta_3       | string(255)   | Respuesta a la tercera pregunta del cuestionario|
| respuesta_4       | string(255)   | Respuesta a la cuarta pregunta del cuestionario |
| respuesta_5       | string(255)   | Respuesta a la quinta pregunta del cuestionario |
| observaciones     | text          | Espacio para añadir comentarios adicionales     |
+-------------------+---------------+-------------------------------------------------+

# ################################################################################### #

casas_acogida
+--------------------+---------------+------------------------------------------------+
| Campo              | Tipo          | Descripción                                    |
|--------------------|---------------|------------------------------------------------|
| id_casa            | integer       | Identificador único de la casa de acogida      |
| nombre             | string(100)   | Nombre de la casa de acogida                   |
| direccion          | string(200)   | Dirección de la casa de acogida                |
| ciudad             | string(50)    | Ciudad de ubicación de la casa de acogida      |
| telefono           | string(20)    | Número de teléfono de contacto                 |
| correo_electronico | string(100)   | Correo electrónico de contacto                 |
| responsable        | string(100)   | Nombre de la persona responsable               |
| capacidad          | integer       | Capacidad máxima de animales                   |
| observaciones      | text          | Cualquier otra información relevante           |
+--------------------+---------------+------------------------------------------------+

# ################################################################################### #







