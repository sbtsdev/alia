@extends('layout')

@section('content')
    <section id="listings" class="listings">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>Create a listing</h3>
                            <hr>
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
                            <form class="form" method="POST" action="/listings/{{ $listing->id }}">
                                <input name="_method" type="hidden" value="PUT">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="listing-img">
                                            @if ($listing->images->count() > 0)
                                                <i class="fa fa-spinner fa-spin"></i>
                                                <img src="{{ $listing->images[0]['path'] }}" alt="Image for {{ $listing->name }}">
                                            @else
                                                <i class="fa fa-spinner fa-spin"></i>
                                                <img src="/assets/img/no-listing-image.png" alt="No listing image">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" name="name" value="{{ $listing->name }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="type">Type</label>
                                                    <select class="form-control select" name="type">
                                                        @foreach($types as $type => $label)
                                                            <option value="{{ $type }}">{{ $label }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <input type="text" class="form-control" name="description" value="{{ $listing->description }}" />
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="street1">Street 1</label>
                                                    <input type="text" class="form-control" name="street1" value="{{ $listing->street1 }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="street2">Street 2</label>
                                                    <input type="text" class="form-control" name="street2" value="{{ $listing->street2 }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="city">City</label>
                                                    <input type="text" class="form-control" name="city" value="{{ $listing->city }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="state">State</label>
                                                    <input type="text" class="form-control" name="state" value="{{ $listing->state }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="zip">Zip</label>
                                                    <input type="text" class="form-control" name="zip" value="{{ $listing->zip }}">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="max_stay_days">Max Stay (Days)</label>
                                                    <input type="number" class="form-control" name="max_stay_days" value="{{ $listing->max_stay_days }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="beds">Beds</label>
                                                    <input type="number" class="form-control" name="beds" value="{{ $listing->beds }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <br>
                                                <div class="checkbox">
                                                    <label for="kid_friendly">
                                                        <input type="checkbox" name="kid_friendly" value="1" {{ $listing->kid_friendly ? 'checked' : '' }}> Kid Friendly
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <br>
                                                <div class="checkbox">
                                                    <label for="pet_friendly">
                                                        <input type="checkbox" name="pet_friendly" value="1" {{ $listing->pet_friendly ? 'checked' : '' }}> Pet Friendly
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
