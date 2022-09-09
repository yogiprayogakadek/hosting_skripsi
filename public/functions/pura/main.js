function getData() {
    $.ajax({
        type: "get",
        url: "/admin/pura/render",
        dataType: "json",
        success: function (response) {
            $(".render").html(response.data);
        },
        error: function (error) {
            console.log("Error", error);
        },
    });
}

function tambah() {
    $.ajax({
        type: "get",
        url: "/admin/pura/create",
        dataType: "json",
        success: function (response) {
            $(".render").html(response.data);
        },
        error: function (error) {
            console.log("Error", error);
        },
    });
}


$(document).ready(function () {
    getData();
    var i = 0;
    var j = 0;

    $('body').on('click', '.btn-add', function () {
        tambah();
    });

    $('body').on('click', '.btn-data', function () {
        i = 0;
        j = 0;
        getData();
    });

    // tentang pura
    $('body').on('click', '.btn-tambah-tentang', function () {
        i++;

        var html = '<div class="col-3 tentang-group'+i+'">' +
                        '<div class="form-group">' +
                            '<input type="text" class="form-control tentang'+i+'" name="tentang[' + i + ']" id="tentang'+i+'" placeholder="masukkan tentang">' +
                            '<div class="invalid-feedback error-tentang'+i+'"></div>' +
                        '</div>' +
                    '</div>' +
                    '<div class="col-8 tentang-group'+i+'">' +
                        '<div class="form-group">' +
                            '<textarea class="form-control deskripsi'+i+'" name="deskripsi['+i+']" id="deskripsi'+i+'" placeholder="masukkan deskripsi"></textarea>' +
                            '<div class="invalid-feedback error-deskripsi'+i+'"></div>' +
                        '</div>' +
                    '</div>' +
                    '<div class="col-1 tentang-group'+i+'">' +
                        '<div class="form-group">' +
                            '<button type="button" class="btn btn-danger btn-hapus-tentang" data-id="'+i+'"><i class="fa fa-trash"></i></button>' +
                        '</div>' +
                    '</div>';

        $(".tentang-pura").append(html);
    });

    $('body').on('click', '.btn-hapus-tentang', function () {
        var id = $(this).data('id');
        $(".tentang-group"+id).remove();
    });

    // tahapan persembahyangan
    $('body').on('click', '.btn-tambah-tahapan', function () {
        j++;

        var html = '<div class="col-3 persembahyangan-group'+j+'">' +
                        '<div class="form-group">' +
                            '<input type="text" class="form-control bagian'+j+'" name="bagian[' + j + ']" id="bagian'+j+'" placeholder="masukkan bagian">' +
                            '<div class="invalid-feedback error-bagian'+j+'"></div>' +
                        '</div>' +
                    '</div>' +
                    '<div class="col-3 persembahyangan-group'+j+'">' +
                        '<div class="form-group">' +
                            '<input type="file" class="form-control tata_foto'+j+'" name="tata_foto['+j+']" id="tata-foto'+j+'" placeholder="masukkan foto tata cara">' +
                            '<div class="invalid-feedback error-tata_foto'+j+'"></div>' +
                        '</div>' +
                    '</div>' +
                    '<div class="col-5 persembahyangan-group'+j+'">' +
                        '<div class="form-group">' +
                            '<textarea class="form-control tahapan'+j+'" name="tahapan['+j+']" id="tahapan'+j+'" placeholder="masukkan tahapan"></textarea>' +
                            '<div class="invalid-feedback error-tahapan'+j+'"></div>' +
                        '</div>' +
                    '</div>' +
                    '<div class="col-1 persembahyangan-group'+j+'">' +
                        '<div class="form-group">' +
                            '<button type="button" class="btn btn-danger btn-hapus-tahapan" data-id="'+j+'"><i class="fa fa-trash"></i></button>' +
                        '</div>' +
                    '</div>';

        $(".tahapan-persembahyangan").append(html);
    });

    $('body').on('click', '.btn-hapus-tahapan', function () {
        var id = $(this).data('id');
        $(".persembahyangan-group"+id).remove();
    });

    // on save button
    $('body').on('click', '.btn-save', function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let form = $('#formAdd')[0]
        let data = new FormData(form)
        $.ajax({
            type: "POST",
            url: "/admin/pura/store",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function () {
                $('.btn-save').attr('disable', 'disabled')
                $('.btn-save').html('<i class="fa fa-spin fa-spinner"></i>')
            },
            complete: function () {
                $('.btn-save').removeAttr('disable')
                $('.btn-save').html('Simpan')
            },
            success: function (response) {
                $('#formAdd').trigger('reset')
                $(".invalid-feedback").html('')
                getData();
                Swal.fire(
                    response.title,
                    response.message,
                    response.status
                );
            },
            error: function (error) {
                let formName = []
                let errorName = []

                $.each($('#formAdd').serializeArray(), function (i, field) {
                    formName.push(field.name.replace(/\[|\]/g, ''))
                });
                if (error.status == 422) {
                    if (error.responseJSON.errors) {
                        $.each(error.responseJSON.errors, function (key, value) {
                            errorName.push(key.replace('.', ''))
                            if($('.'+key.replace('.', '')).val() == '') {
                                $('.'+key.replace('.', '')).addClass('is-invalid');
                                $('.error-'+key.replace('.', '')).html(value);
                            }
                        })
                        $.each(formName, function (i, field) {
                            $.inArray(field, errorName) == -1 ? $('.'+field).removeClass('is-invalid') : $('.'+field).addClass('is-invalid');
                        });
                    }
                }
            }
        });
    });

    $('body').on('click', '.btn-edit', function () {
        let id = $(this).data('id')
        $.ajax({
            type: "get",
            url: "/admin/pura/edit/" + id,
            dataType: "json",
            success: function (response) {
                $(".render").html(response.data);
                i = $('.tentang').length - 1;
                j = $('.tahapan').length - 1;
            },
            error: function (error) {
                console.log("Error", error);
            },
        });
    });

    // on update button
    $('body').on('click', '.btn-update', function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let form = $('#formEdit')[0]
        let data = new FormData(form)
        $.ajax({
            type: "POST",
            url: "/admin/pura/update",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function () {
                $('.btn-update').attr('disable', 'disabled')
                $('.btn-update').html('<i class="fa fa-spin fa-spinner"></i>')
            },
            complete: function () {
                $('.btn-update').removeAttr('disable')
                $('.btn-update').html('Simpan')
            },
            success: function (response) {
                $('#formEdit').trigger('reset')
                $(".invalid-feedback").html('')
                getData();
                Swal.fire(
                    response.title,
                    response.message,
                    response.status
                );
            },
            error: function (error) {
                let formName = []
                let errorName = []

                $.each($('#formEdit').serializeArray(), function (i, field) {
                    formName.push(field.name.replace(/\[|\]/g, ''))
                });
                if (error.status == 422) {
                    if (error.responseJSON.errors) {
                        $.each(error.responseJSON.errors, function (key, value) {
                            errorName.push(key)
                            if($('.'+key).val() == '') {
                                $('.' + key).addClass('is-invalid')
                                $('.error-' + key).html(value)
                            }
                        })
                        $.each(formName, function (i, field) {
                            $.inArray(field, errorName) == -1 ? $('.'+field).removeClass('is-invalid') : $('.'+field).addClass('is-invalid');
                        });
                    }
                }
            }
        });
    });

    $('body').on('click', '.btn-delete', function () {
        let id = $(this).data('id')
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang sudah dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "get",
                    url: "/admin/main/delete/" + id,
                    dataType: "json",
                    success: function (response) {
                        $(".render").html(response.data);
                        getData();
                        Swal.fire(
                            response.title,
                            response.message,
                            response.status
                        );
                    },
                    error: function (error) {
                        console.log("Error", error);
                    },
                });
            }
        })
    });

    $('body').on('click', '.btn-add-galeri', function () {
        let id = $(this).data('id')
        $('#modalGaleri').find('#id_lokasi').val(id)
        $('#modalGaleri').modal('show');
    });

    $('body').on('click', '.btn-upload', function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let form = $('#formUpload')[0]
        let data = new FormData(form)
        if($('#photos').val() == '') {
            Swal.fire({
                title: 'Pilih file terlebih dahulu!',
                text: "",
                icon: 'error',
                confirmButtonText: 'Ok'
            });
        } else {
            $.ajax({
                type: "POST",
                url: "/admin/main/upload",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function () {
                    $('.btn-upload').attr('disable', 'disabled')
                    $('.btn-upload').html('<i class="fa fa-spin fa-spinner"></i>')
                },
                complete: function () {
                    $('.btn-upload').removeAttr('disable')
                    $('.btn-upload').html('Simpan')
                },
                success: function (response) {
                    $('#formUpload').trigger('reset')
                    $(".invalid-feedback").html('')
                    getData();
                    Swal.fire(
                        response.title,
                        response.message,
                        response.status
                    );
                    $('#modalGaleri').modal('hide');
                },
                error: function (error) {
                    console.log("Error", error);
                }
            });
        }
    });

    $('body').on('click', '.btn-edit-galeri', function () {
        let id = $(this).data('id')
        $('#modalGaleri').find('#id_lokasi').val(id)
        $('#modalGaleri').modal('show');
        
        $.get("/admin/main/detail/"+id,function (data) {
            $('.photos').empty()
            $.each(data, function (index, value) { 
                let image = '<div class="col-md-3">'+
                                '<div class="card-body">'+
                                    '<p class="card-description">'+
                                        '<img src="'+assets(value.foto)+'" class="img-thumbnail delete-image" style="cursor: pointer" data-id="'+value.id+'">'+
                                    '</p>'+
                                '</div>'+
                            '</div>';
                $('.photos').append(image)
            });
            $('#modalGaleri').find('.noted').text('Klik gambar untuk menghapus')
        });
    });

    $('body').on('click', '.delete-image', function () {
        $('#modalGaleri').modal('hide');
        let id_lokasi = $('#modalGaleri').find('#id_lokasi').val()
        let id_foto = $(this).data('id')

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang sudah dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "get",
                    url: "/admin/main/delete-image/" + id_lokasi + "/" + id_foto,
                    dataType: "json",
                    success: function (response) {
                        $('#modalGaleri').modal('hide');
                        getData();
                        Swal.fire(
                            response.title,
                            response.message,
                            response.status
                        );
                    },
                    error: function (error) {
                        console.log("Error", error);
                    },
                });
            }
        })
    });
});