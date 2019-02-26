@extends('layouts.template')
@section('title', 'Page')
@section('content')
<div class="row">
    <div class="col-lg-12">
        @include('layouts._alert')
        <div class="card">
            <div class="card-header">
                <a href="{{ route('backend.page.create') }}">
                    <button class="btn btn-success">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="index-table">
                        <thead>
                            <th>Page Name</th>
                            <th>Page Description</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($pages as $page)
                                <tr>
                                    <td>
                                        {{ $page->page_name }}
                                    </td>
                                    <td>
                                        {{ $page->body }}
                                    </td>
                                    <td>
                                        <div role="group" aria-label="Record actions" class="btn-group">
                                            <a 
                                                href="{{ route('backend.page.edit', $page) }}" 
                                                class="btn btn-success btn-sm"
                                            >
                                                Edit
                                            </a> 
                                            <a 
                                                href="{{ route('backend.page.destroy', $page) }}" 
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
