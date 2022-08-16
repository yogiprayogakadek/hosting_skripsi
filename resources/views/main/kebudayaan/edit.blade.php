<div class="col-12">
    <form id="formEdit">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Data Kebudayaan</div>
                <div class="card-options">
                    <button class="btn btn-info btn-data" type="button">
                        <i class="fa fa-eye"></i> Data
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="hidden" name="id_lokasi" value="{{$lokasi->id_lokasi}}">
                    <label for="nama">Nama Kebudayaan</label>
                    <input type="text" class="form-control nama" name="nama" id="nama" placeholder="masukkan nama kebudayaan" value="{{$lokasi->nama}}">
                    <div class="invalid-feedback error-nama"></div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat Asli Kebudayaan</label>
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
                    <input type="text" class="form-control longitude" name="longitude" id="longitude" placeholder="masukkan longitude" value="{{$lokasi->latitude}}">
                    <div class="invalid-feedback error-longitude"></div>
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control foto" name="foto" id="foto" placeholder="masukkan foto">
                    <span class="text-muted text-small">*kosongkan jika tidak ingin mengubah foto</span>
                    <div class="invalid-feedback error-foto"></div>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control deskripsi" name="deskripsi" id="deskripsi" placeholder="masukkan deskripsi">{!!$lokasi->latitude!!}</textarea>
                    <div class="invalid-feedback error-deskripsi"></div>
                </div>
                <div class="form-group">
                    <button class="btn btn-success btn-update pull-right" type="button">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function () {
        $('#deskripsi').summernote({
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'hr']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
            popatmouseup: true,
        });
    });
</script>