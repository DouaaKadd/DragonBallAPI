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
            }
        }
    }
}
