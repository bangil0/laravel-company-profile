@extends('layouts.template')

@section('content')
<div class="row">
    <div class="col-lg-12">
        {{ Form::open(['route' => 'backend.contact.store']) }}
        <div class="card">
            <div class="card-header">
                <a href="{{ route('backend.contact.index') }}">
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
                    <label>Contact Name</label>
                    {!! Form::text('contact_name', null, ["class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    <label>Contact Email</label>
                    {!! Form::text('contact_email', null, ["class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    <label>Contact Subject</label>
                    {!! Form::text('contact_subject', null, ["class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    <label>Contact Message</label>
                    {!! Form::textarea('contact_message', null, ["class" => "form-control", "rows" => 5]) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
