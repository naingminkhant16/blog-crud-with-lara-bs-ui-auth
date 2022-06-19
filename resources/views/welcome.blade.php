@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="border p-5 bg-white">
                <h1 class="">Welcome To Blogs</h1>
                @auth
                <a href="{{route('blog.index')}}" class="btn btn-primary">To Blogs</a>
                @endauth
                @guest
                <h2>Please Login To see BLogs</h2>
                @endguest
            </div>
        </div>
    </div>
</div>
@endsection