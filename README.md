<p align="center">
  <a href="https://github.com/AlejandroMBP" target="_blank">
    <img src="https://avatars.githubusercontent.com/u/155660138?s=400&u=9b6d536e9f012ef961054861ecae72c6ff13bace&v=4" width="150" alt="AlejandroMBP" style="border-radius: 50%; box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);">
  </a>
</p>

<h1 align="center">🚀 Proyecto Laravel 10</h1>

<p align="center">
  <strong>Un proyecto desarrollado con Laravel 10</strong>
</p>

---

## 🌟 Requisitos

- PHP >= 8.2
- Composer

## 🛠️ Instalación

Sigue estos pasos para ejecutar el proyecto:

1. **Clona el repositorio:**
   <pre style="color: #4CAF50;">
   git clone https://github.com/AlejandroMBP/tesoreria.git
   o
   git clone git@github.com:AlejandroMBP/tesoreria.git
   cd tesoreria
   </pre>

2. **Instala las dependencias:**
   <pre style="color: #2196F3;">
   composer install
   </pre>

3. **Configura el archivo `.env`:**
   <pre style="color: #FF9800;">
   cp .env.example .env
   </pre>

4. **Genera la clave de aplicación:**
   <pre style="color: #9C27B0;">
   php artisan key:generate
   </pre>
   
4. **Instalacion de spatie:**
    <pre style="color: #9C27B0;">
    composer require spatie/laravel-permission
    </pre>
    
5. **publicar las migraciones:**
    <pre style="color: #FF5722;">
   php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
    </pre>
    
7. **Ejecuta las migraciones (si es necesario):**
   <pre style="color: #FF5722;">
   php artisan migrate
   </pre>
   
8. **Ejecuta los seeders**
   <pre style="color: #FF5722;">
       php artisan db:seed
   </pre>
9. **Inicia el servidor local:**
   <pre style="color: #3F51B5;">
   php artisan serve
   </pre>

---

## 🎉 ¡Listo!

Ahora deberías poder acceder a tu aplicación en `http://localhost:8000`.

## 📚 Más información

Para más detalles sobre cómo utilizar Laravel, consulta la [documentación oficial](https://laravel.com/docs).

---

<p align="center">
  <i>¡Disfruta desarrollando con Laravel!</i>
</p>
