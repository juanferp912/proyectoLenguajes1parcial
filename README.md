# 🏆 Proyecto de Predicciones - Mundial / Torneo Fútbol

Este proyecto es una aplicación web interactiva desarrollada en **Laravel** para la gestión de predicciones de partidos de fútbol (tipo Quiniela/Polla). Permite a los usuarios regulares registrar pronósticos para los partidos del torneo, y a los administradores gestionar los equipos, partidos y resultados.

---

## 👥 Integrantes y Roles del Proyecto

### 👨‍💻 Juan Fernando (juanferp912)
Se encargó de la configuración inicial, la lógica del backend, la seguridad y el diseño final de la interfaz:
* **Docker y Laravel**: Creó la estructura inicial del proyecto en Laravel y configuró la conexión con Docker para levantar la base de datos MySQL en red local.
* **Base de Datos**: Diseñó las tablas (equipos, partidos, predicciones) con sus respectivas llaves foráneas y eliminaciones en cascada.
* **Backend (CRUD)**: Programó los controladores que procesan las peticiones, guardan los datos y aplican las reglas (como el límite de 4 equipos por grupo).
* **Seguridad**: Configuró los Middlewares para proteger las rutas de la aplicación y organizó la fusión de código mediante Pull Requests.
* **Diseño UI**: Implementó el rediseño final del panel, cambiando las tablas viejas por tarjetas modernas con cápsulas para los marcadores.

### 👨‍💻 Anthony Julian (AnthonyMNJ)
Se encargó de armar todo el sistema de vistas desde cero y conectar los formularios del CRUD:
* **Plantillas Base**: Diseñó la plantilla maestra (layout base) en Blade para que todas las páginas del sitio web tengan la misma estructura y menús.
* **Vistas de Roles**: Creó las pantallas del panel dividiendo lo que ve el Administrador (gestión) de lo que ve el Usuario común (predicciones).
* **Formularios del CRUD**: Diseñó y conectó todos los formularios para ingresar, editar y eliminar datos, asegurando que se comuniquen con el backend.
* **Componentes de la App**: Armó los bloques visuales, la distribución de los botones de acción rápida y la organización inicial de los grupos.

---

## 🛠️ Requisitos Previos

Antes de instalar el proyecto, asegúrate de contar con:
* **PHP** (versión 8.2 o superior)
* **Composer**
* **Node.js** (v18+) y **NPM**
* **SQLite** (por defecto configurado localmente) o **MySQL/Docker**

---

## 🚀 Instrucciones de Instalación y Ejecución

Sigue estos pasos detallados para configurar el proyecto localmente:

### 1. Clonar e Instalar Dependencias
Clona el repositorio en tu máquina local e instala las dependencias de PHP y JavaScript:
```bash
composer install
npm install
```

### 2. Configurar Archivo de Entorno `.env`
Duplica el archivo de configuración de ejemplo:
* **Linux/macOS:**
  ```bash
  cp .env.example .env
  ```
* **Windows (PowerShell):**
  ```powershell
  copy .env.example .env
  ```

### 3. Generar la Clave de Aplicación
```bash
php artisan key:generate
```

### 4. Configurar la Base de Datos
Por defecto, el proyecto está configurado para utilizar **SQLite**.
Asegúrate de que tu archivo `.env` tenga las siguientes líneas:
```env
DB_CONNECTION=sqlite
# Si utilizas SQLite, el motor buscará automáticamente el archivo database/database.sqlite
```

### 5. Correr Migraciones y Alimentar la Base de Datos (Seeders)
Ejecuta las migraciones para crear la estructura de tablas y cargar los usuarios iniciales de prueba:
```bash
php artisan migrate --seed
```

### 6. Compilar Recursos Frontend
Genera el paquete de assets css y js compilado:
```bash
npm run build
```

### 7. Levantar el Servidor de Desarrollo
```bash
php artisan serve
```
Accede a la aplicación ingresando a [http://127.0.0.1:8000](http://127.0.0.1:8000) en tu navegador.

---

## 🔑 Credenciales de Acceso de Prueba

El sistema inicializa automáticamente dos perfiles gracias a los seeders:

* **Administrador:**
  * **Email:** `admin@mundial.com`
  * **Contraseña:** `123456`
* **Usuario Regular:**
  * **Email:** `user@mundial.com`
  * **Contraseña:** `123456`


