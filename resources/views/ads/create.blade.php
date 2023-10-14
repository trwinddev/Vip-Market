@extends('layouts.app')
@section('content')
    <div>
        <example-component />
    </div>
    <div class="container">
        <div class="row ">
            <div class="col-md-3">
                <div class="card ">
                    <div class="card-body ">
                        <img class="mx-auto d-block img-thumbnail" src="/img/man.jpg" width="130">
                        <p class="text-center"><b>John Doe</b></p>
                    </div>
                    <hr style="border:2px solid blue;">
                    <div class="vertical-menu">
                        <a href="#">Dashboard</a>
                        <a href="#">Profile</a>
                        <a href="#">Create ads</a>
                        <a href="#">Published ads</a>
                        <a href="#">Pending ads</a>
                        <a href="#" class="">Message</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <form action="{{ route('ads.store') }}" method="post" enctype="multipart/form-data">@csrf
                    <div class="card">
                        <div class="card-header text-white" style="background-color: red">
                            Post your ad.
                        </div>
                        <div class="card-body">
                            <label for="file" class="mt-2"><b>Upload 3 Images</b></label>
                            <div class="form-inline form-group mt-1">
                                <div class="col-md-4">
                                    <image-preview />
                                </div>
                                <div class="col-md-4">
                                    <first-image />
                                </div>
                                <div class="col-md-4">
                                    <second-image />
                                </div>
                            </div>
                            <label for="file" class="mt-2"><b>Choose category</b></label>
                            <div class="form-inline form-group mt-1">
                                <category-dropdown />
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Price</label>
                                <input type="text" name="price" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Price staus</label>
                                <select class="form-control" name="price_status">
                                    <option value="negoitable">Negotiable</option>
                                    <option value="fixed">Fixed</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Product Condition</label>
                                <select class="form-control" name="product_condition">
                                    <option value="">Select </option>
                                    <option value="likenew">Looks like New</option>
                                    <option value="heavilyused">Heavily Used</option>
                                    <option value="new">New</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="location">Listing Location</label>
                                <input type="text" class="form-control" name="listing_location">
                            </div>
                            <label for="file" class="mt-2"><b>Choose address</b></label>
                            <div class="form-inline form-group mt-1">
                                <div class="col-md-4">
                                    <select class="form-control" name="country_id">
                                        <option value=""> Select country</option>
                                        @foreach (App\Models\Country::all() as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control" name="state_id">
                                        <option value="">Select state</option>
                                        @foreach (App\Models\State::all() as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control" name="city_id">
                                        <option value="">Select city </option>
                                        @foreach (App\Models\City::all() as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="location">Seller contact number</label>
                                <input type="number" class="form-control" name="phone_number">
                            </div>
                            <div class="form-group">
                                <label for="location">Demo link of product(ie:youtube)</label>
                                <input type="text" class="form-control" name="link">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger float-right" type="submit">Publish</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
