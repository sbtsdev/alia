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
                                        <input type="text" class="form-control input-lg" id="city">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="beds">How many people?</label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-lg btn-primary" @click="decreaseBeds"><i class="fa fa-minus"></i></button>
                                            </span>
                                            <input type="text" class="form-control input-number input-lg" id="beds" v-model="filter.beds">
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
                                            <input type="text" class="form-control input-number input-lg" id="nights" v-model="filter.nights">
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
    <section class="listings" v-if="listings" v-cloak>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
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
        const app = new Vue({
            data: {
                listings: null,
                filter: {
                    city: '',
                    state: '',
                    lat: null,
                    lng: null,
                    beds: 1,
                    nights: 1
                }
            },
            methods: {
                cityUpdate: function (suggestion) {
                    this.filter.city = suggestion.name
                    this.filter.state = suggestion.administrative
                    this.filter.lat = suggestion.latlng.lat
                    this.filter.lng = suggestion.latlng.lng
                },
                decreaseBeds: function () {
                    return this.filter.beds > 1 ? this.filter.beds-- : this.filter.beds
                },
                increaseBeds: function () {
                    return this.filter.beds++
                },
                decreaseNights: function () {
                    return this.filter.nights > 1 ? this.filter.nights-- : this.filter.nights
                },
                increaseNights: function () {
                    return this.filter.nights++
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

        placesAutocomplete.on('change', e => app.cityUpdate(e.suggestion));

    </script>
@endpush
