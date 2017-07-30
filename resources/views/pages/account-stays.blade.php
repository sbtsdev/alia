@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-10 col-md-10 col-lg-offset-1 col-md-offset-1">
        <h1>My Stays</h1>
        @if(!empty($stays))
        <table class="col-lg-8 table table-striped table-bordered">
            <thead>
                <tr>
                    <td>Host</td>
                    <td>Listing</td>
                    <td>Status</td>
                    <td>Dates</td>
                </tr>
            </thead>
            <tbody>
        @foreach($stays as $stay)
                <tr>
@if($stay->meAsHost)
                    <td class="bg-primary">You</td>
@else
                    <td class="bg-success">{{$stay->hostName}}
@endif
                    <td>{{$stay->listingName}}</td>
                    <td>
                        @if($stay->status === 'Requested')
                        <a class="btn btn-info">Accept</a>
                        <a class="btn btn-danger">Deny</a>
                        <a class="btn btn-warning">Cancel</a>
                        @else
                        {{$stay->status}}
                        @endif
                    </td>
                    <td>{{$stay->formedStay}}</td>
                </tr>
        @endforeach
            </tbody>
        </table>
        @else
        <p style="padding:15px 0;" class="text-center bg-warning">No stays found</p>
        @endif
    </div>
</div>
@endsection
