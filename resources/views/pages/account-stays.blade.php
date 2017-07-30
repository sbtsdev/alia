@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-10 col-md-10 col-lg-offset-1 col-md-offset-1">
        <h1>My Stays</h1>
        <table class="col-lg-8 table table-striped table-bordered">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Type</td>
                    <td>Location</td>
                    <td>Kid Friendly</td>
                    <td>Pet Friendly</td>
                    <td>Max Stay (Days)</td>
                    <td>Beds</td>
                </tr>
            </thead>
            <tbody>
        @foreach($listings as $listing)
            <tr>
                <td><a href="/listings/{{$listing->id}}/edit" >{{$listing->id}}</a></td>
                <td><a href="/listings/{{$listing->id}}">{{$listing->name}}</a></td>
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
            </tr>
        @endforeach
            </tbody>
        </table>
    </div>
    @else
        No listings found
    @endif
@endsection
