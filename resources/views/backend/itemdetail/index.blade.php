@extends('layouts.template')
@section('title', 'Custom Post')
@section('content')
<div class="row">
    <div class="col-lg-12">
        @include('layouts._alert')
        <div class="card">
            <div class="card-header">
                <a href="{{ route('backend.item.index') }}">
                    <button type="button" class="btn btn-primary">
                        <i class="fa fa-arrow-left"></i> Back
                    </button>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="index-table">
                        <thead>
                            <th>Item Name</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($item->itemdetail as $itemdetail)
                                <tr>
                                    <td>
                                        {{ $itemdetail->item->item_name }}
                                    </td>
                                    <td>
                                        {{ $itemdetail->item_detail_name }}
                                    </td>
                                    <td>
                                        {{ strip_tags($itemdetail->body) }}
                                    </td>
                                    <td>
                                        @if(!empty($itemdetail->item_detail_image) 
                                            && file_exists(App\ItemDetail::IMAGE_PATH.$itemdetail->item_detail_image))
                                            <img 
                                                src="{{ url(App\ItemDetail::IMAGE_PATH.$itemdetail->item_detail_image) }}" 
                                                alt="{{ $itemdetail->item_detail_image }}" 
                                                width="100px" 
                                                height="100px"
                                            >
                                        @endif
                                    </td>
                                    <td>
                                        <div role="group" aria-label="Record actions" class="btn-group">
                                            <a 
                                                href="{{ route('backend.itemdetail.edit', $itemdetail) }}" 
                                                class="btn btn-success btn-sm"
                                            >
                                                Edit
                                            </a> 
                                            <a 
                                                href="{{ route('backend.itemdetail.destroy', $itemdetail) }}" 
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
