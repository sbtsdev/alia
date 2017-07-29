@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-10 col-md-10 col-lg-offset-1 col-md-offset-1">
        <div class="row">
            <div class="col-md-3">
                <a href="#"><img src="https://placeimg.com/200/200/people" width="200" height="200" style="background-color:#bebebe;" /></a>
            </div>
            <div class="col-md-9">
                <dl>
                    <dd>Name</dd>
                    <dt>{{ $name }}</dt>
                    <dd>Description</dd>
                    <dt>{{ $description }}</dt>
                    <dd>Email</dd>
                    <dt>{{ $email }}</dt>
                </dl>
            </div>
        </div>
    </div>
</div>
@endsection
