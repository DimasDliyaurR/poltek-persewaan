<?php

namespace App\Http\Controllers;

use App\Models\AlatBarang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FEAlatBarangController extends Controller
{
    public function index ()
    {
        $alatbarang = AlatBarang::latest();
        if(request('search')){
            $alatbarang->WHERE('a_nama', 'like' ,'%'.request('search').'%');
        }
        return view('alatBarang.index', [
            "title" => "Alat Barang",
            "AlatBarang" => $alatbarang->paginate(6),
        ]);
    }
}