<?php

namespace App\Http\Controllers\Api;

use App\Lead;
use App\Http\Controllers\Controller;
use App\Mail\SendNewMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class EmailController extends Controller
{
    public function store(Request $request) {
        $data = $request->all();

        // validiamo i dati
        $validator = Validator::make($data, [
            'email' => 'required|email',
        ]);

        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        // salviamo a db i dati inseriti nel form di contatto
        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();

        // inviamo la mail all'admin del sito, passando il nuovo oggetto Lead
        Mail::to('info@deliveroo.it')->send(new SendNewMail($new_lead));

        return response()->json([
            'success' => true,
        ]);
    }
}
