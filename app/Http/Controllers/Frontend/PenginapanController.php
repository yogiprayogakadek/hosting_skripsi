<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Lokasi;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class PenginapanController extends Controller
{
    public function index()
    {
        $kategori = Kategori::where('nama', 'Penginapan')->first();
        $lokasi = Lokasi::where('id_kategori', $kategori->id_kategori)->get();
        return view('frontend.penginapan.index', compact('lokasi'));
    }

    public function show($slug)
    {
        $lokasi = Lokasi::where('nama', str_replace('-', ' ', $slug))->first();
        $ulasan = Ulasan::with('user')->where('id_lokasi', $lokasi->id_lokasi)->get();
        $userHasFeedback = Ulasan::where('id_user', auth()->user()->id_user)->where('id_lokasi', $lokasi->id_lokasi)->count();
        return view('frontend.penginapan.show', compact('lokasi', 'userHasFeedback', 'ulasan'));
    }
}
