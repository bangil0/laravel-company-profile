@extends('layouts.template')

@section('content')
<div class="row">
    <div class="col-lg-12">
        {{ Form::open(['route' => ['backend.category.update', $category->id], 'method' => 'PUT']) }}
        <div class="card">
            <div class="card-header">
                <a href="{{ route('backend.category.index') }}">
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
                    <label>Category Name</label>
                    {!! Form::text('category_name', $category->category_name, ["class" => "form-control"]) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
