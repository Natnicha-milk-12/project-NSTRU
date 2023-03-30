@extends('layouts.layouts-user')

@section('title')
    เพิ่มหมวดหมู่เหตุการณ์
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Add Category</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('create') }}" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="">ชื่อหมวดหมู่ :</label>
                                <input type="text" name="categors_name" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">สถานะการใช้งาน : </label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                    name="status">
                                    <option selected>--สถานะการใช้งาน--</option>
                                    <option value="เปิด">เปิด</option>
                                    <option value="ปิด">ปิด</option>

                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Save Category</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
@endsection
