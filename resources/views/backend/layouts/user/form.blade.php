@extends('backend.master')
@section('title', 'Admin Dashboard')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-sm-8 m-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="title-header option-title d-flex align-items-center justify-content-between">
                            <h5>Add New User</h5>

                            <a href="{{ route('userList') }}" class="btn btn-secondary d-flex align-items-center">
                                <i data-feather="arrow-left" class="me-1"></i>
                                Back
                            </a>
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
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

                                <form action="{{ route('storeUser') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        {{-- Name --}}
                                        <div class="col-md-6 mb-3">
                                            <label>First Name</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ old('name') }}">
                                        </div>

                                        {{-- Phone --}}
                                        <div class="col-md-6 mb-3">
                                            <label>Phone</label>
                                            <input type="text" name="phone" class="form-control"
                                                value="{{ old('phone') }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        {{-- Email --}}
                                        <div class="col-md-6 mb-3">
                                            <label>Email Address</label>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ old('email') }}" required>
                                        </div>

                                        {{-- Role --}}
                                        <div class="col-md-6 mb-3">
                                            <label>Role</label>
                                            <select name="role" class="form-control" id="roleSelect">
                                                <option value="">Select Role</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}"
                                                        {{ old('role') == $role->id ? 'selected' : '' }}>
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <small class="form-text text-muted">Select a role to assign access permissions
                                                to this
                                                user.</small>
                                        </div>
                                    </div>

                                    <div class="row">
                                        {{-- Password --}}
                                        <div class="col-md-6 mb-3">
                                            <label>Password</label>
                                            <div class="input-group">
                                                <input type="password" name="password" id="password" class="form-control"
                                                    required>
                                                <span class="input-group-text" onclick="togglePassword('password')"
                                                    style="cursor:pointer;">
                                                    <i class="fa fa-eye" id="passwordIcon"></i>
                                                </span>
                                            </div>
                                        </div>

                                        {{-- Confirm Password --}}
                                        <div class="col-md-6 mb-3">
                                            <label>Confirm Password</label>
                                            <div class="input-group">
                                                <input type="password" name="password_confirmation"
                                                    id="password_confirmation" class="form-control" required>
                                                <span class="input-group-text"
                                                    onclick="togglePassword('password_confirmation')"
                                                    style="cursor:pointer;">
                                                    <i class="fa fa-eye" id="confirmPasswordIcon"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Photo --}}
                                    <div class="mb-3">
                                        <label>Photo</label>
                                        <input type="file" name="photo" class="form-control" id="photoInput">
                                        <div class="mt-2">
                                            <img id="photoPreview" src="{{ asset('uploads/users/default.png') }}"
                                                alt="Photo Preview" class="img-thumbnail"
                                                style="max-width: 150px; max-height: 150px; object-fit: cover;">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Create User</button>
                                </form>

                            </div>
                        </div>
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
        function togglePassword(id) {
            const input = document.getElementById(id);
            const icon = id === 'password' ? document.getElementById('passwordIcon') : document.getElementById(
                'confirmPasswordIcon');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

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
