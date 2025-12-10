@extends('backend.master')

@section('content')
    <div class="container">

        <div class="col-12">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Details Start -->
                    <div class="card">
                        <div class="card-body">
                            <div class="title-header option-title">
                                <h5>Profile Setting</h5>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            @if (!$user)
                                <div class="alert alert-danger">No user found! Login required.</div>
                            @endif
                            <form action="{{ route('settings.profile.update') }}" method="POST"
                                enctype="multipart/form-data" class="theme-form theme-form-2 mega-form">
                                @csrf
                                <div class="row">
                                    <!-- Name -->
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="name"
                                                value="{{ old('name', $user->name) }}" placeholder="Enter Your Name" />
                                        </div>
                                    </div>

                                    <!-- Phone -->
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">Phone Number</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="phone"
                                                value="{{ old('phone', $user->phone) }}" placeholder="Enter Your Number" />
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">Email Address</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="email" name="email"
                                                value="{{ old('email', $user->email) }}"
                                                placeholder="Enter Your Email Address" />
                                        </div>
                                    </div>

                                    <!-- Photo -->
                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-2 col-form-label form-label-title">Photo</label>

                                        <div class="col-sm-10">
                                            <input class="form-control form-choose" type="file" name="photo"
                                                id="photoInput">

                                            <div class="mt-3" id="photoPreview">
                                                <img src="{{ asset($user->photo ? 'uploads/users/' . $user->photo : 'uploads/users/default.png') }}"
                                                    alt="Photo Preview" class="img-thumbnail rounded shadow-sm"
                                                    style="max-width: 150px; max-height:150px; object-fit: cover; border:1px solid #e9ecef;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 text-end">
                                        <button type="submit" class="btn btn-primary">
                                            Update Profile
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <form action="{{ route('settings.password.update') }}" method="POST"
                            class="theme-form theme-form-2 mega-form mt-5">
                            @csrf
                            <div class="row">

                                <!-- Current Password -->
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-2 mb-0">Current Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" name="current_password"
                                            placeholder="Enter Current Password" required />
                                        @error('current_password')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- New Password -->
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-2 mb-0">New Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" name="new_password"
                                            placeholder="Enter New Password" required />
                                        @error('new_password')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Confirm Password -->
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-2 mb-0">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" name="new_password_confirmation"
                                            placeholder="Confirm New Password" required />
                                    </div>
                                </div>

                                <div class="col-sm-12 text-end">
                                    <button type="submit" class="btn btn-primary">Update Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Details End -->
                </div>
            </div>
        </div>

    </div>
@endsection
