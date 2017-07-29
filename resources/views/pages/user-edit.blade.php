@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-10 col-md-10 col-lg-offset-1 col-md-offset-1">
        <h1>@if(! isset($id)) Create user @else Edit user @endif</h1>
        <div class="row">
            <div class="col-md-3">
                <a href="#"><img src="https://placeimg.com/200/200/people" width="200" height="200" style="background-color:#bebebe;" /></a>
            </div>
            <div class="col-md-9">
                <form class="form" method="POST" action="/users/{{ $id }}">
                    {{ csrf_field() }}
                    @if(isset($id))
                    <input name="_method" type="hidden" value="PUT">
                    @endif
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
                        <label for="name">New Password</label>
                        <input type="password" class="form-control" name="password" />
                        <label for="name">Confirm Password</label>
                        <input type="password" class="form-control" />
                    </div>
                    <button class="btn btn-primary" type="submit">Change</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
