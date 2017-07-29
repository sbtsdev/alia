@extends('layout')

@section('content')
    Users
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
@endsection
