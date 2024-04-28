<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    
use App\Models\Layanan;

class FELayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::get();
        if(request('search')){
            $layanans->where('l_nama', 'like', '%' . request('search'). '%');
        }
        return view('layanan.index', [
            "title" => "Layanan",
            "layanan" => $layanans->paginate(6)

        ]);
    }
}
