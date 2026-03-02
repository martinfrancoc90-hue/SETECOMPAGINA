<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageReceived;
// use App\Models\Item;

class ContactController extends Controller
{
    public function send(Request $request) {

        // $message = $request->all();

        $data = [
            'name' => $request->data['name'],
            'email' => $request->data['email'],
            'cellphone' => $request->data['cellphone'],
            'message' => $request->data['message']
        ];

        // Mail::to('jbolivar@setecomair.com.pe')->queue(new MessageReceived($message));

        Mail::to('david14847@gmail.com')->send(new MessageReceived($data));

        $response = [
            'status' => 'Success',
            'code' => 200,
            'message' => '¡Se envio el mensaje correctamente!'
        ];

        return response()->json($response);
    }
}
