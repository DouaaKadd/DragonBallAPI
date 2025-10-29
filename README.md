# DragonBall - Laravel Project

Aplicación web desarrollada con Laravel para mostrar personajes de Dragon Ball obtenidos desde una API externa.

## 🎯 Características

- Visualización de personajes de Dragon Ball
- Detalles completos de cada personaje
- Base de datos SQLite para almacenamiento local
- Integración con API externa (DragonBall API)
- Diseño responsive con Bootstrap

## 🚀 Tecnologías

- **Laravel 12**
- **PHP 8.2+**
- **SQLite**
- **Bootstrap 5**
- **Vite** (para assets)

## 📋 Requisitos Previos

- PHP >= 8.2
- Composer
- Node.js y npm
- SQLite

## 🔧 Instalación Local

1. Clonar el repositorio:
```bash
git clone https://github.com/TU_USUARIO/dragonball.git
cd dragonball
```

2. Instalar dependencias de PHP:
```bash
composer install
```

3. Instalar dependencias de Node.js:
```bash
npm install
```

4. Configurar el archivo de entorno:
```bash
cp .env.example .env
php artisan key:generate
```

5. Crear la base de datos SQLite:
```bash
touch database/database.sqlite
```

6. Ejecutar migraciones:
```bash
php artisan migrate
```

7. Compilar assets:
```bash
npm run build
```

8. Iniciar el servidor de desarrollo:
```bash
php artisan serve
```

Visita: http://localhost:8000

## 🧪 Tests

Ejecutar los tests:
```bash
composer test
```

## 📦 Despliegue

Este proyecto está configurado para despliegue automático en Laravel Cloud mediante CI/CD.

### Variables de Entorno Requeridas

- `APP_ENV=production`
- `APP_KEY` (generado automáticamente)
- `APP_URL` (URL de producción)
- `DB_CONNECTION=sqlite`
- `DB_DATABASE=/app/database/database.sqlite`

## 📝 Estructura del Proyecto

```
app/
├── Http/Controllers/
│   └── DragonController.php
└── Models/
    └── Personaje.php

database/
├── migrations/
│   └── create_personajes_table.php
└── database.sqlite

resources/
└── views/
    ├── principal.blade.php
    └── detalle.blade.php
```

## 🔄 CI/CD

El proyecto incluye integración continua mediante GitHub Actions que:
- Ejecuta tests automáticamente
- Verifica la calidad del código
- Compila assets
- Prepara el proyecto para despliegue

## 📄 Licencia

MIT License
