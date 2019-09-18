@extends('dashboard.layout')

@section('page title','WEB Component Rumah Dijual')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg">

                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <table class="table table-sm table-bordered display nowrap" id="tableIndex" width="100%">
                                <thead class="bg-dark">
                                <tr>
                                    <th>Lister</th>
                                    <th>Nama Rumah</th>
                                    <th>Lokasi</th>
                                    <th>Detail</th>
                                    <th>Harga</th>
                                    <th>Gambar</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-2">
                                    <button type="button" class="btn btn-block btn-outline-danger btn-sm" id="btnHide" hidden>
                                        <i class="fas fa-times"></i> Terjual
                                    </button>
                                    <button type="button" class="btn btn-block btn-outline-success btn-sm" id="btnShow" hidden>
                                        <i class="fas fa-check"></i> Belum Terjual
                                    </button>
                                </div>
                                <div class="col-lg-4"></div>
                                <div class="col-lg-2 mt-2 mt-sm-0">
                                    <button type="button" class="btn btn-block btn-outline-dark btn-sm" id="btnEditGambar" disabled>
                                        <i class="fas fa-image"></i> Edit Gambar
                                    </button>
                                </div>
                                <div class="col-lg-2 mt-2 mt-sm-0">
                                    <button type="button" class="btn btn-block btn-outline-dark btn-sm" id="btnEditData" disabled>
                                        <i class="fas fa-pen"></i> Edit Data
                                    </button>
                                </div>
                                <div class="col-lg-2 mt-2 mt-sm-0">
                                    <button type="button" class="btn btn-block btn-primary btn-sm" id="btnAdd">
                                        <i class="fas fa-plus"></i> Tambah
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="cardEditor" class="card card-success card-outline d-none">

                        <div class="card-header">
                            <h3 class="card-title">Tambah Data</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-sm btn-light" id="btnClose">
                                    <i class="fas fa-times" style="color: red;"></i>
                                </button>
                            </div>
                        </div>

                        <form id="formData">
                            <input type="hidden" id="iType" value="new">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div id="iGambar"></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="iLister">Lister</label>
                                            <select id="iLister">
                                                @foreach($info['lister'] as $i)
                                                    <option value="{{ $i->id }}">{{ $i->fullname }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="iMarketer">Marketer</label>
                                            <select id="iMarketer">
                                                @foreach($info['marketer'] as $i)
                                                    <option value="{{ $i->id }}">{{ $i->fullname }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="iTipeBiaya">Jual / Sewa</label>
                                            <select id="iTipeBiaya"></select>
                                        </div>

                                        <div class="form-group">
                                            <label for="iJenisProperty">Jenis Properti</label>
                                            <select id="iJenisProperty">
                                                @foreach($info['jenis-properti'] as $i)
                                                    <option value="{{ $i->name }}">{{ $i->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="iNamaRumah">Nama Rumah</label>
                                            <input class="form-control" id="iNamaRumah">
                                        </div>

                                        <div class="form-group">
                                            <label for="iLokasi">Lokasi</label>
                                            <input class="form-control" id="iLokasi">
                                        </div>

                                        <div class="form-group">
                                            <label for="iDetail">Detail</label>
                                            <textarea class="form-control" id="iDetail" rows="3"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="iHarga">Harga</label>
                                            <input class="form-control" id="iHarga">
                                        </div>

                                        <div class="form-group">
                                            <label for="iLuasTanah">Luas Tanah</label>
                                            <input class="form-control" id="iLuasTanah">
                                        </div>

                                        <div class="form-group">
                                            <label for="iLuasBangunan">Luas Bangunan</label>
                                            <input class="form-control" id="iLuasBangunan">
                                        </div>

                                        <div class="form-group">
                                            <label for="iLantai">Lantai</label>
                                            <input class="form-control" id="iLantai">
                                        </div>

                                        <div class="form-group">
                                            <label for="iKamarTidur">Kamar Tidur</label>
                                            <input class="form-control" id="iKamarTidur">
                                        </div>

                                        <div class="form-group">
                                            <label for="iKamarMandi">Kamar Mandi</label>
                                            <input class="form-control" id="iKamarMandi">
                                        </div>

                                        <div class="form-group">
                                            <label for="iDapurBersih">Dapur Bersih</label>
                                            <input class="form-control" id="iDapurBersih">
                                        </div>

                                        <div class="form-group">
                                            <label for="iDapurKotor">Dapur Kotor</label>
                                            <input class="form-control" id="iDapurKotor">
                                        </div>

                                        <div class="form-group">
                                            <label for="iTaman">Taman</label>
                                            <input class="form-control" id="iTaman">
                                        </div>

                                        <div class="form-group">
                                            <label for="iArahRumah">Hadap Rumah</label>
                                            <select class="form-control" id="iArahRumah">
                                                <option value="all">All</option>
                                                <option value="utara">Utara</option>
                                                <option value="timur_laut">Timur Laut</option>
                                                <option value="timur">Timur</option>
                                                <option value="tenggara">Tenggara</option>
                                                <option value="selatan">Selatan</option>
                                                <option value="barat_daya">Barat Daya</option>
                                                <option value="barat">Barat</option>
                                                <option value="barat_laut">Barat Laut</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="iListrik">Listrik</label>
                                            <input class="form-control" id="iListrik">
                                        </div>

                                        <div class="form-group">
                                            <label for="iFurniture">Furniture</label>
                                            <input class="form-control" id="iFurniture">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-10"></div>
                                    <div class="col-lg-2 mt-2 mt-sm-0">
                                        <button type="submit" class="btn btn-block btn-success">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/filepond-master/filepond.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/filepond-master/filepond-plugin-image-preview.css') }}">
@endsection

@section('script')
    <script src="{{ asset('vendor/filepond-master/filepond-plugin-image-preview.js') }}"></script>
    <script src="{{ asset('vendor/filepond-master/filepond-plugin-image-crop.js') }}"></script>
    <script src="{{ asset('vendor/filepond-master/filepond-plugin-image-resize.js') }}"></script>
    <script src="{{ asset('vendor/filepond-master/filepond-plugin-image-transform.js') }}"></script>
    <script src="{{ asset('vendor/filepond-master/filepond.min.js') }}"></script>
    <script>
        const iType = document.getElementById('iType');
        const iLister = document.getElementById('iLister');
        const iMarketer = document.getElementById('iMarketer');
        const iTipeBiaya = document.getElementById('iTipeBiaya');
        const iJenisProperty = document.getElementById('iJenisProperty');
        const iNamaRumah = document.getElementById('iNamaRumah');
        const iLokasi = document.getElementById('iLokasi');
        const iDetail = document.getElementById('iDetail');
        const iHarga = document.getElementById('iHarga');
        const iLuasTanah = document.getElementById('iLuasTanah');
        const iLuasBangunan = document.getElementById('iLuasBangunan');
        const iLantai = document.getElementById('iLantai');
        const iKamarTidur = document.getElementById('iKamarTidur');
        const iKamarMandi = document.getElementById('iKamarMandi');
        const iDapurBersih = document.getElementById('iDapurBersih');
        const iDapurKotor = document.getElementById('iDapurKotor');
        const iTaman = document.getElementById('iTaman');
        const iArahRumah = document.getElementById('iArahRumah');
        const iListrik = document.getElementById('iListrik');
        const iFurniture = document.getElementById('iFurniture');

        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginImageResize,
            FilePondPluginImageCrop,
            FilePondPluginImageTransform,
        );
        FilePond.setOptions({
            allowImageTransform: true,
            allowImageResize: true,
            imageResizeMode: 'cover',
            imageResizeTargetHeight: 700,
            imageResizeTargetWidth: 1200,
            imageTransformOutputMimeType: 'image/jpeg',
            allowImagePreview: true,
            imagePreviewMinHeight: 190,
            imagePreviewMaxHeight: 200,
            allowMultiple: false,
            allowDrop: true,
            instantUpload: false,
            iconProcess: '<svg></svg>',
            server: {
                process: (fieldName, file, metadata, load, error, progress, abort) => {
                    if (iType.value === 'new') {
                        const formData = new FormData();
                        formData.append(fieldName, file, file.name);
                        formData.append('id_lister', iLister.value);
                        formData.append('id_marketer', iMarketer.value);
                        formData.append('tipe_biaya', iTipeBiaya.value);
                        formData.append('jenis_properti', iJenisProperty.value);
                        formData.append('nama_rumah', iNamaRumah.value);
                        formData.append('lokasi', iLokasi.value);
                        formData.append('detail', iDetail.value);
                        formData.append('harga', iHarga.value);
                        formData.append('luas_tanah', iLuasTanah.value);
                        formData.append('luas_bangunan', iLuasBangunan.value);
                        formData.append('lantai', iLantai.value);
                        formData.append('kamar_tidur', iKamarTidur.value);
                        formData.append('kamar_mandi', iKamarMandi.value);
                        formData.append('dapur_bersih', iDapurBersih.value);
                        formData.append('dapur_kotor', iDapurKotor.value);
                        formData.append('taman', iTaman.value);
                        formData.append('arah_rumah', iArahRumah.value);
                        formData.append('listrik', iListrik.value);
                        formData.append('furniture', iFurniture.value);

                        const request = new XMLHttpRequest();
                        request.open('POST','{{ url('admin/web-component/input-rumah-dijual/add') }}');
                        request.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));

                        request.upload.onprogress = (e) => {
                            progress(e.lengthComputable, e.loaded, e.total);
                        };

                        request.onload = function () {
                            if (request.status >= 200 && request.status < 300) {
                                load(request.responseText);
                                console.log(request.responseText);
                                fetchData(setDisplayData);
                                Swal.fire({
                                    type: 'success',
                                    title: 'Tersimpan',
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                            } else {
                                error('gagal');
                            }
                        };

                        request.send(formData);

                        return {
                            abort: () => {
                                request.abort();

                                abort();
                            }
                        }
                    } else {

                    }
                }
            }
        });
        const uploadArea = document.getElementById('iGambar');
        const pond = FilePond.create( uploadArea );

        const sLister = new SlimSelect({
            select: '#iLister',
        });
        const sMarketer = new SlimSelect({
            select: '#iMarketer',
        });
        const sTipeBiaya = new SlimSelect({
            select: '#iTipeBiaya',
            data: [
                {text: 'Jual', value: 'jual'},
                {text: 'Sewa', value: 'sewa'},
            ]
        });
        const sJenisProperty = new SlimSelect({
            select: '#iJenisProperty',
        });

        let vID;

        const btnTambah = document.getElementById('btnAdd');
        const btnEditData = document.getElementById('btnEditData');
        const btnEditGambar = document.getElementById('btnEditGambar');
        const btnHide = document.getElementById('btnHide');
        const btnShow = document.getElementById('btnShow');
        const btnClose = document.getElementById('btnClose');

        const cardEditor = document.getElementById('cardEditor');
        const formData = document.getElementById('formData');

        const tableIndex = $('#tableIndex').DataTable({
            scrollX: true,
            "columns": [
                { "data": "lister" },
                { "data": "nama_rumah" },
                { "data": "lokasi" },
                { "data": "detail" },
                { "data": "harga" },
                { "data": "gambar" },
                {
                    "data": "status",
                    "render": function ( data, type, row, meta ) {
                        let status;
                        if (data === 1) {
                            status = 'Terjual';
                        } else {
                            status = 'Belum Terjual';
                        }
                        return status;
                    }
                },
            ],
        });
        $('#tableIndex tbody').on( 'click', 'tr', function () {
            let data = tableIndex.row( this ).data();
            // console.log(data);
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
                btnHide.setAttribute('disabled', true);
                btnEditData.setAttribute('disabled', true);
                btnEditGambar.setAttribute('disabled', true);
            } else {
                tableIndex.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');

                if (data.status === 0) {
                    btnHide.removeAttribute('hidden');
                    btnShow.setAttribute('hidden',true);
                } else {
                    btnShow.removeAttribute('hidden');
                    btnHide.setAttribute('hidden',true);
                }
                btnEditData.removeAttribute('disabled');
                btnEditGambar.removeAttribute('disabled');

                vID = data.id;
            }
        });

        function resetForm() {
            pond.removeFiles();
            iType.value = 'new';
            iNamaRumah.value = '';
            iLokasi.value = '';
            iDetail.value = '';
            iHarga.value = '';
            iLuasTanah.value = '';
            iLuasBangunan.value = '';
            iLantai.value = '';
            iKamarTidur.value = '';
            iKamarMandi.value = '';
            iDapurBersih.value = '';
            iDapurKotor.value = '';
            iTaman.value = '';
            iArahRumah.value = '';
            iListrik.value = '';
            iFurniture.value = '';
        }

        function serialize(data) {
            let result = '';
            for (let index in data) {
                result += index + '=' + data[index] + '&';
            }
            return result;
        }

        function kvAjax(url,data,functionTarget) {
            let xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    functionTarget(this.responseText);
                }
            };
            xhttp.open("POST", url, true);
            xhttp.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(data);
        }

        function setDisplayData(response) {
            // console.log(response);
            let data = JSON.parse(response);
            tableIndex.clear().draw();
            tableIndex.rows.add(data).draw();
        }

        function setSelectLister(response) {
            // console.log(response);
            let data = JSON.parse(response);
            sLister.setData(data);
        }

        function setSelectMarketer(response) {
            // console.log(response);
            let data = JSON.parse(response);
            sLister.setData(data);
        }

        function fetchData(functionTarget) {
            kvAjax('{{ url('admin/web-component/input-rumah-dijual/list') }}','',functionTarget);
        }

        function rumahTerjual(response) {
            if (response === 'success') {
                fetchData(setDisplayData);

                Swal.fire({
                    type: 'success',
                    title: 'Tersimpan',
                    showConfirmButton: false,
                    timer: 2000
                })
            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Silahkan coba kembali',
                    showConfirmButton: false,
                    timer: 2000
                })
            }
        }

        function cSubmit(response) {
            // console.log(response);
            if (response === 'success') {
                fetchData(setDisplayData);
                kvAjax('{{ url('admin/web-component/favorite-marketer/list-marketer') }}','',setSelectLister);
                Swal.fire({
                    type: 'success',
                    title: 'Tersimpan',
                    showConfirmButton: false,
                    timer: 2000
                })
            } else {
                console.log(response);
                Swal.fire({
                    type: 'error',
                    title: 'Silahkan coba kembali',
                    showConfirmButton: false,
                    timer: 2000
                })
            }
        }

        document.addEventListener('DOMContentLoaded', function (event) {
            fetchData(setDisplayData);
            {{--kvAjax('{{ url('admin/web-component/input-rumah-dijual/lister') }}','',setSelectLister);--}}

            btnTambah.addEventListener('click', function (e) {
                e.preventDefault();
                cardEditor.classList.remove('d-none');
                cardEditor.scrollIntoView();
            });

            btnEditData.addEventListener('click',function (e) {
                e.preventDefault();
                window.location.href = '{{ url('admin/web-component/input-rumah-dijual/edit-data') }}/'+vID;
            });

            btnEditGambar.addEventListener('click',function (e) {
                e.preventDefault();
                window.location.href = '{{ url('admin/web-component/input-rumah-dijual/edit-gambar') }}/'+vID;
            });

            btnHide.addEventListener('click', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: "Rumah ini tidak akan ditampilkan di halaman depan?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sembunyikan'
                }).then((result) => {
                    if (result.value) {
                        kvAjax('{{ url('admin/web-component/input-rumah-dijual/terjual') }}','id='+vID+'&status='+'1',rumahTerjual);
                    }
                });
            });

            btnShow.addEventListener('click', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: "Rumah ini akan ditampilkan di halaman depan?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Tampilkan'
                }).then((result) => {
                    if (result.value) {
                        kvAjax('{{ url('admin/web-component/input-rumah-dijual/terjual') }}','id='+vID+'&status='+'0',rumahTerjual);
                    }
                });
            });

            btnClose.addEventListener('click', function (e) {
                e.preventDefault();
                window.scrollTo(0,0);
                cardEditor.classList.add('d-none');
            });

            formData.addEventListener('submit', function (e) {
                e.preventDefault();

                pond.processFile().then(file => {
                    console.log('file processed');
                    resetForm();
                });
            })
        })
    </script>
@endsection
