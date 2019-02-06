@extends('layouts.template')

@section('content')
<div class="row">
    <div class="col-lg-12">
        @include('layouts._alert')
        <div class="card">
            <div class="card-header">
                <a href="{{ route('backend.socialmedia.create') }}">
                    <button class="btn btn-success">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="index-table">
                        <thead>
                            <th>Name</th>
                            <th>Link</th>
                            <th>Icon</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($socialsmedia as $socialmedia)
                                <tr>
                                    <td>
                                        {{ $socialmedia->name }}
                                    </td>
                                    <td>
                                        {{ $socialmedia->value }}
                                    </td>
                                    <td>
                                        <i class="fa fa-{{ $socialmedia->icon }}"></i>
                                    </td>
                                    <td>
                                        <div role="group" aria-label="Record actions" class="btn-group">
                                            <a 
                                                href="{{ route('backend.socialmedia.edit', ['id' => $socialmedia->id]) }}" 
                                                class="btn btn-success btn-sm"
                                            >
                                                Edit
                                            </a> 
                                            <a 
                                                href="{{ route('backend.socialmedia.destroy', ['id' => $socialmedia->id]) }}" 
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
                    {{ $socialsmedia->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
