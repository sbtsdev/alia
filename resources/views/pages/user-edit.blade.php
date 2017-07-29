@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-10 col-md-10 col-lg-offset-1 col-md-offset-1">
        <h1>@if(! isset($id)) Create user @else Edit user @endif</h1>
        <form class="form" method="POST" action="/user/{{ $id }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $name }}" />
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" value="{{ $description }}" />
                <label for="email">Email</label>
                <input type="email" class="form-control" name="description" value="{{ $email }}" />
            </div>
            <button class="btn btn-primary" type="submit">Update</button>
            <hr>
            <div class="form-group">
                <label for="name">Password</label>
                <input type="password" class="form-control" name="password" />
                <label for="name">Confirm Password</label>
                <input type="password" class="form-control" />
            </div>
            <button class="btn btn-primary" type="submit">Change</button>
        </form>
    </div>
</div>
@endsection
