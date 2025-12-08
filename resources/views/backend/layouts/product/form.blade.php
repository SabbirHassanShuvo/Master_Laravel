@extends('backend.master')
@section('title', 'Admin Dashboard')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-sm-8 m-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header-2">
                            <h5>Product Information</h5>
                        </div>

                        <form class="theme-form theme-form-2 mega-form" action="{{ route('storeProduct') }}" method="POST">
                            @csrf

                            <!-- Success/Error messages -->
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
                            <!-- 1. Product Name -->
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Product Name</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="name" placeholder="Product Name">
                                </div>
                            </div>

                            <!-- 2. Product Type -->
                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 col-form-label form-label-title">Product Type</label>
                                <div class="col-sm-9">
                                    <select class="js-example-basic-single w-100" name="product_type">
                                        <option disabled selected>Select Type</option>
                                        <option value="Simple">Simple</option>
                                        <option value="Classified">Classified</option>
                                    </select>
                                </div>
                            </div>

                            <!-- 3. Category -->
                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 col-form-label form-label-title">Category</label>
                                <div class="col-sm-9">
                                    <select class="js-example-basic-single w-100" name="category">
                                        <option disabled selected>Select Category</option>
                                        <option value="Electronics">Electronics</option>
                                        <option value="Home & Furniture">Home & Furniture</option>
                                        <option value="Health & Beauty">Health & Beauty</option>
                                    </select>
                                </div>
                            </div>

                            <!-- 4. Brand -->
                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 col-form-label form-label-title">Brand</label>
                                <div class="col-sm-9">
                                    <select class="js-example-basic-single w-100" name="brand">
                                        <option disabled selected>Select Brand</option>
                                        <option value="Puma">Puma</option>
                                        <option value="HRX">HRX</option>
                                        <option value="Zara">Zara</option>
                                    </select>
                                </div>
                            </div>

                            <!-- 5. Unit -->
                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 col-form-label form-label-title">Unit</label>
                                <div class="col-sm-9">
                                    <select class="js-example-basic-single w-100" name="unit">
                                        <option disabled selected>Select Unit</option>
                                        <option value="Pieces">Pieces</option>
                                        <option value="Kilogram">Kilogram</option>
                                    </select>
                                </div>
                            </div>

                            <!-- 6. Tags -->
                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 col-form-label form-label-title">Tags</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="tags"
                                        placeholder="Type tag & hit enter">
                                </div>
                            </div>

                            <!-- 7. Exchangeable -->
                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 col-form-label form-label-title">Exchangeable</label>
                                <div class="col-sm-9">
                                    <label class="switch">
                                        <input type="checkbox" name="exchangeable" value="1"><span
                                            class="switch-state"></span>
                                    </label>
                                </div>
                            </div>

                            <!-- 8. Refundable -->
                            <div class="row align-items-center">
                                <label class="col-sm-3 col-form-label form-label-title">Refundable</label>
                                <div class="col-sm-9">
                                    <label class="switch">
                                        <input type="checkbox" name="refundable" value="1" checked><span
                                            class="switch-state"></span>
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
