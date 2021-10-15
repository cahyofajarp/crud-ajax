@extends('layouts.app')

@section('content')
<section class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h5>Create Post</h5>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('post.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title"  value="{{ old('title') }}" class="form-control" placeholder="Title Post">
                </div>
                <div class="form-group">
                    <label for="">Post Content</label>
                    <textarea name="post_content" value="{{ old('post_content') }}" class="form-control" placeholder="Post Content"></textarea>
                </div>
                
                <button type="submit" class="btn btn-success">CREATE</button>
            </form>
        </div>
    </div>
</section>
@endsection