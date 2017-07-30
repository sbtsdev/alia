@extends('layout')

@section('content')
    @if($listings)
        <div class="container">
            <div class="row">
                <h1 class="col-lg-3">My Listings</h1>
                <h1 class="col-lg-2">
                    <a href="{{route('listings.create')}}" class="btn btn-primary">New Listing</a>
                </h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Description</td>
                                <td>Type</td>
                                <td>Location</td>
                                <td>Kid Friendly</td>
                                <td>Pet Friendly</td>
                                <td>Max Stay (Days)</td>
                                <td>Beds</td>
                                <td>Pending Requests</td>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach($listings as $listing)
                        <tr>
                            <td><a href="/listings/{{$listing->id}}/edit">{{$listing->name}}</a></td>
                            <td>{{$listing->description}}</td>
                            <td>{{$listing->type}}</td>
                            <td nowrap>{{$listing->street1}}
                                <br>
                                {{$listing->street2}}
                                <br>
                                {{$listing->city . ", " . $listing->state . " " . $listing->zip}}</td>
                            <td>{{$listing->kid_friendly ? 'Y' : 'N'}}</td>
                            <td>{{$listing->pet_friendly ? 'Y' : 'N'}}</td>
                            <td>{{$listing->max_stay_days}}</td>
                            <td>{{$listing->beds}}</td>
                            <td>{{$listing->getRequestedStays()->count()}}
                        </tr>
                    @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        No listings found
    @endif
@endsection
