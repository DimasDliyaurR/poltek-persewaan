<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\MerkKendaraan;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function getMerkKendaraanBySlug($slug)
    {
        $slugs = explode(",", $slug);
        $merkKendaraan = MerkKendaraan::with("kendaraans");

        foreach ($slugs as $key => $value) {
            $merkKendaraan->orWhere("mk_slug", $value);
        }

        return response()->json($merkKendaraan->get());
    }
}