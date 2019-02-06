@extends('layouts.template')

@section('content')
<div class="row">
    <div class="col-lg-12">
        @include('layouts._alert')
        <div class="card">
            <div class="card-header">
                <a href="{{ route('backend.post.create') }}">
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
                            <th>Post Name</th>
                            <th>Post Description</th>
                            <th>Post Image</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>
                                        {{ $post->category->category_name }}
                                    </td>
                                    <td>
                                        {{ $post->post_name }}
                                    </td>
                                    <td>
                                        {{ $post->post_description }}
                                    </td>
                                    <td>
                                        @if(!empty($post->post_image) 
                                            && file_exists(App\Post::IMAGE_PATH.$post->post_image))
                                            <img 
                                                src="{{ url(App\Post::IMAGE_PATH.$post->post_image) }}" 
                                                alt="{{ $post->post_image }}" 
                                                width="100px" 
                                                height="100px"
                                            >
                                        @endif
                                    </td>
                                    <td>
                                        <div role="group" aria-label="Record actions" class="btn-group">
                                            <a 
                                                href="{{ route('backend.post.edit', ['id' => $post->id]) }}" 
                                                class="btn btn-success btn-sm"
                                            >
                                                Edit
                                            </a> 
                                            <a 
                                                href="{{ route('backend.post.destroy', ['id' => $post->id]) }}" 
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
                    {{ $posts->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
