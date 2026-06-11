<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    /**
     * Obtiene un token de acceso y lo guarda en la sesión.
     * Reutiliza el token existente si ya hay uno almacenado.
     */
    private function getAccessToken(): ?string
    {
        if ($token = session('accessToken')) {
            return $token;
        }

        $response = Http::post(config('services.mayten.base_url') . '/auth', [
            'username' => config('services.mayten.username'),
            'password' => config('services.mayten.password'),
        ]);

        if (! $response->successful()) {
            Log::error('Error autenticando contra Mayten', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return null;
        }

        $token = $response->json('token');
        session(['accessToken' => $token]);

        return $token;
    }

    /**
     * Realiza una petición GET autenticada al API de Mayten.
     */
    private function authorizedGet(string $path): ?array
    {
        $token = $this->getAccessToken();

        if (! $token) {
            return null;
        }

        $response = Http::withToken($token)
            ->get(config('services.mayten.base_url') . $path);

        if (! $response->successful()) {
            Log::error('Error consultando el API de Mayten', [
                'path' => $path,
                'status' => $response->status(),
            ]);

            return null;
        }

        return $response->json();
    }

    public function getList(string $modalidad)
    {
        $getListJson = $this->authorizedGet('/api/Mensajes/Campañas/' . $modalidad) ?? [];

        return view('Contents.getlist', compact('getListJson', 'modalidad'));
    }

    public function getMails()
    {
        $getEmailsJson = $this->authorizedGet('/api/Mails') ?? [];

        return view('Contents.getmails', compact('getEmailsJson'));
    }

    public function linkShort()
    {
        $linkShortJson = $this->authorizedGet('/api/BaseContactos/ExportDataClicks') ?? [];

        return view('Contents.linkshort', compact('linkShortJson'));
    }
}
