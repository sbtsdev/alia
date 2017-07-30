@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-10 col-md-10 col-lg-offset-1 col-md-offset-1">
        <h1>Create availability</h1>
        @if(session()->has('message'))
            @if(session()->get('success'))
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
            <div class="col-md-9">
                <form class="form" method="POST" action="/availability">
                    {{ csrf_field() }}
                    <input type="hidden" name="listing_id" value="{{ $listing_id }}" />
                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" />
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" />
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection('content')