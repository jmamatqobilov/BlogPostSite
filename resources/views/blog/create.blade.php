@extends('index')
@section('application')
    <div class="container">
        <div class="row pt-5">
            <div class="col-8 offset-2">
                <form action="{{ route('application-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="sub">Subject</label>
                    <input class="form-control" type="text" name="subject"><br>
                    <label for="sub">Message</label>
                    <input class="form-control" type="text" name="message"><br>

                    <label for="sub">Image</label>
                    <input class="form-control" type="file" name="file_img"><br>
                    <button class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection