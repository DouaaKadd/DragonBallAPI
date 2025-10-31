<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Crear database.sqlite automáticamente si no existe (para producción en Laravel Cloud)
        if (config('database.default') === 'sqlite') {
            $databasePath = config('database.connections.sqlite.database');
            
            if ($databasePath && !file_exists($databasePath)) {
                // Asegurar que el directorio existe
                $directory = dirname($databasePath);
                if (!File::isDirectory($directory)) {
                    File::makeDirectory($directory, 0755, true);
                }
                
                // Crear el archivo SQLite vacío
                File::put($databasePath, '');
                
                // Dar permisos de escritura
                chmod($databasePath, 0666);
                
                // Ejecutar migraciones automáticamente si estamos en producción
                if (app()->environment('production')) {
                    try {
                        \Artisan::call('migrate', ['--force' => true]);
                    } catch (\Exception $e) {
                        // Silenciar errores de migración en el boot
                        // Las migraciones se ejecutarán en el build command
                    }
                }
            } else {
                // Si el archivo existe, verificar que la tabla tenga todas las columnas necesarias
                try {
                    $connection = \DB::connection();
                    if ($connection->getSchemaBuilder()->hasTable('personajes')) {
                        // Verificar si falta la columna 'nombre'
                        if (!$connection->getSchemaBuilder()->hasColumn('personajes', 'nombre')) {
                            // La tabla existe pero le falta la columna, recrear con migrate:fresh
                            \Artisan::call('migrate:fresh', ['--force' => true]);
                        }
                    } else {
                        // La tabla no existe, ejecutar migraciones
                        \Artisan::call('migrate', ['--force' => true]);
                    }
                } catch (\Exception $e) {
                    // Si hay algún error, intentar migrate:fresh para empezar de cero
                    try {
                        \Artisan::call('migrate:fresh', ['--force' => true]);
                    } catch (\Exception $e2) {
                        // Silenciar errores
                    }
                }
            }
        }
    }
}
