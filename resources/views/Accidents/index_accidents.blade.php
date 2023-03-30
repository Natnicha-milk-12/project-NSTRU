@extends('layouts.layouts-user')

@section('title')
    บันทึกเหตุการณ์
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>บันทึกเหตุการณ์
                            <a href="{{ route('form_accidents') }}"
                                class="btn btn-outline-success float-end">เพิ่มเหตุการณ์</a>
                            <a href="{{ route('print_accidents') }}"
                                class="btn btn-outline-success float-end me-2">พิมพ์รายการ</a>
                        </h4>
                    </div>
                    <div class="card-body table-responsive">


                        <table class="table table-bordered table-striped" id="example" style="width:100%">
                            <thead>
                                <tr>

                                    <th>ชื่อเหตุการณ์</th>
                                    <th>วันที่เกิดเหตุการณ์</th>
                                    <th>สถานที่</th>
                                    <th>เวลา</th>
                                    <th>ดู</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($accidents as $post)
                                    <tr>

                                        <td>{{ $post->accidents_name }}</td>
                                        <td>{{ $post->accidents_date }}</td>
                                        <td>{{ $post->location }}</td>
                                        <td>{{ $post->accidents_time_start }}</td>
                                        <td><a href="view_accidents/{{ $post->id }}"
                                                class="btn btn-outline-primary">view</a></td>
                                        <td><a href="edit_accidents/{{ $post->id }}"
                                                class="btn btn-outline-primary">Update</a></td>
                                        <td>

                                            <form action="/delete/{{ $post->id }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-outline-danger"
                                                    onclick="return confirm('Are you sure?');"
                                                    type="submit">Delete</button>

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
