@extends('layouts.layouts-user')

@section('title')
    แก้ไขหมวดหมู่เหตุการณ์
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>แก้ไข
                            <a href="{{ url('category_index') }}" class="btn btn-danger float-end">ย้อนกลับ</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('update-category/' . $cg->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="">ชื่อหมวดหมู่ :</label>
                                <input type="text" name="categors_name" value="{{ $cg->categors_name }}"
                                    class="form-control">
                            </div>
                            {{-- <div class="form-group mb-3">

                                <label for="">{{ $cg->status }}</label>
                            </div> --}}
                            <div class="form-group mb-3">
                                {{-- <h3>สถานะปัจจุบัน : {{ $cg->status }}</h3> --}}
                                <label>สถานะปัจจุบัน : {{ $cg->status }}</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                    name="status">
                                    <option selected>{{ $cg->status }}</option>
                                    <option value="เปิด">เปิด</option>
                                    <option value="ปิด">ปิด</option>

                                </select>
                                {{-- <input type="text" name="status" value="{{ $cg->status }}" class="form-control"> --}}
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">อัพเดทหมวดหมู่</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
