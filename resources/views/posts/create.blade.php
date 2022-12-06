@extends('layouts.app')
@section('stylesheets')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($post)  ? "Update Post" : "Create A New Post" }}
        </div>
        <div class="card-body">
            <form action="{{ isset($post) ? route('posts.update' , $post->id) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($post))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="post description">Title :</label>
                    <input
                        name="title"
                        class="form-control"
                        placeholder="Add A New Title"
                        value="{{isset($post) ? $post->title : "" }}">
                </div>
                <div class="form-group">
                    <label for="post description">Description :</label>
                    <textarea
                        class="form-control"
                        name="description"
                        placeholder="Add A New Description">{{isset($post) ? $post->description : "" }}</textarea>
                </div>
                <div class="form-group">
                    <label for="post content">Content :</label>
                        <input id="x" type="hidden" name="con" value="{{ !isset($post) ? "" : $post->con }}">
                        <trix-editor input="x" ></trix-editor>
                </div>
                @if(isset($post))
                <div class="form-group">
                    <img src="{{asset('storage/'.$post->image)}}" style="width: 100%">
                </div>
                @endif
                <div class="form-group">
                    <label for="post image">Image :</label>
                    <input
                        type="file"
                        class="form-control"
                        name="image"
                        value="{{isset($post) ? $post->image : "" }}">
                </div>
{{--                @if(!asset($post)) {--}}
                    <div class="form-group">
                        <label for="post category :">Category:</label>
                        <select name="categoryID" id="selectCategory" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
{{--                @endif--}}
                @if(!$tags -> count() <=0 && isset($post))
                    <div class="form-group">
                        <label for="post tag :">Tag:</label>
                        <select name="tags[]" id="selectTag" class="form-control tags" multiple>
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}"
                                    @if($post->hastag($tag->id))
                                        selected
                                    @endif>{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        {{isset($post) ? "Update" : "Add" }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.tags').select2();
        });
    </script>
@endsection
