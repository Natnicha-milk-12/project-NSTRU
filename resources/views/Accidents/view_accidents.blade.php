@extends('layouts.layouts-user')

@section('title')
    บันทึกเหตุการณ์
@endsection


@section('content')

    <div class="card d-flex justify-content-center mx-auto  ">
        <div class="card-body">
            <h1 class="mb-0b" style=" color:#1442cb;">
                รายละเอียดเหตุการณ์
            </h1>
            <hr>


            <form action="/update_accidents/{{ $viewaccident[0]->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row mb-4 needs-validation">
                    <div class="col-sm-6 py-2">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example1" style="font-size: 20px ">ชื่อเหตุการณ์ : </label>
                            <label class="form-label" for="form6Example1"
                                style="font-size: 20px; color: #0d6efd; ">{{ $viewaccident[0]->accidents_name }}</label>

                        </div>

                    </div>

                    <div class="col-sm-6 py-2">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example1" style="font-size: 20px ">ชื่อหมวดหมู่ : </label>
                            <label class="form-label" for="form6Example1"
                                style="font-size: 20px; color: #0d6efd; ">{{ $viewaccident[0]->accidents_categors_name }}</label>

                        </div>

                    </div>
                    <div class="col-sm-6 py-2">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example1" style="font-size: 20px ">สถานที่ : </label>
                            <label class="form-label" for="form6Example1"
                                style="font-size: 20px; color: #0d6efd; ">{{ $viewaccident[0]->location }}</label>

                        </div>

                    </div>

                    <div class="col-sm-6 py-2">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example1" style="font-size: 20px ">วันที่เกิดเหตุการณ์:
                            </label>
                            <label class="form-label" for="form6Example1"
                                style="font-size: 20px; color: #0d6efd; ">{{ $viewaccident[0]->accidents_date }}</label>

                        </div>

                    </div>
                    <div class="col-sm-6 py-2">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example1" style="font-size: 20px ">เวลา(เริ่ม): </label>
                            <label class="form-label" for="form6Example1"
                                style="font-size: 20px; color: #0d6efd; ">{{ $viewaccident[0]->accidents_time_start }}</label>

                        </div>

                    </div>
                    <div class="col-sm-6 py-2">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example1" style="font-size: 20px ">เวลา(สิ้นสุด): </label>
                            <label class="form-label" for="form6Example1"
                                style="font-size: 20px; color: #0d6efd; ">{{ $viewaccident[0]->accidents_time_end }}</label>

                        </div>

                    </div>
                    <div class="col-sm-12 py-2">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example1" style="font-size: 20px ">รายละเอียด: </label>
                            <label class="form-label" for="form6Example1"
                                style="font-size: 20px; color: #0d6efd; ">{{ $viewaccident[0]->details }}</label>

                        </div>

                    </div>

                    <div class="col-sm-12 py-2">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example1" style="font-size: 20px ">ผลกระทบ/ความเสียหาย:
                            </label>
                            <label class="form-label" for="form6Example1"
                                style="font-size: 20px; color: #0d6efd; ">{{ $viewaccident[0]->effect }}</label>

                        </div>
                    </div>


                    <div class="col-sm-12 py-2">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example1" style="font-size: 20px ">วิธีการแก้ไขปัญหา:
                            </label>
                            <label class="form-label" for="form6Example1"
                                style="font-size: 20px; color: #0d6efd; ">{{ $viewaccident[0]->solutions }}</label>

                        </div>
                    </div>
                    <div class="col-sm-12 py-2">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example1" style="font-size: 20px ">ผู้ติดตาม :
                            </label>
                            <label class="form-label" for="form6Example1"
                                style="font-size: 20px; color: #0d6efd; ">{{ $viewaccident[0]->follower_name }}</label>

                        </div>
                    </div>

            </form>
            <div class="row mb-4 needs-validation">
                <div class="col-lg-4 py-2">

                    @if ($viewaccident[0]->image_id != null)
                        <label class="form-label" for="form6Example1" style="font-size: 20px ">รูปภาพเหตุการณ์ :
                        </label>

                        @foreach ($viewaccident as $img)
                            <form action="/deleteimage/{{ $img->image_id }}" method="post">
                            </form>
                            <img src="/images/{{ $img->image }}" class="img-responsive"
                                style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>


@endsection


@section('script')
    <script src="https://transloadit.edgly.net/releases/uppy/v1.6.0/uppy.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>



    <script>
        $(document).ready(function() {
            if (window.File && window.FileList && window.FileReader) {
                $("#files").on("change", function(e) {
                    var files = e.target.files,
                        filesLength = files.length;
                    for (var i = 0; i < filesLength; i++) {
                        var f = files[i]
                        var fileReader = new FileReader();
                        fileReader.onload = (function(e) {
                            var file = e.target;
                            $("<span name="
                                " class=\"pip\">" +
                                "<img class=\"imageThumb\" src=\"" + e.target.result +
                                "\" title=\"" + file.name + "\"/>" +
                                "<br/><span class=\"remove\">Remove image</span>" +
                                "</span>").insertAfter("#files");
                            $(".remove").click(function() {
                                $(this).parent(".pip").remove();
                            });

                            // Old code here
                            /*$("<img></img>", {
                              class: "imageThumb",
                              src: e.target.result,
                              title: file.name + " | Click to remove"
                            }).insertAfter("#files").click(function(){$(this).remove();});*/

                        });
                        fileReader.readAsDataURL(f);
                    }
                    console.log(files);
                });
            } else {
                alert("Your browser doesn't support to File API")
            }
        });
    </script>

    <script type="text/javascript">
        var i = 0;
        $("#add-btn").click(function() {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><input type="text" name="moreFields[' + i +
                '][title]" placeholder="Enter title" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });
    </script>
@endsection
