@extends('backend.master')

@section('content')
    <div class="container">
        <h3>Edit Profile</h3>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (!$user)
            <div class="alert alert-danger">No user found! Login required.</div>
        @endif

        <form action="{{ route('settings.profile.update') }}" method="POST" enctype="multipart/form-data"
            class="theme-form theme-form-2 mega-form">
            @csrf
            <div class="row">
                <!-- Name, Phone, Email, Photo, Password fields একইভাবে থাকবে -->
                <div class="mb-4 row align-items-center">
                    <label class="form-label-title col-sm-2 mb-0">Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="name" value="{{ old('name', $user->name) }}">
                    </div>
                </div>
                <!-- Photo preview JS -->
                <div class="mb-4 row align-items-center">
                    <label class="col-sm-2 col-form-label form-label-title">Photo</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" name="photo" id="photoInput">
                        <div class="mt-3" id="photoPreview">
                            <img src="{{ asset($user->photo ? 'uploads/users/' . $user->photo : 'uploads/users/default.png') }}"
                                class="img-thumbnail" style="max-width:150px;">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 text-end">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
            </div>
        </form>
    </div>
@endsection
