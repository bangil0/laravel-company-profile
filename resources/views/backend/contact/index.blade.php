@extends('layouts.template')
@section('title', 'Contact')
@section('content')
<div class="row">
    <div class="col-lg-12">
        @include('layouts._alert')
        <div class="card">
            <div class="card-header">
                <a href="{{ route('backend.contact.create') }}">
                    <button class="btn btn-success">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="index-table">
                        <thead>
                            <th>Contact Name</th>
                            <th>Contact Email</th>
                            <th>Contact Subject</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>
                                        {{ $contact->contact_name }}
                                    </td>
                                    <td>
                                        {{ $contact->contact_email }}
                                    </td>
                                    <td>
                                        {{ $contact->contact_subject }}
                                    </td>
                                    <td>
                                        <div role="group" aria-label="Record actions" class="btn-group">
                                            <a 
                                                href="{{ route('backend.contact.edit', $contact) }}" 
                                                class="btn btn-success btn-sm"
                                            >
                                                Edit
                                            </a> 
                                            <a 
                                                href="{{ route('backend.contact.destroy', $contact) }}" 
                                                id="btn-delete"
                                                class="btn btn-danger btn-sm"
                                            >
                                                Delete
                                            </a>
                                        </div>
                                    </td>
                                </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
