@extends('layouts.app')
@section('content')
    <div class="card card-default">
        <div class="card-header">
            Profile
        </div>
        <div class="card-body">
            <form action="{{ route('users.update' , $user->id) }} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="about">About:</label>
                    <textarea
                        class="form-control"
                        name="about"
                        placeholder="Tell Us About You">{{$profile->about}}</textarea>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input
                        type="text"
                        name="email"
                        class="form-control"
                        value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="facebook">FaceBook:</label>
                    <input
                        type="text"
                        name="facebook"
                        class="form-control"
                        value="{{$profile->facebook}}">
                </div>
                <div class="form-group">
                    <label for="twitter">Twitter:</label>
                    <input
                        type="text"
                        name="twitter"
                        class="form-control"
                        value="{{$profile->twitter}}">
                </div>
                <div class="form-group">
                    <label for="picture">Picture:</label>
                    <br>
                    <img src="{{ $user->hasPicture() ? asset('storage/' . $user->getPicture()) : $user->getGravatar() }}" width="80px" height="80px">
                    <input
                        type="file"
                        name="picture"
                        class="form-control mt-2">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
