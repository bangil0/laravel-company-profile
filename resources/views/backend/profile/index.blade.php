@extends('layouts.template')
@section('title', 'Profile')
@section('content')
<div class="row">
    <div class="col-lg-12">
        {{ Form::open(['route' => ['backend.profile.update', isset($profile->id) ? $profile->id : 1], 'files' => true, 'method' => 'PUT']) }}
        <div class="card">
            <div class="card-header">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-save"></i> Save
                </button>
            </div>
            <div class="card-body">
                @include('layouts._message')
                <div class="form-group">
                    <label>Name</label>
                    {!! Form::text('company_name', isset($profile->company_name) ? $profile->company_name : null, ["class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    {!! Form::text('company_phone', isset($profile->company_phone) ? $profile->company_phone : null, ["class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    <label>Address</label>
                    {!! Form::textarea('company_address', isset($profile->company_address) ? $profile->company_address : null, ["class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    <label>Email</label>
                    {!! Form::text('company_email', isset($profile->company_email) ? $profile->company_email : null, ["class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    <label>Company Logo</label>
                    {!! Form::file('file', ["class" => "form-control"]) !!}
                    <br>
                    <div class="col-md-12 row"> 
                        @if(!empty($profile->company_logo) 
                            && file_exists(App\CompanyProfile::IMAGE_PATH.$profile->company_logo))
                            <div class="card">
                                <img 
                                    src="{{ url(App\CompanyProfile::IMAGE_PATH.$profile->company_logo) }}" 
                                    alt="{{ $profile->company_logo }}" 
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
