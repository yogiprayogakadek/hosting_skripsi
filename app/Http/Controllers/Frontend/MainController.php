<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UlasanRequest;
use App\Models\Kategori;
use App\Models\Lokasi;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $kategori = Kategori::where('nama', 'Pura')->first();
        $lokasi = Lokasi::where('id_kategori', $kategori->id_kategori)->first();
        return view('frontend.index', compact('lokasi'));
    }

    public function ulasan(UlasanRequest $request)
    {
        if($request->ajax()){
            try {
                $nama = str_replace('-', ' ', $request->nama);
                // dd($nama);
                $lokasi = Lokasi::where('nama', $nama)->first();
                $ulasan = $request->feedback;

                Ulasan::create([
                    'id_lokasi' => $lokasi->id_lokasi,
                    'ulasan' => $ulasan,
                    'id_user' => auth()->user()->id_user,
                ]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Ulasan berhasil dikirim',
                    'title' => 'Berhasil'
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 'error',
                    'message' => $e->getMessage(),
                    'title' => 'Gagal'
                ]);
            }
        } else {
            return abort(403);
        }
    }
}
