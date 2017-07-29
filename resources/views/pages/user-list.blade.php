@extends('layout')

@section('content')
    <div class="col-lg-10 col-md-10 col-lg-offset-1 col-md-offset-1">
        <table class="col-lg-8 table table-striped table-bordered">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Description</td>
                </tr>
            </thead>
            <tbody>
        @foreach($users as $user)
            <tr>
                <td><a href="/users/{{$user->id}}/edit" >{{$user->id}}</a></td>
                <td><a href="/users/{{$user->id}}">{{$user->name}}</a></td>
                <td>{{$user->description}}</td>
            </tr>
        @endforeach
            </tbody>
        </table>
    </div>
@endsection
