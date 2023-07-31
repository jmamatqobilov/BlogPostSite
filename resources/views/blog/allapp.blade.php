@extends('index')
@section('application')

<div class="bg-primary">
    @foreach ($applications as $item)
        <div class="">
            {{$item->message}}  
            {{$item->subject}}
        </div>
    @endforeach
</div>
@endsection

