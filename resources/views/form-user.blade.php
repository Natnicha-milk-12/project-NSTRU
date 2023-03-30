@extends('layouts.layouts-user')

@section('title')
    บันทึกเหตุการณ์
@endsection


@section('content')
    <div class="card d-flex justify-content-center mx-auto  ">
        <div class="card-body">
            <h3>ข้อมูลเหตุการณ์</h3>
            <hr>
            <form action="#" method="get" enctype="multipart/form-data">

                <div class="row mb-4 needs-validation">
                    <div class="col-sm-6">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example1">ชื่อเหตุการณ์</label>
                            <input type="text" id="form6Example1" class="form-control" required="" />
                        </div>

                    </div>

                    <div class="col-sm-6">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example1">หมวดหมู่เหตุการณ์</label>
                            <select class="form-control" name="categors" id="category">
                                <option hidden>กรุณาเลือกหมวดมู่เหตุการณ์</option>
                                @foreach ($data as $categors)
                                    <option value="{{ $categors->id }}">{{ $categors->categors_name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="col-sm-6 py-2">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example2">สถานที่</label>
                            <input type="text" id="form6Example2" class="form-control" required="" />
                        </div>
                    </div>
                    <div class="col-sm-6 py-2">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example2">วันที่เกิดเหตุการณ์</label>
                            <input type="date" id="form6Example2" class="form-control" required="" />
                        </div>
                    </div>
                    <div class="col-sm-6 py-2">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example2">เวลา(เริ่ม)</label>
                            <input type="time" id="form6Example2" class="form-control" required="" />
                        </div>
                    </div>
                    <div class="col-sm-6 py-2">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example2">เวลา(สิ้นสุด)</label>
                            <input type="time" id="form6Example2" class="form-control" required="" />
                        </div>
                    </div>


                    <div class="col-sm-12 py-2">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example2">รายละเอียด</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required=""></textarea>
                        </div>
                    </div>

                    <div class="col-sm-12 py-2">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example2">ผลกระทบ/ความเสียหาย</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required=""></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 py-2">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example2">วิธีการแก้ไขปัญหา</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" required=""></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 py-2">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example2">ผู้ติดตาม</label>
                            <select class="selectpicker" multiple data-live-search="true">
                                @foreach ($user as $users)
                                    <option value="{{ $users->id }}">{{ $users->name }}</option>
                                @endforeach
                            </select>



                            {{-- <input type="text" id="form6Example2" class="form-control" required="" /> --}}

                        </div>
                    </div>
                    <div class="col-sm-12 py-2">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example2">เพิ่มภาพเหตุการณ์</label>
                            <div class="field">
                                <input type="file" id="files" name="files[]" multiple />
                            </div>


                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary btn-block mb-4">บันทึกเหตุการณ์</button>
            </form>
            {{-- <form action="{{ url('add-remove-multiple-input-fields') }}" method="POST">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
                <table class="table table-bordered" id="dynamicAddRemove">
                    <tr>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="moreFields[0][title]" placeholder="Enter title"
                                class="form-control" /></td>
                        <td><button type="button" name="add" id="add-btn" class="btn btn-success">Add
                                More</button></td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-success">Save</button>
            </form> --}}

        </div>
    </div>
@endsection


@section('script')
    <script src="https://transloadit.edgly.net/releases/uppy/v1.6.0/uppy.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
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
                            $("<span class=\"pip\">" +
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
