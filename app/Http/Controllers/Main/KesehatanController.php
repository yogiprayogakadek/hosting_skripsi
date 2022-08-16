<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class KesehatanController extends Controller
{
    public function index()
    {
        return view('main.kesehatan.index');
    }

    public function render()
    {
        $kategori = Kategori::where('nama', 'Kesehatan')->first();
        $lokasi = Lokasi::where('id_kategori', $kategori->id_kategori)->get();

        $view = [
            'data' => view('main.kesehatan.render', compact('lokasi'))->render(),
        ];

        return response()->json($view);
    }

    public function create()
    {
        $view = [
            'data' => view('main.kesehatan.create')->render(),
        ];

        return response()->json($view);
    }

    public function edit($id)
    {
        $lokasi = Lokasi::find($id);

        $view = [
            'data' => view('main.kesehatan.edit', compact('lokasi'))->render(),
        ];

        return response()->json($view);
    }
}
