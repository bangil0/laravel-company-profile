@extends('layouts.template')
@section('title', 'Category')
@section('content')
<div class="row">
    <div class="col-lg-12">
        {{ Form::open(['route' => 'backend.category.store']) }}
        <div class="card">
            <div class="card-header">
                <a href="{{ route('backend.category.index') }}">
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
                    <label>Category Name</label>
                    {!! Form::text('category_name', null, ["class" => "form-control"]) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
