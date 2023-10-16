@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-3">
                @include('sidebar')
            </div>
            <div class="col-md-9">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">View</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ads as $key => $ad)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>
                                    <img src="{{ Storage::url($ad->feature_image) }}" width="130" alt="">
                                </td>
                                <td>{{ $ad->name }}</td>
                                <td style="color: blue">{{ $ad->price }}</td>
                                <td>{{ $ad->price }}</td>
                                <td>
                                    @if ($ad->published == 1)
                                        <span class="badge badge-success">Published</span>
                                    @else
                                        <span class="badge badge-danger">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-success">View</button>
                                </td>
                                <td>
                                    <a href="{{ route('ads.edit', [$ad->id]) }}"> <button
                                            class="btn btn-primary">Edit</button></a>
                                    <button class="btn btn-primary">Edit</button>
                                </td>
                                <td>
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
