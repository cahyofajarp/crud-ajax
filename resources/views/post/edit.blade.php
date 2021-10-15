@extends('layouts.app')

@section('content')
<section class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h5>Update Post</h5>
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
            <form action="{{ route('post.update',$post) }}" method="post">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" value="{{ old('title',$post->title) }}" class="form-control" placeholder="Title Post">
                </div>
                <div class="form-group">
                    <label for="">Post Content</label>
                    <textarea name="post_content" value="" class="form-control" placeholder="Post Content">{{ old('post_content',$post->post_content) }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">UDPATE</button>
            </form>
        </div>
    </div>
</section>
@endsection