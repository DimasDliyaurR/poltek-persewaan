<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asrama;
class FEAsramaController extends Controller
{
    public function index () 
    {
        $asramas = Asrama::latest();
        if(request('search')) {
            $asramas->where('a_nama_ruangan', 'like', '%' . request('search').'%');
        }
        return view('asrama.index', [
            "title" => "Asrama", 
            "asrama" => $asramas->paginate(6)
        ]);
    }
}
