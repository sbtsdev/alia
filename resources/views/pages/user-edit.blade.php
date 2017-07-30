@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-10 col-md-10 col-lg-offset-1 col-md-offset-1">
        <h1>@if(! isset($id)) Create user @else Edit user @endif</h1>
        @if(session()->has('message'))
          @if(session()->get('success') == "yes")
            <div class="alert alert-success">
              {{ session()->get('message') }}
            </div>
          @else
            <div class="alert alert-warning">
              {{ session()->get('message') }}
            </div>
          @endif
        @endif
        <div class="row">
            <div class="col-md-3">
                <a href="#"><img src="/assets/img/default-person.png" width="100%" height="100%" style="background-color:#bebebe;" /></a>
                <div style="margin-top:12px;" class="row account-nav">
                    <div style="margin-top:12px;" class="col-md-12 text-center">
                        <a href="/account/listings" style="width:100%;" class="btn btn-primary">Listings</a>
                    </div>
                    <div style="margin-top:12px;" class="col-md-12 text-center">
                        <a href="/account/stays" style="width:100%;" class="btn btn-primary">Stays</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <form class="form" method="POST" action="/account">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $name }}" />
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" value="{{ $description }}" />
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $email }}" />
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
