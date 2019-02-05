@extends('layouts.template')

@section('content')
<div class="row">
    <div class="col-lg-12">
        {{ Form::open(['route' => 'backend.post.store', 'files' => true]) }}
        <div class="card">
            <div class="card-header">
                <a href="{{ route('backend.post.index') }}">
                    <button type="button" class="btn btn-primary">
                        <i class="fa fa-arrow-left"></i> Back
                    </button>
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-save"></i> Save
                </button>
            </div>
            <div class="card-body">
                @include('layouts._message')
                <div class="form-group">
                    <label>Post Category</label>
                    {!! Form::select('category_id', $category, null, ["class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    <label>Post Name</label>
                    {!! Form::text('post_name', null, ["class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    <label>Post Description</label>
                    {!! Form::textarea('post_description', null, ["class" => "form-control", "rows" => 5]) !!}
                </div>
                <div class="form-group">
                    <label>Post Image</label>
                    {!! Form::file('file', ["class" => "form-control"]) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
