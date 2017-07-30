@extends('layout')

@section('content')
    <section class="hero">
        <div class="filter" id="filter">
            <div class="container">
                <form id="form">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city">Find a city</label>
                                        <input type="text" class="form-control input-lg" id="city">
                                    </div>
                                </div>
                                <div class="col-md-3">
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
                                <div class="col-md-3">
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
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <button class="btn btn-lg btn-block btn-coral" type="button" v-if="status == 'clean'" @click="findPlace">Find a Place</button>
                                <button class="btn btn-lg btn-block btn-coral" type="button" v-if="status == 'dirty'" @click="findPlace">Search again</button>
                                <button class="btn btn-lg btn-block btn-default" type="button" v-if="status == 'processing'" disabled v-cloak><i class="fa fa-spinner fa-spin"></i></button>
                                <button class="btn btn-lg btn-block btn-danger" type="button" v-if="status == 'error'" v-cloak><i class="fa fa-exclamation-triangle"></i> Error</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section id="listings" class="listings" v-if="status != 'clean'" v-cloak>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <template v-if="listings.length > 0">
                                <div class="listing" v-for="listing in listings">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <template v-if="listing.images.length > 0">
                                                <img :src="listing.images[0].path" :alt="'Image for ' + listing.name">
                                            </template>
                                        </div>
                                        <div class="col-md-8">
                                            <h3><a :href="'/listings/' + listing.id" target="_blank" v-text="listing.name"></a></h3>
                                            <p v-text="listing.description"></p>
                                            <p>
                                                <strong>Location:</strong> @{{ listing.city }}, @{{ listing.state }}<br>
                                                <strong>Neighborhood:</strong> @{{ listing.neighborhood }}
                                            </p>
                                            <p>
                                                <strong>Sleeps:</strong> @{{ listing.beds }} &nbsp;&nbsp;&nbsp; <strong>Kid-friendly:</strong> <i :class="listing.kid_icon"></i> &nbsp;&nbsp;&nbsp; <strong>Pet-friendly:</strong> <i :class="listing.pet_icon"></i> &nbsp;&nbsp;&nbsp; <strong>Listing type:</strong> @{{ listing.listing_type }}<br>
                                            </p>
                                            <p>
                                                <br>
                                                <a class="btn btn-coral" :href="'/listings/' + listing.id">Request stay</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </template>
                            <template v-if="listings.length == 0">
                                <div class="text-center">
                                    <span v-if="status != 'processing'">Your search returned no results</span>
                                    <span v-if="status == 'processing'"><i class="fa fa-spinner fa-spin"></i></span>
                                </div>
                            </template>
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
                filter: {
                    city: '',
                    state: '',
                    lat: null,
                    lng: null,
                    beds: 1,
                    nights: 1
                },
                listings: [],
                status: 'clean'
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
                },
                findPlace: function () {
                    this.status = 'processing'
                    this.listings = [];

                    this.$http.post('/filter', { filter: this.filter }).then(function (response) {

                        app.status = 'dirty'
                        app.listings = response.data
                        app.gotEm()

                    }).catch(function (error) {

                        app.status = 'error'

                        setTimeout(function () {
                            app.status = 'clean'
                        }, 3000)
                    })
                },
                gotEm: function () {
                    $('html, body').animate({
                        scrollTop: window.innerHeight - 90
                    }, 400)
                },
                getFilterOffset: function () {
                    return window.innerHeight - 190
                }
            },
            mounted: function () {
                $('.filter').affix({
                    offset: {
                        top: this.getFilterOffset(),
                    }
                })
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
