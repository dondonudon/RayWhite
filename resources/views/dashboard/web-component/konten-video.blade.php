@extends('dashboard.layout')

@section('page title','WEB Component Konten Video')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg">

                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <table class="table table-sm table-bordered display nowrap" id="tableIndex" style="width: 100%;">
                                <thead class="bg-dark">
                                <tr>
                                    <th style="width: 30%">Judul</th>
                                    <th style="width: 50%">URL</th>
                                    <th style="width: 20%">Username</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-2">
                                    <button type="button" class="btn btn-block btn-outline-danger btn-sm" id="btnDelete" disabled>
                                        <i class="fas fa-times"></i> Delete
                                    </button>
                                </div>
                                <div class="col-lg-8"></div>
                                <div class="col-lg-2 mt-2 mt-sm-0">
                                    <button type="button" class="btn btn-block btn-primary btn-sm" id="btnAdd">
                                        <i class="fas fa-plus"></i> Tambah
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('script')
    <script>
        const iType = document.getElementById('iType');
        const iJudul = document.getElementById('iJudul');

        let vID;

        const btnTambah = document.getElementById('btnAdd');
        const btnDelete = $('#btnDelete');

        const tableIndex = $('#tableIndex').DataTable({
            scrollX: true,
            "columns": [
                { "data": "judul" },
                { "data": "url" },
                { "data": "username" },
            ],
        });
        $('#tableIndex tbody').on( 'click', 'tr', function () {
            let data = tableIndex.row( this ).data();
            // console.log(data);
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
                btnDelete.attr('disabled',true);
            } else {
                tableIndex.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
                btnDelete.removeAttr('disabled');

                vID = data.id;
            }
        });

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
            kvAjax('{{ url('admin/web-component/konten-video/list') }}','',functionTarget);
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
            fetchData(setDisplayData);

            btnTambah.addEventListener('click', function (e) {
                e.preventDefault();
                window.location.href = '{{ url('admin/web-component/konten-video/add') }}';
            });

            btnDelete.click(function (e) {
                e.preventDefault();
                Swal.fire({
                    title: "Hapus video ini?",
                    text: "Anda tidak dapat mengembalikan video ini jika telah terhapus.",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus Video'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: '{{ url('admin/web-component/konten-video/delete') }}',
                            method: 'post',
                            data: {id: vID},
                            success: function (response) {
                                if (response === 'success') {
                                    Swal.fire({
                                        title: "Video Terhapus",
                                        type: 'success',
                                        onClose: function () {
                                            fetchData(setDisplayData);
                                        }
                                    });
                                } else {
                                    console.log(response);
                                    Swal.fire({
                                        title: "Gagal dihapus!",
                                        text: "Silahkan coba lagi atau hubungi WAVE Solusi Indonesia",
                                        type: 'error'
                                    });
                                }
                            }
                        });
                    }
                });
            })
        })
    </script>
@endsection
