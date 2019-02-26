@extends('layouts.template')
@section('title', 'Custom Post')
@section('content')
<div class="row">
    <div class="col-lg-12">
        {{ Form::open(['route' => ['backend.itemdetail.store', $item], 'files' => true]) }}
        <div class="card">
            <div class="card-header">
                <a href="{{ route('backend.item.index') }}">
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
                    {!! Form::text('item_detail_name', null, ["class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    <label>Description</label>
                    {!! Form::textarea('item_detail_description', null, ["class" => "form-control", "rows" => 5]) !!}
                </div>
                <div class="form-group">
                    <label>Link</label>
                    {!! Form::text('item_detail_link', null, ["class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    <label>Author</label>
                    {!! Form::text('item_detail_people', null, ["class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    <label>Image</label>
                    {!! Form::file('file', ["class" => "form-control"]) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
