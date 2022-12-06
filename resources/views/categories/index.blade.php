@extends('layouts.app')
@section('content')
    @if(session()->has('error'))
        <div class="alert alert-danger" >
           {{ session()->get('error') }}
        </div>
    @endif
    <a href="{{route('categories.create')}}"
        class="btn float-right btn-success"
        style="margin-bottom: 10px;
        margin-left: 10px;">Add Category</a>
    <div class="card card-default">
        <div class="card-header">All Categories</div>
        <div class="card-body">
            <table class="table">
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>
                                {{$category->name}}
                            </td>
                            <td>
                                <form class="float-right ml-2" action="{{route('categories.destroy', $category->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">DELETE</button>
                                </form>
                                <a href="{{route('categories.edit', $category->id)}}" class="btn btn-primary btn-sm float-right">Edit </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
@endsection
