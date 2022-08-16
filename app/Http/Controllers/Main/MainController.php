<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\LokasiRequest;
use App\Models\Kategori;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use Image;

class MainController extends Controller
{
    public function store (LokasiRequest $request) 
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

            $contentPath = public_path('assets/uploads/media/content');
            $dom = new \DOMDocument();
            libxml_use_internal_errors(true);
            $dom->loadHTML($request->deskripsi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
            libxml_clear_errors();
            $images = $dom->getElementsByTagName('img');
            foreach($images as $img) {
                $src = $img->getAttribute('src');
                if(preg_match('/data:image/', $src)) {
                    //get the mimetype
                    preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                    $mimetype = $groups['mime'];

                    //Generating a random filename
                    $filename = uniqid();
                    $filepath = "/assets/uploads/media/content/$filename.$mimetype";

                    if(!file_exists($contentPath)) {
                        mkdir($contentPath, 666, true);
                    }

                    // @see http://image.intervention.io/api/
                    $image = Image::make($src)
                        // resize if required
                        ->resize(600, 600)
                        ->encode($mimetype, 100)  // encode file to the specified mimetype
                        ->save(public_path($filepath));
                    $new_src = asset($filepath);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $new_src);
                    $img->setAttribute('class', 'img-responsive');
                }
            }
            $data['deskripsi'] = $dom->saveHTML();

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

    public function update(LokasiRequest $request)
    {
        try {
            $kategori = Kategori::where('nama', $request->kategori)->first();
            $lokasi = Lokasi::find($request->id_lokasi);
            $data = [
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
            ];

            if ($request->hasFile('foto')) {
                // unlink($lokasi->foto);
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

            $contentPath = public_path('assets/uploads/media/content');
            $dom = new \DOMDocument();
            libxml_use_internal_errors(true);
            $dom->loadHTML($request->deskripsi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
            libxml_clear_errors();
            $images = $dom->getElementsByTagName('img');
            foreach($images as $img) {
                $src = $img->getAttribute('src');
                if(preg_match('/data:image/', $src)) {
                    //get the mimetype
                    preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                    $mimetype = $groups['mime'];

                    //Generating a random filename
                    $filename = uniqid();
                    $filepath = "/assets/uploads/media/content/$filename.$mimetype";

                    if(!file_exists($contentPath)) {
                        mkdir($contentPath, 666, true);
                    }

                    // @see http://image.intervention.io/api/
                    $image = Image::make($src)
                        // resize if required
                        ->resize(600, 600)
                        ->encode($mimetype, 100)  // encode file to the specified mimetype
                        ->save(public_path($filepath));
                    $new_src = asset($filepath);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $new_src);
                    $img->setAttribute('class', 'img-responsive');
                }
            }
            $data['deskripsi'] = $dom->saveHTML();

            $lokasi->update($data);

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

    public function delete($id)
    {
        try {
            $lokasi = Lokasi::find($id);
            $lokasi->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dihapus',
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

    public function detail($id)
    {
        $data = array();
        $lokasi = Lokasi::find($id);

        foreach(json_decode($lokasi->galeri_foto) as $value) {
            $data[] =[
                'id' => $value->id,
                'foto' => $value->foto
            ];
        }
        return response()->json($data);
    }

    public function upload(Request $request)
    {
        try {
            $lokasi = Lokasi::where('id_lokasi', $request->id_lokasi)->first();

            if($lokasi->galeri_foto == null) {
                if($request->hasFile('photos')) {
                    for($i = 0; $i < count($request->file('photos')); $i++) {
                        //get filename with extension
                        $filenamewithextension = $request->file('photos')[$i]->getClientOriginalName();
        
                        //get file extension
                        $extension = $request->file('photos')[$i]->getClientOriginalExtension();
        
                        //filename to store
                        $filenametostore = $lokasi->nama . '-' . ($i + 1) . '-' . time() . '.' . $extension;
                        $save_path = 'assets/uploads/media/kebudayaan';
        
                        if (!file_exists($save_path)) {
                            mkdir($save_path, 666, true);
                        }
                        $foto[] = [
                            // [
                                'id' => ($i + 1),
                                'foto' => $save_path . '/' . $filenametostore,
                            // ]
                        ];
        
                        $img = Image::make($request->file('photos')[$i]->getRealPath());
                        $img->resize(512, 512);
                        $img->save($save_path . '/' . $filenametostore);
                    }
                    $newData = json_encode($foto);
                    // $data['foto'] = $newData;
                }
                $lokasi->update([
                    'galeri_foto' => $newData
                ]);
            } else {
                $foto = json_decode($lokasi->galeri_foto, true);
                if($request->hasFile('photos')) {
                    for($i = 0; $i < count($request->file('photos')); $i++) {
                        //get filename with extension
                        $filenamewithextension = $request->file('photos')[$i]->getClientOriginalName();
        
                        //get file extension
                        $extension = $request->file('photos')[$i]->getClientOriginalExtension();
        
                        //filename to store
                        $filenametostore = $lokasi->nama . '-' . (($i + 1)+count($foto)) . '-' . time() . '.' . $extension;
                        $save_path = 'assets/uploads/media/kebudayaan';
        
                        if (!file_exists($save_path)) {
                            mkdir($save_path, 666, true);
                        }

                        $foto[] = [
                            'id' => ($i + 1)+count($foto),
                            'foto' => $save_path . '/' . $filenametostore,
                        ];
        
                        $img = Image::make($request->file('photos')[$i]->getRealPath());
                        $img->resize(512, 512);
                        $img->save($save_path . '/' . $filenametostore);
                    }
                    $newData = json_encode($foto);
                }
                $lokasi->update([
                    'galeri_foto' => $newData
                ]);
            }
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

    public function deleteImage($id_lokasi, $id_foto)
    {
        try {
            $lokasi = Lokasi::find($id_lokasi);
            foreach(json_decode($lokasi->galeri_foto) as $value) {
                if($value->id == $id_foto) {
                    unlink($value->foto);
                    $lokasi->galeri_foto = json_decode($lokasi->galeri_foto);
                    $lokasi->galeri_foto = json_encode(array_values(array_filter($lokasi->galeri_foto, function($value) use ($id_foto) {
                        return $value->id != $id_foto;
                    })));
                    $lokasi->save();
                }
            }
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dihapus',
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
