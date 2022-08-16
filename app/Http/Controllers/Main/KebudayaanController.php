<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class KebudayaanController extends Controller
{
    public function index()
    {
        return view('main.kebudayaan.index');
    }

    public function render()
    {
        $kategori = Kategori::where('nama', 'Kebudayaan')->first();
        $lokasi = Lokasi::where('id_kategori', $kategori->id_kategori)->get();

        $view = [
            'data' => view('main.kebudayaan.render', compact('lokasi'))->render(),
        ];

        return response()->json($view);
    }

    public function create()
    {
        $view = [
            'data' => view('main.kebudayaan.create')->render(),
        ];

        return response()->json($view);
    }

    public function edit($id)
    {
        $lokasi = Lokasi::find($id);

        $view = [
            'data' => view('main.kebudayaan.edit', compact('lokasi'))->render(),
        ];

        return response()->json($view);
    }
}
