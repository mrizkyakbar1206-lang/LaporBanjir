<?php

namespace App\Http\Controllers;

class ProfilController extends Controller
{
    // Profil petugas yang sedang login
    public function show()
    {
        return view('profil');
    }
}
