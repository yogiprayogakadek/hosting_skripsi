<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use Image;

class PuraController extends Controller
{
    public function index()
    {
        return view('main.pura.index');
    }

    public function render()
    {
        $kategori = Kategori::where('nama', 'Pura')->first();
        $lokasi = Lokasi::where('id_kategori', $kategori->id_kategori)->get();

        $view = [
            'data' => view('main.pura.render', compact('lokasi'))->render(),
        ];

        return response()->json($view);
    }

    public function create()
    {
        $view = [
            'data' => view('main.pura.create')->render(),
        ];

        return response()->json($view);
    }

    public function store(Request $request)
    {
        try {
            $kategori = Kategori::where('nama', $request->kategori)->first();
            $data = [
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'id_kategori' => $kategori->id_kategori,
            ];

            $deskripsi_pura = [
                'link_video' => $request->link ?? '',
            ];

            $tentang = [] ;
            for($i = 0; $i < count($request->deskripsi); $i++) {
                $tentang[] = [
                    'id' => $i+1,
                    'tentang' => $request->tentang[$i] ?? '',
                    'deskripsi' => $request->deskripsi[$i]
                ];
            }
            
            $tahapan = [];
            for($j = 0; $j < count($request->tahapan); $j++) {
                $tahapan[] = [
                    'id' => $j+1,
                    'bagian' => $request->bagian[$j] ?? '',
                    'tahapan' => $request->tahapan[$j]
                ];
            }

            $deskripsi_pura['tentang'] = $tentang;
            $deskripsi_pura['tahapan'] = $tahapan;

            if ($request->hasFile('foto')) {
                //get filename with extension
                $filenamewithextension = $request->file('foto')->getClientOriginalName();

                //get file extension
                $extension = $request->file('foto')->getClientOriginalExtension();

                //filename to store
                $filenametostore = str_replace(' ', '-', $request->nama) . '-' . time() . '.' . $extension;
                $save_path = 'assets/uploads/media/' . strtolower($kategori->nama);

                if (!file_exists($save_path)) {
                    mkdir($save_path, 666, true);
                }
                
                $data['foto'] = $save_path . '/' . $filenametostore;

                $img = Image::make($request->file('foto')->getRealPath());
                $img->resize(600, 600);
                $img->save($save_path . '/' . $filenametostore);
            }

            $data['deskripsi'] = json_encode($deskripsi_pura);

            Lokasi::create($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil tersimpan',
                'title' => 'Berhasil'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'title' => 'Gagal'
            ]);
        }
    }
}
