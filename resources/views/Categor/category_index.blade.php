@extends('layouts.layouts-user')

@section('title')
    จัดการหมวดหมู่เหตุการณ์
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>จัดการหมวดหมู่เหตุการณ์
                            <a href="{{ url('create') }}" class="btn btn-primary float-end">เพิ่มหมวดหมู่</a>
                        </h4>
                    </div>
                    <div class="card-body table-responsive">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ชื่อหมวดหมู่</th>
                                    <th>สถานะปัจจุบัน</th>
                                    <th>แก้ไข</th>
                                    <th>ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ct as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->categors_name }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            <a href="{{ url('edit-category/' . $item->id) }}"
                                                class="btn btn-primary btn-sm">แก้ไข</a>
                                            {{-- <form method="post" action="{{ url('delete/' . $item->id) }}">
                                                @csrf
                                                @method('delete')

                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form> --}}
                                        </td>
                                        <td>
                                            <form action="{{ url('delete-category/' . $item->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-outline-danger"
                                                    onclick="return confirm('Are you sure?');" type="submit">ลบ</button>

                                            </form>
                                            {{-- <a href="{{ url('delete/' . $item->id) }}" class="btn btn-primary btn-sm">ลบ</a> --}}
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
@endsection
