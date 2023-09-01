<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

use App\Models\Lead;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        /* validiamo i dati senza l'utilizzo della classe STORE REQUESTS */
        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email',
            'content' => 'required'
        ]);

        /* verifichiamo se la richiesta non va a buon fine */
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }
}
