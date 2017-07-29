@extends('layout')

@section('content')      
    @if($listings->count > 0)
        <div class="col-lg-10 col-md-10 col-lg-offset-1 col-md-offset-1">
            <table class="col-lg-8 table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Description</td>
                    </tr>
                </thead>
                <tbody>
            @foreach($listings as $listing)
                <tr>
                    <td><a href="/listings/{{$listing->id}}/edit" >{{$listing->id}}</a></td>
                    <td><a href="/listings/{{$listing->id}}">{{$listing->name}}</a></td>
                    <td>{{$user->description}}</td>
                </tr>
            @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <!--
        Using col-xs-* classes are recommended.
        Otherwise you may run into a trouble.
    -->
    <div class="col-xs-6 col-md-8" style="display: flex; flex-direction: row;">
        No listings found
    </div>
@endsection
