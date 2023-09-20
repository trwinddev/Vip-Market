@extends('layouts.app')
@section('content')
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100 mt-5">
            <div class="card" style="border-radius: 6px">
                <div class="card-body p-md-5">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                            <p class="text-center h2 fw-bold mb-5 mx-1 mx-md-4 mt-4">Create New Password</p>
                            <form action="{{ route('password.update') }}" method="post" class="mx-1 mx-md-4">
                                @csrf
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <input type="email" name="email" class="form-control" value="{{ request('email') }}"
                                        readonly />
                                </div>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Password" />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <input type="password" name="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        placeholder="Confirm password" />
                                    @error('password_confirmation')
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="token" value="{{ request()->route('token') }}">
                                    <button type="submit" class="btn btn-danger w-100">Reset Password</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                class="img-fluid" alt="Sample image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
