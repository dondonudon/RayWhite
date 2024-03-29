@extends('dashboard.layout')

@section('page title','WEB Component Image Slider')

@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg text-right">
                    <button class="btn btn-success" id="btnUpload">Upload Gambar</button>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg">

                    <div class="row justify-content-md-center" id="contentArea"></div>

                    <div id="cardComponent" class="card card-success card-outline d-none">
                        <div class="card-header">
                            <h3 class="card-title">UPLOAD Image</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-sm btn-light" id="btnClose">
                                    <i class="fas fa-times" style="color: red;"></i>
                                </button>
                            </div>
                        </div>
                        @csrf
                        <div class="card-body">
                            <input type="hidden" name="section" value="about-us" readonly>

                            <div class="row">
                                <div class="col-lg-12">
                                    <input id="cardUpload_uploadFile" type="file">
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

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/filepond-master/filepond.css') }}">
@endsection

@section('script')
    <script src="{{ asset('vendor/filepond-master/filepond.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        const editorContainer = document.getElementById('inputText');
        const uploadArea = document.getElementById('cardUpload_uploadFile');

        const btnClose = $('#btnClose');
        const btnUpload = $('#btnUpload');

        const contentArea = $('#contentArea');
        const cardComponent = $('#cardComponent');

        function reloadForm() {
            $.ajax({
                url: '{{ url('admin/web-component/quote-of-the-day/list') }}',
                method: 'post',
                success: function (response) {
                    // console.log(response);
                }
            })
        }

        function reloadData() {
            let domain = '{{ url('/') }}';
            $.ajax({
                url: '{{ url('admin/web-component/image-slider/list') }}',
                method: 'post',
                success: function (response) {
                    let html = '';
                    // console.log(response);
                    let data = JSON.parse(response);
                    data.forEach(function (v,i) {
                        html += '<div class="col-lg-4">' +
                            '<div class="card">' +
                            '<img src="{{ url('/storage') }}/'+v['filename']+'" class="card-img-top" alt="header" style="width: auto; height: 250px;">' +
                            '<div class="card-footer">' +
                            '<button type="submit" class="btn btn-block btn-outline-danger" onclick="deleteImage(\''+v['id']+'\')">Delete</button>' +
                            '</div></div></div>';
                    });
                    contentArea.html(html);
                }
            })
        }

        function deleteImage(id) {
            // console.log(id);
            Swal.fire({
                title: "Yakin akan menghapus gambar tersebut?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus Data'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: '{{ url('admin/web-component/image-slider/delete') }}',
                        method: 'post',
                        data: {id: id},
                        success: function (response) {
                            if (response === 'success') {
                                reloadData();
                                Swal.fire({
                                    title: 'Terhapus',
                                    type: 'success',
                                });
                            } else {
                                Swal.fire({
                                    title: 'Gagal',
                                    text: 'Silahkan coba lagi',
                                    type: 'error',
                                });
                            }
                        }
                    });
                }
            });
        }

        $(document).ready(function () {
            reloadData();

            FilePond.create( uploadArea );
            FilePond.setOptions({
                allowImageTransform: true,
                allowImageResize: true,
                imageResizeMode: 'cover',
                imageResizeTargetHeight: 700,
                imageResizeTargetWidth: 1200,
                imageTransformOutputMimeType: 'image/jpeg',
                allowMultiple: true,
                allowDrop: true,
                // instantUpload: false,
                server: {
                    process: (fieldName, file, metadata, load, error, progress, abort) => {
                        const formData = new FormData();
                        formData.append(fieldName, file, file.name);

                        const request = new XMLHttpRequest();
                        request.open('POST','{{ url('admin/web-component/image-slider/upload') }}');
                        request.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));

                        request.upload.onprogress = (e) => {
                            progress(e.lengthComputable, e.loaded, e.total);
                        };

                        request.onload = function () {
                            if (request.status >= 200 && request.status < 300) {
                                load(request.responseText);
                                console.log(request.responseText);
                                reloadData();
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
                    }
                }
            });

            btnUpload.click(function (e) {
                e.preventDefault();
                cardComponent.removeClass('d-none');
                $('html, body').animate({
                    scrollTop: cardComponent.offset().top
                }, 500);
            });
            btnClose.click(function (e) {
                e.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, 500, function () {
                    reloadData();
                    cardComponent.addClass('d-none');
                });
            });

        });
    </script>
@endsection
