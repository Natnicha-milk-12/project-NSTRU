@extends('layouts.layouts-user')

@section('title')
    จัดการหมวดหมู่เหตุการณ์
@endsection


@section('content')
    <div class="card d-flex justify-content-center mx-auto  ">
        <div class="card-body">
            <form action="{{ url('cateory_1') }}" method="post">

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
                        <th>ชื่อหมวดหมู่</th>
                        <th>สถานะ</th>
                        <th>#</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="moreFields[0][categors_name]" placeholder="Enter categors name"
                                class="form-control" />
                        </td>
                        <td><input type="text" name="moreFields[0][status]" placeholder="Enter status"
                                class="form-control" />
                        </td>
                        <td><button type="button" name="add" id="add-btn" class="btn btn-success">Add</button>
                        </td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-success">Save</button>

            </form>


        </div>
    </div>
@endsection


@section('script')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script type="text/javascript">
        var i = 0;
        $("#add-btn").click(function() {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><input type="text" name="moreFields[' + i +
                '][categors_name]" placeholder="Enter categors name" class="form-control" /></td><td><input type="text" name="moreFields[' +
                i +
                '][status]" placeholder="Enter title" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });
    </script>
@endsection
