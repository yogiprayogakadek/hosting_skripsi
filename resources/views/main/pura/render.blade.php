<div class="card">
    <div class="card-header">
        <div class="card-title">Data Pura Goa Giri Putri</div>
        <div class="card-options">
            <button class="btn btn-primary btn-add" style="margin-left: 2px">
                <i class="fa fa-plus"></i> Tambah
            </button>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover table-striped" id="tableData">
            <thead>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat Lengkap</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Foto</th>
                <th>Galeri</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach ($lokasi as $lokasi)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$lokasi->nama}}</td>
                    <td>{{$lokasi->alamat}}</td>
                    <td>{{$lokasi->latitude}}</td>
                    <td>{{$lokasi->longitude}}</td>
                    <td>
                        <img src="{{asset($lokasi->foto)}}" class="img-rounded" width="100px">
                    </td>   
                    <td>
                        <button type="button" class="btn {{$lokasi->galeri_foto == null ? 'btn-primary btn-add-galeri' : 'btn-info btn-edit-galeri'}}" data-id="{{$lokasi->id_lokasi}}">
                            {!!$lokasi->galeri_foto == null ? '<span class="fa fa-plus"></span> Tambah' : 'Lihat'!!}
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-success btn-sm btn-edit" data-id="{{$lokasi->id_lokasi}}">
                            <i class="fa fa-edit"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalGaleri" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Galeri Foto</h5>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                        <span class="fa fa-times"></span>
                    </button>
            </div>
            <div class="modal-body">
                <form id="formUpload" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="id_lokasi" id="id_lokasi">
                        <label for="">Galeri Foto</label>
                        <input type="file" name="photos[]" id="photos" multiple class="form-control">
                    </div>
                </form>
                <div class="row photos">
                    {{-- <div class="photos"></div> --}}
                </div>
                <span class="noted"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-upload">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#tableData').DataTable({
        language: {
            paginate: {
                previous: "<i class='mdi mdi-chevron-left'>",
                next: "<i class='mdi mdi-chevron-right'>"
            },
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
            lengthMenu: "Menampilkan _MENU_ data",
            search: "Cari:",
            emptyTable: "Tidak ada data tersedia",
            zeroRecords: "Tidak ada data yang cocok",
            loadingRecords: "Memuat data...",
            processing: "Memproses...",
            infoFiltered: "(difilter dari _MAX_ total data)"
        },
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"]
        ],
    });
</script>