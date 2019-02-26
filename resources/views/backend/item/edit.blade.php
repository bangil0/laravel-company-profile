@extends('layouts.template')
@section('title', 'Custom Post')
@section('content')
<div class="row">
    <div class="col-lg-12">
        {{ Form::open(['route' => ['backend.item.update', $item->id], 'method' => 'PUT']) }}
        <div class="card">
            <div class="card-header">
                <a href="{{ route('backend.item.index') }}">
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
                    <label>Item Name</label>
                    {!! Form::text('item_name', $item->item_name, ["class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    <label>Item Description</label>
                    {!! Form::textarea('item_description', $item->item_description, ["class" => "form-control", "rows" => 5]) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
