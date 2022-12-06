@extends('layouts.app')

@section('content')
    <div class="card card-default" style="">
        <div class="card-header">All Users</div>
        <div class="card-body">
            @if($users->count()>0)
                <table class="table ">
                    <thead class="thread-dark">
                    <th>Image</th>
                    <th>name</th>
                    <th>Permissions</th>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
{{--                                {{$post->image}}--}}
                                <img src="{{ $user->hasPicture() ? asset('storage/' . $user->getPicture()) : $user->getGravatar() }}" style=" border-radius: 50%; width:60px; height:50px">
                            </td>
                            <td>
                                {{$user->name}}
                            </td>
                            <td>
                                @if(! $user ->isAdmin())
                                    <form action="{{route('users.make-admin',$user->id)}}" method="post">
                                        @csrf
                                        <button class="btn btn-success" type="submit">St AS Admn</button>
                                    </form>
                                @else
                                    {{$user->rol}}
                                @endif
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="card-body text-center">
                    <h1>No Users Yet</h1>
                </div>
            @endif
        </div>
    </div>

@endsection
