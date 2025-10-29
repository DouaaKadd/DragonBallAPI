<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Models\Personaje;

class DragonController extends Controller
{
    // ✅ Vista principal: muestra personajes desde BD, y si no hay, los obtiene de la API
    public function index()
    {
        $personajes = Personaje::all();

        // Si la base de datos está vacía, obtener de la API y guardar
        if ($personajes->isEmpty()) {
            $respuesta = Http::withoutVerifying()->get('https://dragonball-api.com/api/characters?limit=40');

            if ($respuesta->failed()) {
                abort(500, 'Error al obtener datos de la API');
            }

            $datos = $respuesta->json()['items'];

            foreach ($datos as $p) {
                // Guardar cada personaje
                Personaje::create([
                    'nombre' => $p['name'],
                    'raza' => $p['race'] ?? 'Desconocida',
                    'ki' => $p['ki'] ?? 'N/A',
                    'imagen' => $p['image'] ?? '',
                ]);
            }

            // Recargar personajes desde la BD
            $personajes = Personaje::all();
        }

        return view('principal', compact('personajes'));
    }

    // ✅ Mostrar detalle de un personaje
    public function detalle($id)
    {
        $personaje = Personaje::find($id);

        if (!$personaje) {
            abort(404, 'Personaje no encontrado');
        }

        // Obtener información adicional de la API usando el nombre del personaje
        $infoAdicional = null;
        try {
            // Buscar el personaje completo en la API por nombre
            $respuesta = Http::withoutVerifying()->get('https://dragonball-api.com/api/characters?limit=100');
            
            if ($respuesta->successful()) {
                $personajesAPI = $respuesta->json()['items'] ?? [];
                
                // Buscar el personaje en la API que coincida con el nombre
                foreach ($personajesAPI as $p) {
                    if (isset($p['name']) && strtolower($p['name']) === strtolower($personaje->nombre)) {
                        $infoAdicional = $p;
                        break;
                    }
                }
            }
        } catch (\Exception $e) {
            // Si falla la API, continuamos solo con los datos de la BD
        }

        return view('detalle', compact('personaje', 'infoAdicional'));
    }
}
