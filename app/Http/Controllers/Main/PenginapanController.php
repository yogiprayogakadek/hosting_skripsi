<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class PenginapanController extends Controller
{
    public function index()
    {
        return view('main.penginapan.index');
    }

    public function render()
    {
        $kategori = Kategori::where('nama', 'Penginapan')->first();
        $lokasi = Lokasi::where('id_kategori', $kategori->id_kategori)->get();

        $view = [
            'data' => view('main.penginapan.render', compact('lokasi'))->render(),
        ];

        return response()->json($view);
    }

    public function create()
    {
        $view = [
            'data' => view('main.penginapan.create')->render(),
        ];

        return response()->json($view);
    }

    public function edit($id)
    {
        $lokasi = Lokasi::find($id);

        $view = [
            'data' => view('main.penginapan.edit', compact('lokasi'))->render(),
        ];

        return response()->json($view);
    }
}
