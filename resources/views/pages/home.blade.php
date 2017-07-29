@extends('layout')

@section('content')
    <div class="hero">
        <div class="filter">
            <div class="container">
                <form>
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="city">Find a city</label>
                                        <input type="text" class="form-control input-lg" id="city">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="beds">How many people?</label>
                                        <input type="text" class="form-control input-lg" id="beds">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="nights">How many nights?</label>
                                        <input type="text" class="form-control input-lg" id="nights">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <button class="btn btn-lg btn-block btn-coral">Find a Place</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
