<div class="col-12">
    <form id="formEdit">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Ubah Data Pura Goa Giri Putri</div>
                <div class="card-options">
                    <button class="btn btn-info btn-data" type="button">
                        <i class="fa fa-eye"></i> Data
                    </button>
                </div>
            </div>

            <div class="card-body">
                <input type="hidden" name="id_lokasi" id="id_lokasi" value="{{$lokasi->id_lokasi}}">
                <div class="form-group">
                    <label for="nama">Nama Pura</label>
                    <input type="text" class="form-control nama" name="nama" id="nama" placeholder="masukkan nama pura" value="{{$lokasi->nama}}">
                    <div class="invalid-feedback error-nama"></div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control alamat" name="alamat" id="alamat" placeholder="masukkan alamat">{{$lokasi->alamat}}</textarea>
                    <div class="invalid-feedback error-alamat"></div>
                </div>
                <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input type="text" class="form-control latitude" name="latitude" id="latitude" placeholder="masukkan latitude" value="{{$lokasi->latitude}}">
                    <div class="invalid-feedback error-latitude"></div>
                </div>
                <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="text" class="form-control longitude" name="longitude" id="longitude" placeholder="masukkan longitude" value="{{$lokasi->longitude}}">
                    <div class="invalid-feedback error-longitude"></div>
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control foto" name="foto" id="foto" placeholder="masukkan foto">
                    <span class="text-muted text-small">*kosongkan apabila tidak ingin mengubah foto</span>
                    <div class="invalid-feedback error-foto"></div>
                </div>
            </div>
        </div>

        {{-- Tentang Pura --}}
        <div class="card">
            <div class="card-header">
                <div class="card-options">
                    <button class="btn btn-info btn-tambah-tentang" type="button">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="row tentang-pura">
                    @for ($i = 0; $i < count(json_decode($lokasi->deskripsi, true)['tentang']); $i++)
                    <div class="col-3">
                        <div class="form-group">
                            <label for="tentang">Tentang</label>
                            <input type="text" class="form-control tentang{{$i}}" name="tentang[{{$i}}]" id="tentang{{$i}}" placeholder="masukkan tentang" value="{{json_decode($lokasi->deskripsi, true)['tentang'][$i]['tentang']}}">
                            <div class="invalid-feedback error-tentang{{$i}}"></div>
                        </div>
                    </div>

                    <div class="col-9">
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control deskripsi{{$i}}" name="deskripsi[{{$i}}]" id="deskripsi{{$i}}" placeholder="masukkan deskripsi">{{json_decode($lokasi->deskripsi, true)['tentang'][$i]['deskripsi']}}</textarea>
                            <div class="invalid-feedback error-deskripsi{{$i}}"></div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
        {{-- End Tentang Pura --}}

        {{-- Tahapan Persembahyangan --}}
        <div class="card">
            <div class="card-header">
                <div class="card-options">
                    <button class="btn btn-info btn-tambah-tahapan" type="button">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="link">ID Tautan Video</label>
                    <input type="text" class="form-control link" name="link" id="link" placeholder="masukkan link" value="{{json_decode($lokasi->deskripsi, true)['link_video']}}">
                    <div class="invalid-feedback error-link"></div>
                </div>
                <div class="row tahapan-persembahyangan">
                    @for ($j = 0; $j < count(json_decode($lokasi->deskripsi, true)['tahapan']); $j++)
                    <div class="col-3">
                        <div class="form-group">
                            <label for="bagian">Bagian</label>
                            <input type="text" class="form-control bagian{{$j}}" name="bagian[{{$j}}]" id="bagian{{$j}}" placeholder="masukkan bagian" value="{{json_decode($lokasi->deskripsi, true)['tahapan'][$j]['bagian']}}">
                            <div class="invalid-feedback error-bagian{{$j}}"></div>
                        </div>
                    </div>

                    <div class="col-9">
                        <div class="form-group">
                            <label for="tahapan">Deskripsi Tahapan</label>
                            <textarea class="form-control tahapan{{$j}}" name="tahapan[{{$j}}]" id="tahapan{{$j}}" placeholder="masukkan tahapan">{{json_decode($lokasi->deskripsi, true)['tahapan'][$j]['tahapan']}}</textarea>
                            <div class="invalid-feedback error-tahapan{{$j}}"></div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
        {{-- End Tahapan Persembahyangan --}}


        <div class="form-group">
            <button class="btn btn-success btn-update pull-right" type="button">
                <i class="fa fa-save"></i> Simpan
            </button>
        </div>
    </form>
</div>