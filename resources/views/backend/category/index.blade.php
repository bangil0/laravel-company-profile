@extends('layouts.template')
@section('title', 'Category')
@section('content')
<div class="row">
    <div class="col-lg-12">
        @include('layouts._alert')
        <div class="card">
            <div class="card-header">
                <a href="{{ route('backend.category.create') }}">
                    <button class="btn btn-success">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="index-table">
                        <thead>
                            <th>Category Name</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($categorys as $category)
                                <tr>
                                    <td>
                                        {{ $category->category_name }}
                                    </td>
                                    <td>
                                        <div role="group" aria-label="Record actions" class="btn-group">
                                            <a 
                                                href="{{ route('backend.category.edit', $category) }}" 
                                                class="btn btn-success btn-sm"
                                            >
                                                Edit
                                            </a> 
                                            <a 
                                                href="{{ route('backend.category.destroy', $category) }}" 
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
