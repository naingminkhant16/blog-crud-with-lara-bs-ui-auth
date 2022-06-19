@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <h4 class="mb-0">Hola,write a new blog?...</h4>
                            <p class="text-black-50 mb-0">What's on your mind today?</p>
                        </div>
                        <div class="">
                            <a href="{{route('blog.create')}}" class="text-dark">
                                <i class="bi bi-plus-square fs-2 me-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex mb-3">
                <form method="GET" action="{{route('blog.index')}}" class="input-group bg-white">
                    <input type="text" name="search" class="form-control bg-white" placeholder="Search Blog...">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="bi bi-search"></i></button>
                </form>
            </div>
            <div class="">
                @if (session('status'))
                <div class="alert alert-info">{{session('status')}}</div>
                @endif
                @foreach ($blogs as $blog)
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
                        {{-- <img src="{{asset('storage/'.$blog->image)}}" class="img-fluid mb-3" alt="blog-image"> --}}
                        <div class="card-text text-black-50 mb-3">{{Str::words($blog->body,50)}}</div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="small text-black-50">
                                Written By - {{$blog->user->name}}
                            </div>
                            <div class="">
                                <a href="{{route('blog.show',$blog->id)}}" class="me-2 text-dark">
                                    <i class="bi bi-chevron-double-right fw-bold"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="">
                {{$blogs->links()}}
            </div>
        </div>
    </div>
</div>
@endsection