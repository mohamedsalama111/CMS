@extends('layouts.app')

@section('content')
            <a  href="{{route('posts.create')}}"
                class="btn float-right btn-success"
                style="margin-bottom: 10px;
                margin-left: 10px; width: 100px;
                margin-top: 3px;";>Add Post</a>
    <div class="card card-default" style="">
        <div class="card-header">All Posts</div>
        <div class="card-body">
            @if($posts->count()>0)
                <table class="table ">
                    <thead class="thead-dark">
                    <th>Image</th>
                    <th>Title</th>
                    {{--                <th>Description</th>--}}
                    <th class="">Actions</th>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>
                                {{--                            {{$post->image}}--}}
                                <img src="{{asset('storage/'.$post->image )}}" width="100px" height="50px">
                            </td>
                            <td>
                                {{$post->title}}
                            </td>
                            {{--                        <td>--}}
                            {{--                            {{$post->description}}--}}
                            {{--                        </td>--}}
                            <td>
                                <form class="float-right ml-2"
                                      action="{{route('posts.destroy', $post->id)}}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm float-right">{{ $post->trashed() ? 'Delete' : 'Trash' }}</button>
                                </form>
                                @if($post->trashed())
                                    <a href="{{route('trashed.restore', $post->id)}}"
                                       class="btn btn-primary btn-sm float-right" >Restore </a>
                                @else
                                    <a href="{{route('posts.edit', $post->id)}}"
                                       class="btn btn-primary btn-sm float-right" style="">Edit </a>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="card-body text-center">
                    <h1>No Posts yet</h1>
                </div>
            @endif
        </div>
    </div>

@endsection
