<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Lokasi;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class KesehatanController extends Controller
{
    public function index()
    {
        $kategori = Kategori::where('nama', 'Kesehatan')->first();
        $lokasi = Lokasi::where('id_kategori', $kategori->id_kategori)->get();
        $ulasan = Ulasan::whereIn('id_lokasi', $lokasi->pluck('id_lokasi')->toArray())->get();
        return view('frontend.kesehatan.index', compact('lokasi', 'ulasan'));
    }

    public function show($slug)
    {
        $lokasi = Lokasi::where('nama', str_replace('-', ' ', $slug))->first();
        $ulasan = Ulasan::with('user')->where('id_lokasi', $lokasi->id_lokasi)->get();

        $data = [
            'lokasi' => $lokasi,
            'ulasan' => $ulasan
        ];

        if(auth()->check()) {
            $userHasFeedback = Ulasan::where('id_user', auth()->user()->id_user)->where('id_lokasi', $lokasi->id_lokasi)->count();
            $data['userHasFeedback'] = $userHasFeedback;
            return view('frontend.kesehatan.show', $data);
        } else {
            return view('frontend.kesehatan.show', $data);
        }
    }
}
