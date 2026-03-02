<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageReceived;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function send(Request $request) {
        $data = [
            'name' => $request->data['name'],
            'email' => $request->data['email'],
            'cellphone' => $request->data['cellphone'],
            'message' => $request->data['message']
        ];

        Mail::to(env('MAIN_EMAIL'))->queue(new MessageReceived($data));

        $response = [
            'status' => 'Success',
            'code' => 200,
            'message' => '¡Se envio el mensaje correctamente!'
        ];

        return response()->json($response);
    }
}
