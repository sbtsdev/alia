@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-10 col-md-10 col-lg-offset-1 col-md-offset-1">
            <div class="row">
                <div class="col-md-3">
                    <a href="#"><img src="https://placeimg.com/200/200/arch" width="200" height="200"/></a>
                </div>
                <div class="col-md-9">
                    <dl>
                        <dd>Name</dd>
                        <dt>{{ $name }}</dt>
                        <dd>Description</dd>
                        <dt>{{ $description }}</dt>
                        <dd>Type</dd>
                        <dt>{{ $type }}</dt>
                        <dd>Location</dd>
                        <dt>
                            {{ $street1 }}
                            <br>
                            {{ $street2 }}
                            <br>
                            {{ $city . ", " . $state . " " . $zip}}
                        </dt>
                        <dd>Kid Friendly</dd>
                        <dt>{{ $kid_friendly }}</dt>
                        <dd>Pet Friendly</dd>
                        <dt>{{ $pet_friendly }}</dt>
                        <dd>Max Stay (Days)</dd>
                        <dt>{{ $max_stay_days }}</dt>
                        <dd>Beds</dd>
                        <dt>{{ $beds }}</dt>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection
