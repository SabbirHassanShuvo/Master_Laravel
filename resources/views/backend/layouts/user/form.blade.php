@extends('backend.master')
@section('title', 'Admin Dashboard')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-sm-8 m-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="title-header option-title">
                            <h5>Add New User</h5>
                        </div>
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button">Account</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button">Pernission</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                                <form class="theme-form theme-form-2 mega-form" action="{{ route('storeUser') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="card-header-1">
                                        <h5>User Information</h5>
                                    </div>

                                    {{-- Success message --}}
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    {{-- Validation errors --}}
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="row">
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-lg-2 col-md-3 mb-0">First Name</label>
                                            <div class="col-md-9 col-lg-10">
                                                <input class="form-control" type="text" name="name"
                                                    value="{{ old('name') }}">
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-lg-2 col-md-3 col-form-label form-label-title">Email
                                                Address</label>
                                            <div class="col-md-9 col-lg-10">
                                                <input class="form-control" type="email" name="email"
                                                    value="{{ old('email') }}" required>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label
                                                class="col-lg-2 col-md-3 col-form-label form-label-title">Password</label>
                                            <div class="col-md-9 col-lg-10">
                                                <input class="form-control" type="password" name="password" required>
                                            </div>
                                        </div>

                                        <div class="row align-items-center">
                                            <label class="col-lg-2 col-md-3 col-form-label form-label-title">Confirm
                                                Password</label>
                                            <div class="col-md-9 col-lg-10">
                                                <input class="form-control" type="password" name="password_confirmation"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center mt-4">
                                            <label class="col-lg-2 col-md-3 col-form-label form-label-title">Phone</label>
                                            <div class="col-md-9 col-lg-10">
                                                <input class="form-control" type="text" name="phone"
                                                    value="{{ old('phone') }}">
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-lg-2 col-md-3 col-form-label form-label-title">Photo</label>
                                            <div class="col-md-9 col-lg-10">
                                                <input class="form-control" type="file" name="photo" id="photoInput">
                                                <div class="mt-3" id="photoPreview"
                                                    style="display: none; opacity: 0; transition: opacity 0.3s ease;">
                                                    <img src="" alt="Photo Preview"
                                                        class="img-thumbnail rounded shadow-sm"
                                                        style="max-width: 150px; max-height: 150px; object-fit: cover; border: 1px solid #e9ecef;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-9 offset-md-2">
                                                <button type="submit" class="btn btn-primary">Create User</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>

                            <div class="tab-pane fade" id="pills-profile" role="tabpanel">
                                <div class="card-header-1">
                                    <h5>Product Related Permition</h5>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="col-md-2 mb-0">Add Product</label>
                                    <div class="col-md-9">
                                        <form class="radio-section">
                                            <label>
                                                <input type="radio" name="opinion" checked>
                                                <i></i>
                                                <span>Allow</span>
                                            </label>

                                            <label>
                                                <input type="radio" name="opinion" />
                                                <i></i>
                                                <span>Deny</span>
                                            </label>
                                        </form>
                                    </div>
                                </div>

                                <div class="mb-4 row align-items-center">
                                    <label class="col-md-2 mb-0">Update Product</label>
                                    <div class="col-md-9">
                                        <form class="radio-section">
                                            <label>
                                                <input type="radio" name="opinion" />
                                                <i></i>
                                                <span>Allow</span>
                                            </label>

                                            <label>
                                                <input type="radio" name="opinion" checked>
                                                <i></i>
                                                <span>Deny</span>
                                            </label>
                                        </form>
                                    </div>
                                </div>

                                <div class="mb-4 row align-items-center">
                                    <label class="col-md-2 mb-0">Delete Product</label>
                                    <div class="col-md-9">
                                        <form class="radio-section">
                                            <label>
                                                <input type="radio" name="opinion" checked>
                                                <i></i>
                                                <span>Allow</span>
                                            </label>

                                            <label>
                                                <input type="radio" name="opinion" />
                                                <i></i>
                                                <span>Deny</span>
                                            </label>
                                        </form>
                                    </div>
                                </div>

                                <div class="mb-4 row align-items-center">
                                    <label class="col-md-2 mb-0">Apply Discount</label>
                                    <div class="col-md-9">
                                        <form class="radio-section">
                                            <label>
                                                <input type="radio" name="opinion" />
                                                <i></i>
                                                <span>Allow</span>
                                            </label>

                                            <label>
                                                <input type="radio" name="opinion" checked>
                                                <i></i>
                                                <span>Deny</span>
                                            </label>
                                        </form>
                                    </div>
                                </div>

                                <div class="card-header-1">
                                    <h5>Category Related Permition</h5>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="col-md-2 mb-0">Add Product</label>
                                    <div class="col-md-9">
                                        <form class="radio-section">
                                            <label>
                                                <input type="radio" name="opinion" checked>
                                                <i></i>
                                                <span>Allow</span>
                                            </label>

                                            <label>
                                                <input type="radio" name="opinion" />
                                                <i></i>
                                                <span>Deny</span>
                                            </label>
                                        </form>
                                    </div>
                                </div>

                                <div class="mb-4 row align-items-center">
                                    <label class="col-md-2 mb-0">Update Product</label>
                                    <div class="col-md-9">
                                        <form class="radio-section">
                                            <label>
                                                <input type="radio" name="opinion" />
                                                <i></i>
                                                <span>Allow</span>
                                            </label>

                                            <label>
                                                <input type="radio" name="opinion" checked>
                                                <i></i>
                                                <span>Deny</span>
                                            </label>
                                        </form>
                                    </div>
                                </div>

                                <div class="mb-4 row align-items-center">
                                    <label class="col-md-2 mb-0">Delete Product</label>
                                    <div class="col-md-9">
                                        <form class="radio-section">
                                            <label>
                                                <input type="radio" name="opinion" />
                                                <i></i>
                                                <span>Allow</span>
                                            </label>

                                            <label>
                                                <input type="radio" name="opinion" checked>
                                                <i></i>
                                                <span>Deny</span>
                                            </label>
                                        </form>
                                    </div>
                                </div>

                                <div class="mb-4 row align-items-center">
                                    <label class="col-md-2 mb-0">Apply Discount</label>
                                    <div class="col-md-9">
                                        <form class="radio-section">
                                            <label>
                                                <input type="radio" name="opinion" checked>
                                                <i></i>
                                                <span>Allow</span>
                                            </label>

                                            <label>
                                                <input type="radio" name="opinion" />
                                                <i></i>
                                                <span>Deny</span>
                                            </label>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
