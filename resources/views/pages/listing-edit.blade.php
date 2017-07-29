@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-10 col-md-10 col-lg-offset-1 col-md-offset-1">
        <h1>@if(! isset($id)) Create listing @else Edit listing @endif</h1>
        <div class="row">
            <div class="col-md-3">
                <a href="#"><img src="https://placeimg.com/200/200/arch" width="200" height="200" /></a>
            </div>
            <div class="col-md-9">
                <form class="form" method="POST" action="/listings/{{ $id }}">
                    {{ csrf_field() }}
                    @if(isset($id))
                        <input name="_method" type="hidden" value="PUT" />
                    @endif
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $name }}" />
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" value="{{ $description }}" />
                        <label for="type">Type</label>
                        <input type="text" class="form-control" name="type" value="{{ $type }}" />
                        <label for="street1">Street 1</label>
                        <input type="text" class="form-control" name="street1" value="{{ $street1 }}"/>
                        <label for="street2">Street 2</label>
                        <input type="text" class="form-control" name="street2" value="{{ $street2 }}"/>
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="city" value="{{ $city }}" />
                        <label for="state">State</label>
                        <input type="text" class="form-control" name="state" value="{{ $state }}" />
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control" name="zip" value="{{ $zip }}"/>
                        <label for="kid_friendly">Kid Friendly</label>
                        <input type="checkbox" class="form-control" name="kid_friendly" value="{{ $kid_friendly }}"/>
                        <label for="pet_friendly">Pet Friendly</label>
                        <input type="checkbox" class="form-control" name="pet_friendly" value="{{ $pet_friendly }}"/>
                        <label for="max_stay_days">Max Stay (Days)</label>
                        <input type="number" class="form-control" name="max_stay_days" value="{{ $max_stay_days }}"/>
                        <label for="beds">Beds</label>
                        <input type="number" class="form-control" name="beds" value="{{ $beds }}"/>
                    </div>
                    <button class="btn btn-primary" type="submit">Update</button>
                    <hr>
                    <div class="form-group">
                        <label for="name">New Password</label>
                        <input type="password" class="form-control" name="password" />
                        <label for="name">Confirm Password</label>
                        <input type="password" class="form-control" />
                    </div>
                    <button class="btn btn-primary" type="submit">Change</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
