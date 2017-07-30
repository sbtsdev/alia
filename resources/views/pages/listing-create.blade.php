@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-10 col-md-10 col-lg-offset-1 col-md-offset-1">
        <h1>Create listing</h1>
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
            <div class="col-md-3">
                <a href="#"><img src="https://placeimg.com/200/200/arch" width="200" height="200" /></a>
            </div>
            <div class="col-md-9">
                <form class="form" method="POST" action="/listings">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}" />
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" value="{{old('description')}}" />
                        <label for="type">Type</label>
                        <input type="text" class="form-control" name="type" value="{{old('type')}}" />
                        <label for="street1">Street 1</label>
                        <input type="text" class="form-control" name="street1" value="{{old('street1')}}"/>
                        <label for="street2">Street 2</label>
                        <input type="text" class="form-control" name="street2" value="{{old('street2')}}"/>
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="city" value="{{old('city')}}" />
                        <label for="state">State</label>
                        <input type="text" class="form-control" name="state" value="{{old('state')}}" />
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control" name="zip" value="{{old('zip')}}"/>
                        <label for="kid_friendly">Kid Friendly</label>
                        <input type="checkbox" class="form-control" name="kid_friendly" value="{{old('kid_friendly')}}1" />
                        <label for="pet_friendly">Pet Friendly</label>
                        <input type="checkbox" class="form-control" name="pet_friendly" value="{{old('pet_friendly')}}1" />

                        <!-- <label for="availability">Availability</label>                         -->

                        <label for="start_date">Start Date</label>
                        <input type="date" class="form-control" name="start_date" value="{{old('start_date')}}" />
                        <label for="end_date">End Date</label>
                        <input type="date" class="form-control" name="end_date" value="{{old('end_date')}}" />

                        <label for="max_stay_days">Max Stay (Days)</label>
                        <input type="number" class="form-control" name="max_stay_days" value="{{old('max_stay_days')}}"/>
                        <label for="beds">Beds</label>
                        <input type="number" class="form-control" name="beds" value="{{old('beds')}}"/>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
