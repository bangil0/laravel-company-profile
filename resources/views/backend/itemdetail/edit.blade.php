@extends('layouts.template')
@section('title', 'Custom Post')
@section('content')
<div class="row">
    <div class="col-lg-12">
        {{ Form::open(['route' => ['backend.itemdetail.update', $itemdetail->id], 'method' => 'PUT', 'files' => true]) }}
        <div class="card">
            <div class="card-header">
                <a href="{{ route('backend.item.show', $itemdetail->item->id) }}">
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
                    <label>Name</label>
                    {!! Form::text('item_detail_name', $itemdetail->item_detail_name, ["class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    <label>Description</label>
                    {!! Form::textarea('item_detail_description', $itemdetail->item_detail_description, ["class" => "form-control", "rows" => 5]) !!}
                </div>
                <div class="form-group">
                    {!! Form::file('file', ["class" => "form-control"]) !!}
                    <br>
                    <div class="col-md-12 row"> 
                        @if(!empty($itemdetail->item_detail_image) 
                            && file_exists(App\ItemDetail::IMAGE_PATH.$itemdetail->item_detail_image))
                            <div class="card">
                                <img 
                                    src="{{ url(App\ItemDetail::IMAGE_PATH.$itemdetail->item_detail_image) }}" 
                                    alt="{{ $itemdetail->item_detail_image }}" 
                                    width="100px" 
                                    height="100px"
                                >
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $itemdetail->show_link }} link" style="display: none;">
                    <label>Link</label>
                    {!! Form::text('item_detail_link', $itemdetail->item_detail_link, ["class" => "form-control"]) !!}
                </div>
                <div class="form-group {{ $itemdetail->show_people }} author" style="display: none">
                    <label>Author</label>
                    {!! Form::text('item_detail_people', $itemdetail->item_detail_people, ["class" => "form-control"]) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
