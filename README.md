# ApiTp

Aplicación web en **Laravel 11** que consume el API de [mayten.cloud](https://mayten.cloud): se autentica para obtener un token y muestra listados de campañas, correos y links acortados con sus clicks.

## Requisitos

- PHP >= 8.2
- [Composer](https://getcomposer.org/)
- Node.js y npm (para los assets con Vite)
- Credenciales de acceso al API de Mayten

## Instalación

```bash
# 1. Clonar e instalar dependencias
git clone https://github.com/felipemiguelsainz/apitp.git
cd apitp
composer install
npm install

# 2. Configurar el entorno
cp .env.example .env
php artisan key:generate

# 3. Crear la base de datos SQLite y correr migraciones
touch database/database.sqlite
php artisan migrate
```

### Variables de entorno

Completá las credenciales del API en el archivo `.env`:

```dotenv
MAYTEN_BASE_URL=https://mayten.cloud
MAYTEN_USERNAME=tu_usuario
MAYTEN_PASSWORD=tu_password
```

> El `.env` no se versiona. Usá `.env.example` como plantilla.

## Ejecución

```bash
# Servidor de desarrollo
php artisan serve

# En otra terminal, compilar assets
npm run dev
```

La app queda disponible en `http://localhost:8000`.

## Rutas

| Método | URI                      | Acción                  | Descripción                                       |
| ------ | ------------------------ | ----------------------- | ------------------------------------------------- |
| GET    | `/`                      | `home`                  | Página de inicio con los accesos                  |
| GET    | `/getlist/{modalidad}`   | `ApiController@getList` | Lista campañas por modalidad (`EMAIL`, `SMS_CORTO`, `IVR`) |
| GET    | `/getmails`              | `ApiController@getMails`| Lista los correos creados con su ID               |
| GET    | `/linkshort`             | `ApiController@linkShort`| Lista los links acortados y la cantidad de clicks |

## Cómo funciona

`ApiController` maneja la integración con Mayten:

1. **Autenticación** — `getAccessToken()` pide un token con las credenciales de `config/services.php` (leídas del `.env`) y lo guarda en sesión, reutilizándolo en las siguientes peticiones.
2. **Peticiones autenticadas** — `authorizedGet()` agrega el token como `Bearer` y consulta los endpoints del API.
3. **Vistas** — los datos se renderizan con Blade (`resources/views/Contents/`). Si el API falla o no hay datos, se muestra un mensaje en lugar de romper la página.

## Stack

- Laravel 11 · PHP 8.2
- Blade + Bootstrap 5.3
- Vite
- SQLite

## Tests

```bash
php artisan test
```
