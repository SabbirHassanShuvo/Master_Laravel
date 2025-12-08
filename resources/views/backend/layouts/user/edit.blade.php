@extends('backend.master')
@section('title', 'Edit User')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-sm-8 m-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="title-header option-title">
                            <h5>Edit User</h5>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="theme-form theme-form-2 mega-form" action="{{ route('user.update', $user->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="card-header-1">
                                <h5>User Information</h5>
                            </div>

                            <div class="row">
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-lg-2 col-md-3 mb-0">First Name</label>
                                    <div class="col-md-9 col-lg-10">
                                        <input class="form-control" type="text" name="name"
                                            value="{{ old('name', $user->name) }}">
                                    </div>
                                </div>

                                <div class="mb-4 row align-items-center">
                                    <label class="col-lg-2 col-md-3 col-form-label form-label-title">Email Address</label>
                                    <div class="col-md-9 col-lg-10">
                                        <input class="form-control" type="email" name="email"
                                            value="{{ old('email', $user->email) }}" required>
                                    </div>
                                </div>

                                <div class="mb-4 row align-items-center mt-4">
                                    <label class="col-lg-2 col-md-3 col-form-label form-label-title">Phone</label>
                                    <div class="col-md-9 col-lg-10">
                                        <input class="form-control" type="text" name="phone"
                                            value="{{ old('phone', $user->phone) }}">
                                    </div>
                                </div>

                                <div class="mb-4 row align-items-center">
                                    <label class="col-lg-2 col-md-3 col-form-label form-label-title">Photo</label>
                                    <div class="col-md-9 col-lg-10">
                                        <input class="form-control" type="file" name="photo" id="photoInput">
                                        <div class="mt-3" id="photoPreview">
                                            <img src="{{ asset($user->photo ? 'uploads/users/' . $user->photo : 'uploads/users/default.png') }}"
                                                alt="Photo Preview" class="img-thumbnail rounded shadow-sm"
                                                style="max-width: 150px; max-height: 150px; object-fit: cover; border: 1px solid #e9ecef;">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-9 offset-md-2">
                                        <button type="submit" class="btn btn-primary">Update User</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
