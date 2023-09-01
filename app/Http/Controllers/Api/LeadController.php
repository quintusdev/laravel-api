<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

use App\Models\Lead;
use App\Mail\NewContact;

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

        /* salvo i dati nel database */
        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();

        /* invio mail */
        Mail::to('info@boolfolio.com')->send(new NewContact($new_lead));
    }
}
