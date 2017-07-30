@extends('layout')

@section('content')
    <section id="listings" class="listings">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="listing">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img src="{{ $images[0]['path'] }}" alt="Image for {{ $name }}">
                                    </div>
                                    <div class="col-lg-8">
                                        <h3>{{ $name }}</h3>
                                        <p>{{ $description }}</p>
                                        <p>
                                            <strong>Location:</strong> {{ $city }}, {{ $state }}<br>
                                            <strong>Neighborhood:</strong> {{ $neighborhood }}
                                        </p>
                                        <p>
                                            <strong>Sleeps:</strong> {{ $beds }} &nbsp;&nbsp;&nbsp; <strong>Kid-friendly:</strong> <i class="{{ $kid_icon }}"></i> &nbsp;&nbsp;&nbsp; <strong>Pet-friendly:</strong> <i class="{{ $pet_icon }}"></i> &nbsp;&nbsp;&nbsp; <strong>Listing type:</strong> {{ $listing_type }}<br>
                                        </p>
                                        <p>
                                            <br>
                                            <a class="btn btn-coral">Request stay</a>
                                        </p>
                                        <hr>
                                        <h3>Request to Stay Here</h3>
                                        <dl>
                                            <dd>Arrival Date</dd>
                                            <dt>
                                                <input type="date" class="form-control" id="startDate" />
                                            </dt>
                                            <dd>Departure Date</dd>
                                            <dt>
                                                <input type="date" class="form-control" id="endDate" />
                                            </dt>
                                        </dl>
                                        <button type="button" class="btn btn-primary btn-block">Request to Stay</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
