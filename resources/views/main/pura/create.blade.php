<div class="col-12">
    <form id="formAdd">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Data Pura Goa Giri Putri</div>
                <div class="card-options">
                    <button class="btn btn-info btn-data" type="button">
                        <i class="fa fa-eye"></i> Data
                    </button>
                </div>
            </div>

            <div class="card-body">
                <input type="hidden" name="kategori" id="kategori" value="Pura">
                <div class="form-group">
                    <label for="nama">Nama Pura</label>
                    <input type="text" class="form-control nama" name="nama" id="nama" placeholder="masukkan nama kebudayaan">
                    <div class="invalid-feedback error-nama"></div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control alamat" name="alamat" id="alamat" placeholder="masukkan alamat"></textarea>
                    <div class="invalid-feedback error-alamat"></div>
                </div>
                <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input type="text" class="form-control latitude" name="latitude" id="latitude" placeholder="masukkan latitude">
                    <div class="invalid-feedback error-latitude"></div>
                </div>
                <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="text" class="form-control longitude" name="longitude" id="longitude" placeholder="masukkan longitude">
                    <div class="invalid-feedback error-longitude"></div>
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control foto" name="foto" id="foto" placeholder="masukkan foto">
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
                    <div class="col-3">
                        <div class="form-group">
                            <label for="tentang">Tentang</label>
                            <input type="text" class="form-control tentang0" name="tentang[0]" id="tentang0" placeholder="masukkan tentang">
                            <div class="invalid-feedback error-tentang0"></div>
                        </div>
                    </div>

                    <div class="col-9">
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control deskripsi0" name="deskripsi[0]" id="deskripsi0" placeholder="masukkan deskripsi"></textarea>
                            <div class="invalid-feedback error-deskripsi0"></div>
                        </div>
                    </div>
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
                    <input type="text" class="form-control link" name="link" id="link" placeholder="masukkan link">
                    <div class="invalid-feedback error-link"></div>
                </div>
                <div class="row tahapan-persembahyangan">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="bagian">Bagian</label>
                            <input type="text" class="form-control bagian0" name="bagian[0]" id="bagian0" placeholder="masukkan bagian">
                            <div class="invalid-feedback error-bagian0"></div>
                        </div>
                    </div>

                    <div class="col-9">
                        <div class="form-group">
                            <label for="tahapan">Deskripsi Tahapan</label>
                            <textarea class="form-control tahapan0" name="tahapan[0]" id="tahapan0" placeholder="masukkan tahapan"></textarea>
                            <div class="invalid-feedback error-tahapan0"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Tahapan Persembahyangan --}}


        <div class="form-group">
            <button class="btn btn-success btn-save pull-right" type="button">
                <i class="fa fa-save"></i> Simpan
            </button>
        </div>
    </form>
</div>