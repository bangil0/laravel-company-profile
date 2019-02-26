@extends('layouts.template')
@section('title', 'Social Media')
@section('content')
<div class="row">
    <div class="col-lg-12">
        {{ Form::open(['route' => ['backend.socialmedia.update', $socialmedia->id], 'method' => 'PUT']) }}
        <div class="card">
            <div class="card-header">
                <a href="{{ route('backend.socialmedia.index') }}">
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
                    <label>Name</label>
                    {!! Form::text('name', $socialmedia->name, ["class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    <label>Link</label>
                    {!! Form::text('value', $socialmedia->value, ["class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    <label>Icon</label>
                    {!! Form::text('icon', $socialmedia->icon, ["class" => "form-control"]) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
