<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ApiController extends Controller
{
    public function calltp(){
        $response = Http::post('https://mayten.cloud/auth', [
            'username'=> 'rym2020',
            'password' => 'recupero2020',
            //envia el user y el password para obtener el token
        ]);
        if ($response->successful()) {
            $responseData = $response->json();
            $token = $responseData['token'];//guarda el token en la session
            session(['accessToken' => $token]);
        } else {
            //handle error
            $errorCode = $response->status();
            $errorMessage = $response->body();
        };
    }
    public function getList($modalidad){
        $this->calltp();
        $accessToken = session('accessToken');//obtiene el access token de la sesion
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get('https://mayten.cloud/api/Mensajes/Campañas/' . $modalidad);//obtiene las campanas segun modalidad en parametro
        $getListJson = $response->json();
        return view('Contents.getlist', compact('getListJson', 'modalidad'));
    }

    public function getMails(){
        $this->calltp();
        $accessToken = session('accessToken');//obtiene el access token de la sesion
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get('https://mayten.cloud/api/Mails');//obtener el listado de correos creados junto con sus ID.
        $getEmailsJson = $response->json();
        dd($getEmailsJson); 
        return view('Contents.getmails', compact('getEmailsJson'));
    }
    public function linkShort(){
        $this->calltp();
        $accessToken = session('accessToken');//obtiene el access token de la sesion
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get('https://mayten.cloud/api/BaseContactos/ExportDataClicks');//obtener el listado de correos creados junto con sus ID.
        $linkShortJson = $response->json();
        return view('Contents.linkshort', compact('linkShortJson'));
    }
}
