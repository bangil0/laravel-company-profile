@extends('layouts.template')
@section('title', 'Custom Post')
@section('content')
<div class="row">
    <div class="col-lg-12">
        @include('layouts._alert')
        <div class="card">
            <div class="card-header">
                <a href="{{ route('backend.item.create') }}">
                    <button class="btn btn-success">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="index-table">
                        <thead>
                            <th>Item Name</th>
                            <th>Item Description</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>
                                        {{ $item->item_name }}
                                    </td>
                                    <td>
                                        {{ $item->body }}
                                    </td>
                                    <td>
                                        <div role="group" aria-label="Record actions" class="btn-group">
                                            <a 
                                                href="{{ route('backend.itemdetail.create', $item) }}" 
                                                class="btn btn-primary btn-sm"
                                            >
                                                Add Detail Item
                                            </a> 
                                            <a 
                                                href="{{ route('backend.item.show', $item) }}" 
                                                class="btn btn-info btn-sm"
                                            >
                                                Show
                                            </a> 
                                            <a 
                                                href="{{ route('backend.item.edit', $item) }}" 
                                                class="btn btn-success btn-sm"
                                            >
                                                Edit
                                            </a> 
                                            <a 
                                                href="{{ route('backend.item.destroy', $item) }}" 
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
