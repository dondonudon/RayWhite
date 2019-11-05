@extends('dashboard.layout')

@section('page title','WEB Component Konten Video')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg">

                    <div id="cardEditor" class="card card-success card-outline">

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
                                    <div class="col-lg">
                                        <div class="form-group">
                                            <label for="iJudul">Judul</label>
                                            <input class="form-control" id="iJudul" name="judul" maxlength="25">
                                        </div>

                                        <div class="form-group">
                                            <label for="iUrl">Url Youtube Video</label>
                                            <input class="form-control" id="iUrl" name="url">
                                            <small>on Youtube video, click share, choose embed video, copy paste just the url, like https://youtube.com/embed/Wl2OyaZVU3U</small>
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

@section('script')
    <script>
        const iJudul = document.getElementById('iJudul');
        const iUrl = document.getElementById('iUrl');

        const cardEditor = document.getElementById('cardEditor');
        const formData = $('#formData');

        const btnClose = document.getElementById('btnClose');

        function resetForm() {
            pond.removeFiles();
            iType.value = 'new';
            iJudul.value = '';
            iShortDesc.value = '';
            editor.setText('');
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
            // sLister.setData(data);
        }

        function fetchData(functionTarget) {
            kvAjax('{{ url('admin/web-component/aktivitas-kita/list') }}','',functionTarget);
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

        document.addEventListener('DOMContentLoaded', function (event) {
            btnClose.addEventListener('click', function (e) {
                e.preventDefault();
                window.history.back();
            });

            formData.submit(function (e) {
                e.preventDefault();

                $.ajax({
                    url: '{{ url('admin/web-component/konten-video/addSubmit') }}',
                    method: 'post',
                    data: $(this).serialize(),
                    success: function (response) {
                        if (response === 'success') {
                            Swal.fire({
                                title: "Tersimpan",
                                type: 'success',
                                onClose: function () {
                                    window.history.back();
                                }
                            });
                        } else {
                            console.log(response);
                            Swal.fire({
                                title: "Gagal Tersimpan!",
                                text: "Silahkan coba lagi atau hubungi WAVE Solusi Indonesia",
                                type: 'error',
                            });
                        }
                    }
                })
            })
        })
    </script>
@endsection
