@extends('backend.master')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 p-4">
                    <h2 class="text-center mb-4 fw-bold">Website Settings</h2>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('web-setting.update') }}" method="POST" enctype="multipart/form-data"
                        id="webSettingForm">
                        @csrf

                        <!-- Site Name -->
                        <div class="mb-4 form-floating">
                            <input type="text" name="site_name" value="{{ old('site_name', $setting->site_name) }}"
                                class="form-control form-control-lg" id="siteName" placeholder="Site Name">
                            <label for="siteName">Site Name</label>
                        </div>

                        <!-- SEO Meta Title -->
                        <div class="mb-4 form-floating">
                            <input type="text" name="seo_meta_title"
                                value="{{ old('seo_meta_title', $setting->seo_meta_title) }}"
                                class="form-control form-control-lg" id="seoMetaTitle" placeholder="SEO Meta Title">
                            <label for="seoMetaTitle">SEO Meta Title</label>
                        </div>

                        <!-- SEO Meta Description -->
                        <div class="mb-4 form-floating">
                            <textarea name="seo_meta_description" class="form-control" id="seoMetaDescription" placeholder="SEO Meta Description"
                                style="height:100px;">{{ old('seo_meta_description', $setting->seo_meta_description) }}</textarea>
                            <label for="seoMetaDescription">SEO Meta Description</label>
                        </div>

                        <!-- Social Links (JSON) -->
                        <div class="mb-4 form-floating">
                            <textarea name="social_links" class="form-control" id="socialLinks" placeholder='Social Links' style="height:80px;">{{ old('social_links', $setting->social_links) }}</textarea>
                            <label for="socialLinks">Social Links</label>
                        </div>

                        <!-- Logo Upload -->
                        <div class="mb-4">
                            <label class="form-label fw-medium">Logo</label>
                            <input type="file" name="logo" class="form-control form-control-sm" id="logoInput"
                                accept="image/*">
                            <div class="mt-2">
                                <img id="logoPreview" src="{{ $setting->logo ? asset($setting->logo) : '' }}"
                                    class="img-thumbnail rounded shadow-sm"
                                    style="width: 80px; height: auto; display: {{ $setting->logo ? 'block' : 'none' }}">
                            </div>
                        </div>

                        <!-- Favicon Upload -->
                        <div class="mb-4">
                            <label class="form-label fw-medium">Favicon</label>
                            <input type="file" name="favicon" class="form-control form-control-sm" id="faviconInput"
                                accept="image/*">
                            <div class="mt-2">
                                <img id="faviconPreview" src="{{ $setting->favicon ? asset($setting->favicon) : '' }}"
                                    class="img-thumbnail rounded shadow-sm"
                                    style="width: 32px; height: auto; display: {{ $setting->favicon ? 'block' : 'none' }}">
                            </div>
                        </div>

                        <!-- Contact Email -->
                        <div class="mb-4 form-floating">
                            <input type="email" name="contact_email"
                                value="{{ old('contact_email', $setting->contact_email) }}"
                                class="form-control form-control-lg" id="contactEmail" placeholder="Contact Email">
                            <label for="contactEmail">Contact Email</label>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg rounded-3 py-2 fw-semibold shadow-sm">
                                Update Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Logo Preview
            document.getElementById('logoInput').addEventListener('change', function(e) {
                const preview = document.getElementById('logoPreview');
                preview.style.display = 'block';
                if (e.target.files && e.target.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                    }
                    reader.readAsDataURL(e.target.files[0]);
                }
            });

            // Favicon Preview
            document.getElementById('faviconInput').addEventListener('change', function(e) {
                const preview = document.getElementById('faviconPreview');
                preview.style.display = 'block';
                if (e.target.files && e.target.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                    }
                    reader.readAsDataURL(e.target.files[0]);
                }
            });
        </script>
    @endpush
@endsection
