@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <dov class="col-lg-6">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <h4 class="mb-0">Blog Details</h4>
                            <p class="text-black-50 mb-0">I hope you like the blog.</p>
                        </div>
                        <div class="">
                            <a href="{{route('blog.index')}}" class="btn btn-outline-dark">
                                Home</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <h4 class="card-title mb-0">
                                {{$blog->title}}
                            </h4>
                            <small class="text-black-50">
                                {{$blog->created_at->diffForHumans()}}
                            </small>
                        </div>
                        @if (Auth::user()->id == $blog->user->id)
                        <div class="">
                            <div class="dropdown">
                                <i class="bi bi-three-dots-vertical fs-4" type='button' id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown"></i>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item text-dark"
                                            href="{{route('blog.edit',$blog->id)}}">Edit</a>
                                    </li>
                                    <li>
                                        <form class="dropdown-item d-inline-block m-0 px-2 py-0"
                                            action="{{route('blog.destroy',$blog->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="text-danger m-0 bg-transparent border-0"
                                                type="submit">Delete</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endif
                    </div>
                    <hr>
                    <div class="text-black-50 mb-1"> Written By - {{$blog->user->name}} </div>
                    <div class="card-text text-black mb-3">{{$blog->body}}</div>
                </div>
            </div>
        </dov>
    </div>
</div>
@endsection