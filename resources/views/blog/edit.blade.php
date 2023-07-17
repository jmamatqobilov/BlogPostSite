@extends('index')
@section('application')
    <div class="container">
        <div class="row pt-5">
            <div class="col-8 offset-2">
                <form action="{{ route('application-update',['id'=> $post->id]) }}" method="post">
                    @csrf
                    @method('put')
                    <label for="sub">Subject</label>
                    <input class="form-control" type="text" name="subject" value="{{$post->subject}}"><br>
                    <label for="sub">Message</label>
                    <input class="form-control" type="text" name="message" value="{{$post->message}}"><br>
                    <button class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection