<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utilisateur;

class utilisateursController extends Controller
{
    public function list()
    {
        return Utilisateur::all();
    }

    public function create(Request $request)
    {
        $request->validate([
            'full_name' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required']
        ]);

        $utilisateur = new Utilisateur();
        $utilisateur->full_name = $request->full_name;
        $utilisateur->email = $request->email;
        $utilisateur->phone = $request->phone;

        return json_encode($utilisateur->save());
    }
}
