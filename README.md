## CRM de gestión de escuelasd

Este proyecto es un CRM desarrollado en Laravel para administrar escuelas y sus alumnos, que fue desarrollado para realizar la prueba tecnica en Technodac. Este CRM permite gestionar la información de las escuelas y los estudiantes mediante un panel de administración con funcionalidades CRUD.


#### Características

- **Gestión de escuelas** con los siguientes campos:
  - Nombre (requerido)
  - Dirección (requerido)
  - Logotipo (minimo 200x200 y no más de 2MB)
  - Correo electrónico
  - Teléfono
  - Página web

- **Gestión de alumnos** con los siguientes campos:
  - Nomnre (requerido)
  - Apellidos (requerido)
  - Escuela (relación foránea con escuela)
  - Fecha de nacimiento (requerido)
  - Ciudad Natal

- **Funcionalidades clave:**
  - Implementación de migraciones y seeds  para la creación de la base de datos.
  - Uso de Resource Controllers para la gestión CRUD de escuelas y alumnos.
  - Paginación para mostrar las listas de ambos modelos.
  - Almacenamiento público de los logotipos de las escuelas.

## Comandos para hacer funcionar el proyecto

```bash
cd crm-school-management
```

```bash
php artisan storage:link 
```

```bash 
php artisan migrate
```

```bash 
php artisan db:seed
```

```bash
php artisan serve
```

* **`php arisan storage:link`:** Para poder guardar las fotos de manera publica

* **`php artisan migrate`:** Sirve para crear la estructura de la BBDD (en el caso de que no la tengas instalada, indica [yes])

* **`php artisan db:seed`:** Se utiliza para crear los datos de prueba

* **`php artisan serve`** Se utiliza para inicializar el proyecto.
