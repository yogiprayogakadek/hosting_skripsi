<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UlasanRequest;
use App\Models\Lokasi;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function ulasan(UlasanRequest $request)
    {
        if($request->ajax()){
            try {
                $nama = str_replace('-', ' ', $request->nama);
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
