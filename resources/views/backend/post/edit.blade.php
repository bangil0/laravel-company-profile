@extends('layouts.template')

@section('content')
<div class="row">
    <div class="col-lg-12">
        {{ Form::open(['route' => ['backend.post.update', $post->id], 'method' => 'PUT', 'files' => true]) }}
        <div class="card">
            <div class="card-header">
                <a href="{{ route('backend.post.index') }}">
                    <button type="button" class="btn btn-primary">
                        <i class="fa fa-arrow-left"></i> Back
                    </button>
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-save"></i> Update
                </button>
            </div>
            <div class="card-body">
                @include('layouts._message')
                <div class="form-group">
                    <label>Post Category</label>
                    {!! Form::select('category_id', $category, $post->category_id, ["class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    <label>Post Name</label>
                    {!! Form::text('post_name', $post->post_name, ["class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    <label>Post Description</label>
                    {!! Form::textarea('post_description', $post->post_description, ["class" => "form-control", "rows" => 5]) !!}
                </div>
                <div class="form-group">
                    <label>Post Image</label>
                    {!! Form::file('file', ["class" => "form-control"]) !!}<br>
                    <div class="col-md-12 row"> 
                        @if(!empty($post->post_image) 
                            && file_exists(App\Post::IMAGE_PATH.$post->post_image))
                            <div class="card">
                                <img 
                                    src="{{ url(App\Post::IMAGE_PATH.$post->post_image) }}" 
                                    alt="{{ $post->post_image }}" 
                                    width="100px" 
                                    height="100px"
                                >
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
