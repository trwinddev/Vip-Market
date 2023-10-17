@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('sidebar')
            </div>
            <div class="col-md-5">
                <form action="" method="post" enctype="multipart/form-data">@csrf
                    <div class="card">
                        <div class="card-header text-white" style="background-color: red">Update profile</div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Fullname</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ auth()->user()->name }}">
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" class="form-control" name="address"
                                    value="{{ auth()->user()->address }}">
                            </div>
                            <div class="form-group">
                                <label for="">Profile picture</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Update profile</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <form action="" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header text-white" style="background-color: red">Change password</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Current pasword</label>
                                <input type="text" name="current_password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>New pasword</label>
                                <input type="text" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Confirm pasword</label>
                                <input type="text" name="password_confirmation" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger" type="submit">Update password</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
