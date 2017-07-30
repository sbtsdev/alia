@extends('layout')

@section('content')
    <section id="listings" class="listings">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <a href="{{route('listings.create')}}" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"></i> New Listing</a>
                            <h3>Listings</h3>
                            <hr>

                            <div>
                                @if ($listings->count() > 0)
                                    @foreach($listings as $listing)
                                        <div class="listing">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="listing-img">
                                                        @if (!empty($listing->images))
                                                            <i class="fa fa-spinner fa-spin"></i>
                                                            <img src="{{ $listing->images[0]['path'] }}" alt="Image for {{ $listing->name }}">
                                                        @else
                                                            <i class="fa fa-spinner fa-spin"></i>
                                                            <img src="/assets/img/no-listing-image.png" alt="No listing image">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h3>{{ $listing->name }}</h3>
                                                    <p>{{ $listing->description }}</p>
                                                    <p>
                                                        <strong>Location:</strong> {{ $listing->city }}, {{ $listing->state }}<br>
                                                        <strong>Neighborhood:</strong> {{ $listing->neighborhood }}
                                                    </p>
                                                    <p>
                                                        <strong>Sleeps:</strong> {{ $listing->beds }} &nbsp;&nbsp;&nbsp; <strong>Kid-friendly:</strong> <i class="{{ $listing->kid_icon }}"></i> &nbsp;&nbsp;&nbsp; <strong>Pet-friendly:</strong> <i class="{{ $listing->pet_icon }}"></i> &nbsp;&nbsp;&nbsp; <strong>Listing type:</strong> {{ $listing->listing_type }}<br>
                                                    </p>
                                                    <p>
                                                        <br>
                                                        <a class="btn btn-primary" href="/listings/{{ $listing->id }}/edit">Edit listing</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    No listings found
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
