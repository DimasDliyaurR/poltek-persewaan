<?php

namespace App\Http\Controllers;

use App\Http\Requests\kendaraanStoreRequest;
use App\Models\Kendaraan;
use App\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class kendaraanController extends Controller
{
    public function index(Request $request): Response
    {
        $kendaraans = Kendaraan::all();

        return view('post.index', compact('posts'));
    }

    public function create(Request $request): Response
    {
        return view('post.create');
    }

    public function store(kendaraanStoreRequest $request): Response
    {
        $post = Post::create($request->validated());

        return redirect()->route('post.index');
    }
}
