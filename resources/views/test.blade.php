@extends('layouts.layouts-user')

@section('title')
    ทดลอง
@endsection


@section('content')
    <div>
        <h3>Upload a Images</h3>
        <hr>
        <form enctype="multipart/form-data">
            {{ csrf_field() }}
            <div>
                <label>Name</label>
                <input type="text" name="name" placeholder="Enter Product Name">
                <label>Discription</label>
                <textarea name="description" rows="4">
    </textarea>
            </div>
            <div>
                <label>Choose Images</label>
                <input type="file" name="images" multiple>
            </div>
            <hr>
            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
