@extends('layout')

@section('content')
    <section class="hero">
        <div class="filter">
            <div class="container">
                <form id="form">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="city">Find a city</label>
                                        <input type="text" class="form-control input-lg" id="city" v-model="city">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="beds">How many people?</label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-lg btn-primary" @click="decreaseBeds"><i class="fa fa-minus"></i></button>
                                            </span>
                                            <input type="text" class="form-control input-number input-lg" id="beds" v-model="beds">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-lg btn-primary" @click="increaseBeds"><i class="fa fa-plus"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="nights">How many nights?</label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-lg btn-primary" @click="decreaseNights"><i class="fa fa-minus"></i></button>
                                            </span>
                                            <input type="text" class="form-control input-number input-lg" id="nights" v-model="nights">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-lg btn-primary" @click="increaseNights"><i class="fa fa-plus"></i></button>
                                            </span>
                                        </div>
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
    </section>
    <section class="home-description">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="text-center">
                                <i class="fa fa-calendar"></i>
                                <h3>Plan</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="text-center">
                                <i class="fa fa-plane"></i>
                                <h3>Travel</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="text-center">
                                <i class="fa fa-bed"></i>
                                <h3>Stay</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.4.15"></script>
    <script>
        const App = new Vue({
            data: {
                city: '',
                state: '',
                latlng: null,
                beds: 1,
                nights: 1
            },
            methods: {
                cityUpdate: function (suggestion) {
                    console.log(suggestion)
                    this.city = suggestion.name
                    this.state = suggestion.administrative
                    this.latlng = suggestion.latlng
                },
                decreaseBeds: function () {
                    return this.beds > 1 ? this.beds-- : this.beds
                },
                increaseBeds: function () {
                    return this.beds++
                },
                decreaseNights: function () {
                    return this.nights > 1 ? this.nights-- : this.nights
                },
                increaseNights: function () {
                    return this.nights++
                }
            },
            mounted: function () {
            }
        }).$mount('#app')

        var placesAutocomplete = places({
            container: document.querySelector('#city'),
            countries: ['us'],
            type: 'city'
        })

        placesAutocomplete.on('change', e => App.cityUpdate(e.suggestion));

    </script>
@endpush
