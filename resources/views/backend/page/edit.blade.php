@extends('layouts.template')
@section('title', 'Page')
@section('content')
<div class="row">
    <div class="col-lg-12">
        {{ Form::open(['route' => ['backend.page.update', $page->id], 'method' => 'PUT']) }}
        <div class="card">
            <div class="card-header">
                <a href="{{ route('backend.page.index') }}">
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
                    <label>Page Name</label>
                    {!! Form::text('page_name', $page->page_name, ["class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    <label>Page Description</label>
                    {!! Form::textarea('page_description', $page->page_description, ["class" => "form-control", "rows" => 5]) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
