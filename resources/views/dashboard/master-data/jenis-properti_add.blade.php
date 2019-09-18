@extends('dashboard.layout')

@section('page title','MASTER DATA Jenis Properti - ADD')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg">

                    <div class="card card-primary card-outline">
                        <form id="formData">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="jenisProperti" class="col-sm-2 col-form-label">Jenis Properti</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="jenis_properti" id="jenisProperti">
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-8"></div>
                                    <div class="col-lg-2 mt-2 mt-sm-0">
                                        <button type="button" class="btn btn-block btn-warning" id="btnCancel">Cancel</button>
                                    </div>
                                    <div class="col-lg-2 mt-2 mt-sm-0">
                                        <button type="submit" class="btn btn-block btn-primary" id="btnSimpan">Simpan</button>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        const formData = document.getElementById('formData');
        const btnCancel = document.getElementById('btnCancel');

        $(document).ready(function () {
            /*
            Button Action
             */
            btnCancel.addEventListener('click',function (e) {
                e.preventDefault();
                window.location.href = '{{ url('admin/master-data/jenis-properti') }}';
            });
            formData.addEventListener('submit',function (e) {
                e.preventDefault();
                console.log();
                $.ajax({
                    url: '{{ url('admin/master-data/jenis-properti/add/submit') }}',
                    method: 'post',
                    data: $('#formData').serialize(),
                    success: function (response) {
                        if (response === 'success') {
                            Swal.fire({
                                type: 'success',
                                title: 'Tersimpan',
                                onClose: function () {
                                    window.location.href = '{{ url('admin/master-data/jenis-properti') }}';
                                }
                            });
                        } else {
                            console.log(response);
                            Swal.fire({
                                type: 'error',
                                title: 'Gagal Tersimpan!',
                                text: 'Silahkan coba lagi!',
                            });
                        }
                    }
                })
            });
        });
    </script>
@endsection
