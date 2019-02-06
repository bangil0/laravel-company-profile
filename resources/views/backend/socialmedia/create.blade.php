@extends('layouts.template')

@section('content')
<div class="row">
    <div class="col-lg-12">
        {{ Form::open(['route' => 'backend.socialmedia.store']) }}
        <div class="card">
            <div class="card-header">
                <a href="{{ route('backend.socialmedia.index') }}">
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
                    <label>Name</label>
                    {!! Form::text('name', null, ["class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    <label>Link</label>
                    {!! Form::text('value', null, ["class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    <label>Icon</label>
                    {!! Form::text('icon', "fa-anchor", ["class" => "form-control icon-picker"]) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
