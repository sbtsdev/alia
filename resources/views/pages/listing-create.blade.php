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
                            <form class="form" method="POST" action="/listings">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="listing-img">
                                            <br>
                                            <label class="btn btn-default btn-file">
                                                Upload image(s) <input type="file" name="files" style="display: none;">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
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
                                            <input type="text" class="form-control" name="description" value="{{old('description')}}">
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="street1">Street 1</label>
                                                    <input type="text" class="form-control" name="street1" value="{{old('street1')}}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="street2">Street 2</label>
                                                    <input type="text" class="form-control" name="street2" value="{{old('street2')}}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="city">City</label>
                                                    <input type="text" class="form-control" name="city" value="{{old('city')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="state">State</label>
                                                    <input type="text" class="form-control" name="state" value="{{old('state')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="zip">Zip</label>
                                                    <input type="text" class="form-control" name="zip" value="{{old('zip')}}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="max_stay_days">Max Stay (Days)</label>
                                                    <input type="number" class="form-control" name="max_stay_days" value="{{old('max_stay_days')}}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="beds">Beds</label>
                                                    <input type="number" class="form-control" name="beds" value="{{old('beds')}}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <br>
                                                <div class="checkbox">
                                                    <label for="kid_friendly">
                                                        <input type="checkbox" name="kid_friendly" value="{{old('kid_friendly')}}1"> Kid Friendly
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <br>
                                                <div class="checkbox">
                                                    <label for="pet_friendly">
                                                        <input type="checkbox" name="pet_friendly" value="{{old('pet_friendly')}}1"> Pet Friendly
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="start_date">Start Date</label>
                                                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{old('start_date')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="end_date">End Date</label>
                                                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{old('end_date')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <button class="btn btn-coral" type="submit">Save</button>
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
