@extends('index')
@section('application')
<div class="container-fluid px-5">


    <div class="row">
        <div class="col-2">
            <div class="card bg-light" style="height:100vh;position:sticky;top:0">
                <div class="card-header text-center">
                    Breaking news
                </div>
                <div class="card-body">
                    <a href="{{route('application-create')}}" class="btn btn-primary w-100">
                        Post yaratish
                    </a>
                </div>

            </div>
        </div>
        <div class="col-8">
            @foreach($posts as $post)
            <div class="col-12">
                <div class="card card-blog" id="collapse">
                    <div class="card-image">
                        <a href="#" style="height:200px !important;overflow:hidden">

                            <img style="height:300px" class="img" src="
                                @if($post->file_img) 
                                {{asset('images/' . $post->file_img)}} 
                                @else http://adamthemes.com/demo/code/cards/images/blog01.jpeg 
                                @endif">
                        </a>
                        <div class="ripple-cont"></div>
                    </div>
                    <div class="table">
                        <div class="d-flex align-items-center justify-content-end">
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                data-bs-target="#commentCreate{{$post->id}}" aria-expanded="false"
                                aria-controls="commentCreate">
                                Leave comment
                            </button>
                            {{-- <h6 class="category text-warnig"><i class="fa fa-university"></i> Law</h6> --}}
                            {{-- @if (Auth::user()->can('update', $post)) --}}
                            <a class="btn btn-sm btn-warning" href="{{route('application-edit', ['id' => $post->id])}}">
                                Edit
                            </a>
                            {{-- @else
                            <a class="btn btn-sm bg-light" href="{{route('application-edit', ['id' => $post->id])}}">
                                Edit
                            </a>
                            @endif --}}
                            <form action="{{route('application-delete', ['id' => $post->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>
                        </div>
                        <div class=""></div>

                        <h4 class="card-caption">
                            <a href="#">
                                {{ $post->subject }}
                            </a>
                        </h4>
                        <p class="card-description">
                            {{ $post->message }}
                        </p>

                        <span>Comments</span>
                        <div class="">
                            @foreach($post->comments as $key => $comment)
                            <li>{{$key}}:{{$comment->body}}</li>
                            @endforeach
                        </div>
                        <div class="collapse w-100" id="commentCreate{{$post->id}}">
                            <form action="{{route('commentstore')}}" method="POST">
                                @csrf
                                @method('post')
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <input type="text" name="body" class="form-control" id="">
                                        <input type="text" name="application_id" class="d-none" value="{{$post->id}}"
                                            id="">
                                    </div>
                                    <div class="col-4">
                                        <button class="btn btn-sm btn-primary" type="submit">Saqlash</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="ftr">
                            <div class="author">
                                <a href="#"> <img src="http://adamthemes.com/demo/code/cards/images/avatar3.png"
                                        alt="..." class="avatar img-raised"> <span>{{$post->name}}</span> </a>
                            </div>
                            <div class="stats"> <i class="fa fa-clock-o"></i>{{date('M-d:H:m',
                                strtotime($post->created_at))}}</div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-2">
            <div class="card bg-light" style="height:100vh;position:sticky;top:0">
                <div class="card-header text-center">
                    Breaking news
                </div>
                <div class="d-flex">
                    <div class="mx-2">
                        Top comment
                    </div>
                    <div class="">
                        7
                    </div>
                </div>
                <div class="d-flex">
                    <div class="mx-2">
                        Top post
                    </div>
                    <div class="">
                        {{}}
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Add Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Edit Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Delete Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection