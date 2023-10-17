@extends('layouts.app')
@section('content')
    <div class="container ">
        <div class="row ">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header text-white text-center" style="background-color: red;">Filter ::</div>
                    <div class="card-body">
                        @foreach ($filterByChildCategories as $filterchildcategory)
                            <p>
                                <a href="{{ url()->current() }}/{{ $filterchildcategory->childcategory->slug ?? '' }}">
                                    {{ $filterchildcategory->childcategory->name ?? '' }}
                                </a>
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-3">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
