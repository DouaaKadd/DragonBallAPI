# 📦 Guía para Subir el Proyecto a GitHub

## Paso 1: Crear el Repositorio en GitHub

1. Ve a https://github.com y loguéate
2. Haz clic en el botón **"+"** (arriba a la derecha) → **"New repository"**
3. Nombre del repositorio: `dragonball` (o el que prefieras)
4. **IMPORTANTE**: NO marques ninguna opción (README, .gitignore, license)
5. Haz clic en **"Create repository"**

GitHub te mostrará instrucciones. **No las sigas todavía**, primero necesitamos preparar el proyecto localmente.

## Paso 2: Preparar el Proyecto Local

### 2.1 Crear el archivo .env.example

Crea manualmente el archivo `.env.example` en la raíz del proyecto con este contenido:

```env
APP_NAME=DragonBall
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_URL=http://localhost:8000

APP_LOCALE=es
APP_FALLBACK_LOCALE=es
APP_FAKER_LOCALE=es_ES

APP_MAINTENANCE_DRIVER=file
APP_MAINTENANCE_STORE=database

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
CACHE_PREFIX=

MAIL_MAILER=log
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

VITE_APP_NAME="${APP_NAME}"
```

### 2.2 Verificar que database.sqlite puede subirse (opcional para producción)

Si quieres incluir la base de datos vacía en el repo (para que Laravel Cloud la use):
- Asegúrate de que `database/database.sqlite` esté vacía o tenga solo la estructura
- Si está en `.gitignore`, elimínala temporalmente de ahí

**Nota**: Normalmente `database.sqlite` está en `.gitignore`, pero para esta actividad práctica puedes subirlo vacío si lo necesitas para Laravel Cloud.

## Paso 3: Inicializar Git (si aún no está hecho)

Si el proyecto no tiene git inicializado:

```bash
git init
```

## Paso 4: Agregar todos los archivos

```bash
git add .
```

## Paso 5: Hacer el commit inicial

```bash
git commit -m "Initial commit: Proyecto DragonBall con Laravel"
```

## Paso 6: Renombrar la rama a 'main'

```bash
git branch -M main
```

## Paso 7: Conectar con el repositorio remoto de GitHub

Reemplaza `TU_USUARIO` con tu nombre de usuario de GitHub:

```bash
git remote add origin https://github.com/TU_USUARIO/dragonball.git
```

**Ejemplo**: Si tu usuario es `dkadd`, sería:
```bash
git remote add origin https://github.com/dkadd/dragonball.git
```

## Paso 8: Subir el código a GitHub

```bash
git push -u origin main
```

**Nota sobre autenticación**:
- Si es tu primer push, GitHub te pedirá autenticarte
- Opciones:
  - **Personal Access Token (PAT)**: Ve a Settings → Developer settings → Personal access tokens → Tokens (classic) → Generate new token
  - **SSH Key**: Si tienes configurada una clave SSH
  - **GitHub Desktop**: Usa la aplicación de escritorio
  - **VS Code**: VS Code tiene integración con GitHub incorporada

## ✅ Verificación

Después del push, ve a tu repositorio en GitHub y verifica que todos los archivos estén ahí:
- `app/`
- `database/`
- `resources/`
- `routes/`
- `composer.json`
- `README.md`
- etc.

## 🚨 Si tienes problemas

### Error: "remote origin already exists"
```bash
git remote remove origin
git remote add origin https://github.com/TU_USUARIO/dragonball.git
```

### Error: "Permission denied"
- Verifica que el URL del repositorio sea correcto
- Verifica que tengas permisos de escritura en el repositorio
- Intenta usar un Personal Access Token

### Error: "failed to push some refs"
```bash
git pull origin main --allow-unrelated-histories
git push -u origin main
```

## 📝 Próximos Pasos

Una vez subido a GitHub:
1. ✅ Configurar CI/CD con GitHub Actions
2. ✅ Conectar con Laravel Cloud
3. ✅ Desplegar la aplicación

