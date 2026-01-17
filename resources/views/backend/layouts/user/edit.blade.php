@extends('backend.master')
@section('title', 'Edit User')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-sm-8 m-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="title-header option-title d-flex align-items-center justify-content-between">
                            <h5>Edit User</h5>
                            <a href="{{ route('userList') }}" class="btn btn-secondary d-flex align-items-center">
                                <i data-feather="arrow-left" class="me-1"></i>
                                Back
                            </a>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
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

                        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                {{-- Name --}}
                                <div class="col-md-6 mb-3">
                                    <label>First Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('name', $user->name) }}">
                                </div>

                                {{-- Phone --}}
                                <div class="col-md-6 mb-3">
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control"
                                        value="{{ old('phone', $user->phone) }}">
                                </div>
                            </div>

                            <div class="row">
                                {{-- Email --}}
                                <div class="col-md-6 mb-3">
                                    <label>Email Address</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ old('email', $user->email) }}" required>
                                </div>

                                {{-- Role --}}
                                <div class="col-md-6 mb-3">
                                    <label>Role</label>
                                    <select name="role" class="form-control" id="roleSelect">
                                        <option value="">Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                {{ old('role', $userRole ? $userRole->id : '') == $role->id ? 'selected' : '' }}>
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <small class="form-text text-muted">Select a role to assign access permissions to this
                                        user.</small>
                                </div>
                            </div>

                            <div class="row">
                                {{-- Photo --}}
                                <div class="col-md-6 mb-3">
                                    <label>Photo</label>
                                    <input type="file" name="photo" class="form-control" id="photoInput">
                                    <div class="mt-2">
                                        @php
                                            $imageSrc = 'uploads/users/default.png';
                                            if ($user->photo) {
                                                // Check if path already includes 'uploads/users/' or is just filename
                                                if (strpos($user->photo, 'uploads/users/') === 0) {
                                                    $imageSrc = $user->photo;
                                                } else {
                                                    $imageSrc = 'uploads/users/' . $user->photo;
                                                }
                                            }
                                        @endphp
                                        <img id="photoPreview" src="{{ asset($imageSrc) }}" alt="Photo Preview"
                                            class="img-thumbnail"
                                            style="max-width: 150px; max-height: 150px; object-fit: cover; display: block;">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update User</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
@endpush

@push('scripts')
    {{-- Scripts --}}
    <script>
        // Image preview
        document.getElementById('photoInput').addEventListener('change', function(event) {
            const [file] = this.files;
            if (file) {
                const preview = document.getElementById('photoPreview');
                preview.src = URL.createObjectURL(file);
            }
        });
    </script>
@endpush
