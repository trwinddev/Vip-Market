@extends('layouts.app')
@section('content')
    <div class="slider" style="margin-top: -25px;">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="slider/slider1.png" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="slider/slider2.png" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="slider/slider3.png" alt="Third slide">
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <span>
            <h1>Car</h1>
            <a href="#" class="float-right">View all</a>
        </span>
        <div id="carouselExampleFade" class="carousel slide " data-ride="carousel" data-interval="2500">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-3">
                            <img src="/product/car1.jpg" class="img-thumbnail">
                            <p class="text-center  card-footer" style="color: blue;">
                                Name of product/$500
                            </p>
                        </div>
                        <div class="col-3">
                            <img src="/product/car1.jpg" class="img-thumbnail">
                            <p class="text-center  card-footer">
                                Name of product/$500
                            </p>
                        </div>

                        <div class="col-3">
                            <img src="/product/car1.jpg" class="img-thumbnail">
                            <p class="text-center  card-footer">
                                Name of product/$500
                            </p>
                        </div>

                        <div class="col-3">
                            <img src="/product/car1.jpg" class="img-thumbnail">
                            <p class="text-center  card-footer">
                                Name of product/$500
                            </p>
                        </div>

                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-3">
                            <img src="/product/car2.jpg" class="img-thumbnail">
                            <p class="text-center  card-footer">
                                Name of product/$500
                            </p>
                        </div>
                        <div class="col-3">
                            <img src="/product/car2.jpg" class="img-thumbnail">
                            <p class="text-center  card-footer">
                                Name of product/$500
                            </p>
                        </div>
                        <div class="col-3">
                            <img src="/product/car2.jpg" class="img-thumbnail">
                            <p class="text-center  card-footer">
                                Name of product/$500
                            </p>
                        </div>

                        <div class="col-3">
                            <img src="/product/car2.jpg" class="img-thumbnail">
                            <p class="text-center  card-footer">
                                Name of product/$500
                            </p>
                        </div>

                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
@endsection
