@extends('layout')

@section('content')
    <section id="listings" class="listings">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>Account</h3>
                            <hr>
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
                                    <a href="#"><img src="/assets/img/default-person.png" width="100%" height="100%" style="background-color:#bebebe;"></a>
                                    <div style="margin-top:12px;" class="row account-nav">
                                        <div style="margin-top:12px;" class="col-md-12 text-center">
                                            <a href="/account/listings" style="width:100%;" class="btn btn-coral">Listings</a>
                                        </div>
                                        <div style="margin-top:12px;" class="col-md-12 text-center">
                                            <a href="/account/stays" style="width:100%;" class="btn btn-coral">Stays</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <form class="form" method="POST" action="/account">
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ $name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <input type="text" class="form-control" name="description" value="{{ $description }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email" value="{{ $email }}">
                                        </div>
                                        <br>
                                        <button class="btn btn-primary" type="submit">Update</button>
                                        <hr>
                                        <div class="form-group">
                                            <label for="name">New Password</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Confirm Password</label>
                                            <input type="password" class="form-control">
                                        </div>
                                        <br>
                                        <button class="btn btn-primary" type="submit">Change</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
