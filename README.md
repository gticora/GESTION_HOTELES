# Vue & Laravel Hotel Management

Aplicación de gestión de hoteles con un frontend en Vue.js y un backend en Laravel.

## Estructura del Proyecto

Este proyecto está dividido en dos partes principales:

- **Frontend (Vue.js)** @vue/cli 5.0.8: En el directorio `vue-hotel-frontend/`.
- **Backend (Laravel API)** Laravel Framework 10.48.22: En el directorio `laravel-backend/`.

El frontend está desarrollado con Vue.js, mientras que el backend está construido como una API RESTful con Laravel.

## Requisitos

### Para el frontend (Vue.js)

- Node.js (preferentemente la versión LTS).
- NPM (Node Package Manager).

### Para el backend (Laravel)

- PHP >= 8.0.
- Composer (gestor de dependencias de PHP).
- MySQL o cualquier base de datos compatible con Laravel.

## Configuración y Ejecución

### 1. Configuración del Backend (Laravel)

Para configurar el backend, sigue los siguientes pasos:

1. **Clonar el repositorio del backend**:
    ```bash
    git clone <URL_DEL_REPOSITORIO_LARAVEL> laravel-backend
    ```

2. **Instalar las dependencias**:
    ```bash
    composer install
    ```

3. **Configurar el archivo `.env`** con las credenciales de la base de datos:
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nombre_de_tu_base_de_datos
    DB_USERNAME=tu_usuario
    DB_PASSWORD=tu_contraseña
    ```

4. **Generar la clave de la aplicación**:
    ```bash
    php artisan key:generate
    ```

5. **Ejecutar migraciones**:
    ```bash
    php artisan migrate
    ```
5. **Ejecutar seeders**:
    ```bash
    php artisan db:seed
    ```

6. **Levantar el servidor de desarrollo**:
    ```bash
    php artisan serve
    ```

### 2. Configuración del Frontend (Vue.js)

Para configurar el frontend, sigue los siguientes pasos:

1. **Clonar el repositorio del frontend**:
    ```bash
    git clone <URL_DEL_REPOSITORIO_VUE> vue-hotel-frontend
    ```

2. **Instalar las dependencias**:
    ```bash
    npm install
    ```

3. **Configurar la URL base de la API** en `src/apiClient.js`:
    ```javascript
    const apiClient = axios.create({
        baseURL: 'http://127.0.0.1:8000/api',
        timeout: 1000,
    });
    ```

4. **Levantar el servidor de desarrollo**:
    ```bash
    npm run serve
    ```

### 3. Interacción entre Frontend y Backend

El frontend de Vue.js se comunica con el backend de Laravel a través de peticiones HTTP. Las rutas de la API se encuentran en `routes/api.php` del backend de Laravel.
```php
Route::get('hoteles', 'HotelController@index');
Route::get('habitaciones/hotel/{id}', 'HabitacionController@show');
Route::delete('hoteles/{id}', 'HotelController@destroy');
```

![image](https://github.com/user-attachments/assets/6537f2c1-0ec8-4854-b788-78b2af8e167f)

![image](https://github.com/user-attachments/assets/4efd34c9-b0e6-4e16-9482-b7c4b655944b)



