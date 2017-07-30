@extends('layout')

@section('content')
    <section id="listings" class="listings">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="listing">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{ $images[0]['path'] }}" alt="Image for {{ $name }}">
                                    </div>
                                    <div class="col-md-8">
                                        <h3>{{ $name }}</h3>
                                        <p>{{ $description }}</p>
                                        <p>
                                            <strong>Location:</strong> {{ $city }}, {{ $state }}<br>
                                            <strong>Neighborhood:</strong> {{ $neighborhood }}
                                        </p>
                                        <p>
                                            <strong>Sleeps:</strong> {{ $beds }} &nbsp;&nbsp;&nbsp; <strong>Kid-friendly:</strong> <i class="{{ $kid_icon }}"></i> &nbsp;&nbsp;&nbsp; <strong>Pet-friendly:</strong> <i class="{{ $pet_icon }}"></i> &nbsp;&nbsp;&nbsp; <strong>Listing type:</strong> {{ $listing_type }}<br>
                                        </p>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form class="form" method="POST" action="/stays">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="listingId" value="{{ $id }}">
                                                    <div class="form-group">
                                                        <label for="startDate">Arrival</label>
                                                        <input type="date" class="form-control" id="startDate" name="startDate">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="endDate">Departure</label>
                                                        <input type="date" class="form-control" id="endDate" name="endDate">
                                                    </div>
                                                    <div class="form-group">
                                                        <br>
                                                        @if (Auth::check())
                                                            <button type="submit" class="btn btn-coral">Request stay</button>
                                                        @else
                                                            <button type="button" class="btn btn-coral" disabled>Request stay</button> &nbsp; <small>(Must be logged in)</small>
                                                        @endif
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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
