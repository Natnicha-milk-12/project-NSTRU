@extends('layouts.layouts-user')

@section('title')
    บันทึกเหตุการณ์
@endsection


@section('content')
    @if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif
    <div class="card d-flex justify-content-center mx-auto  ">
        <div class="card-body">
            <h3>ข้อมูลเหตุการณ์</h3>
            <hr>

            <form action="/update_accidents/{{ $editaccident[0]->accidents_id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row mb-4 needs-validation">

                    <div class="col-sm-6">
                        <div class="form-outline">
                            <label class="form-label"
                                for="form6Example1">ชื่อเหตุการณ์</label>
                            <input type="text" name="accidents_name" id="form6Example1" class="form-control"
                                required="" value="{{ $editaccident[0]->accidents_name }}" />
                        </div>

                    </div>

                    <div class="col-sm-6">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example1">หมวดหมู่เหตุการณ์</label>
                            <select class="form-control" name="accidents_categors_name" id="category">
                                <option hidden>{{ $editaccident[0]->accidents_categors_name }}</option>
                                @foreach ($data as $categors)
                                    <option value="{{ $categors->categors_name }}">{{ $categors->categors_name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="col-sm-6 py-2">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example2">สถานที่</label>
                            <input type="text" name="location" id="form6Example2" class="form-control" required=""
                                value="{{ $editaccident[0]->location }}" />
                        </div>
                    </div>
                    <div class="col-sm-6 py-2">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example2">วันที่เกิดเหตุการณ์</label>
                            <input type="date" name="accidents_date" id="form6Example2" class="form-control"
                                required="" value="{{ $editaccident[0]->accidents_date }}" />
                        </div>
                    </div>
                    <div class="col-sm-6 py-2">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example2">เวลา(เริ่ม)</label>
                            <input type="time" name="accidents_time_start" id="form6Example2" class="form-control"
                                required="" value="{{ $editaccident[0]->accidents_time_start }}" />
                        </div>
                    </div>
                    <div class="col-sm-6 py-2">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example2">เวลา(สิ้นสุด)</label>
                            <input type="time" name="accidents_time_end" id="form6Example2" class="form-control"
                                required="" value="{{ $editaccident[0]->accidents_time_end }}" />
                        </div>
                    </div>


                    <div class="col-sm-12 py-2">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example2">รายละเอียด</label>
                            <textarea class="form-control" name="details" id="exampleFormControlTextarea1" rows="3" required="">{{ $editaccident[0]->details }}</textarea>
                        </div>
                    </div>

                    <div class="col-sm-12 py-2">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example2">ผลกระทบ/ความเสียหาย</label>
                            <textarea class="form-control" name="effect" id="exampleFormControlTextarea1" rows="3" required="">{{ $editaccident[0]->effect }}</textarea>
                        </div>
                    </div>

                    <div class="col-sm-12 py-2">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example2">วิธีการแก้ไขปัญหา</label>
                            <textarea class="form-control" name="solutions" id="exampleFormControlTextarea1" rows="5" required="">{{ $editaccident[0]->solutions }}</textarea>
                        </div>
                    </div>

                    <div class="col-sm-12 py-2">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example2">ผู้ติดตาม</label>
                            <select class="selectpicker" data-live-search="true" name="follower_name">
                                <option hidden>{{ $editaccident[0]->follower_name }}</option>
                                @foreach ($user as $users)
                                    <option value="{{ $users->name }}">{{ $users->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12 py-2">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example2">เพิ่มภาพเหตุการณ์</label>
                            <div class="field">
                                {{-- <input type="file" id="files" name="files[]" multiple /> --}}
                                <input type="file" id="input-file-now-custom-3" class="form-control m-2"
                                    name="images[]">
                            </div>


                        </div>
                    </div>
                    <div class="col-sm-3 py-2">
                        <div class="form-outline">
                            <button type="submit" class="btn btn-primary btn-block mb-4">บันทึกเหตุการณ์</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>





    <div class="row mb-4 needs-validation">
        <div class="col-lg-3">

            @if ($editaccident[0]->image_id != null)
                <p>Images:</p>

                @foreach ($editaccident as $img)
                    <form action="/deleteimage/{{ $img->image_id }}" method="post">
                        <button class="btn text-danger">X</button>
                        @csrf
                        @method('delete')
                    </form>
                    <img src="/images/{{ $img->image }}" class="img-responsive"
                        style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                @endforeach
            @endif

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
