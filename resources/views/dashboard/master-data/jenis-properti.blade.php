@extends('dashboard.layout')

@section('page title','MASTER DATA Lister')

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
                                    <th>ID</th>
                                    <th>Jenis Properti</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($info as $i)
                                    <tr>
                                        <td>{{ $i->id }}</td>
                                        <td>{{ $i->name }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-6"></div>
                                <div class="col-lg-2 mt-2 mt-sm-0">
                                    <button type="button" class="btn btn-block btn-outline-danger" id="btnHapus" disabled>Hapus</button>
                                </div>
                                <div class="col-lg-2 mt-2 mt-sm-0">
                                    <button type="button" class="btn btn-block btn-warning" id="btnEdit" disabled>Edit</button>
                                </div>
                                <div class="col-lg-2 mt-2 mt-sm-0">
                                    <button type="button" class="btn btn-block btn-primary" id="btnBaru">Baru</button>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        const btnHapus = document.getElementById('btnHapus');
        const btnEdit = document.getElementById('btnEdit');
        const btnBaru = document.getElementById('btnBaru');

        let vID, vName;

        const tableIndex = $('#tableIndex').DataTable({
            "columns": [
                { "data": "id" },
                { "data": "name" },
            ],
        });
        $('#tableIndex tbody').on( 'click', 'tr', function () {
            let data = tableIndex.row( this ).data();
            console.log(data);
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
                btnEdit.attr('disabled','true');
                btnHapus.attr('disabled','true');
            } else {
                tableIndex.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
                btnEdit.removeAttribute('disabled');
                btnHapus.removeAttribute('disabled');

                vID = data.id;
                vName = data.name;
            }
        });

        $(document).ready(function () {
            /*
            Button Action
             */
            btnBaru.addEventListener('click',function (e) {
                e.preventDefault();
                window.location.href = '{{ url('admin/master-data/jenis-properti/add') }}';
            });
            btnEdit.addEventListener('click',function (e) {
                e.preventDefault();
                window.location.href = '{{ url('admin/master-data/jenis-properti/edit') }}/'+vID;
            });
            btnHapus.addEventListener('click',function (e) {
                e.preventDefault();
                Swal.fire({
                    title: vName+" akan dihapus",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus Data'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: '{{ url('admin/master-data/jenis-properti/delete') }}',
                            method: 'post',
                            data: {id: vID},
                            success: function (response) {
                                console.log(response);
                                if (response === 'success') {
                                    Swal.fire({
                                        title: 'Data terhapus!',
                                        type: 'success',
                                        onClose: function () {
                                            window.location.reload();
                                        }
                                    })
                                } else {
                                    console.log(response);
                                    Swal.fire({
                                        title: 'Gagal',
                                        text: 'Silahkan coba lagi',
                                        type: 'error',
                                    })
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
