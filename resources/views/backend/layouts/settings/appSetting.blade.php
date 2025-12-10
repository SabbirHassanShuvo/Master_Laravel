@extends('backend.master')
@section('content')
    <div class="container">
        <h2>App Setting</h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('app-setting.update') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Theme</label>
                <select name="theme" class="form-control">
                    <option value="light" {{ old('theme', $setting->theme) == 'light' ? 'selected' : '' }}>Light</option>
                    <option value="dark" {{ old('theme', $setting->theme) == 'dark' ? 'selected' : '' }}>Dark</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Push Notification</label>
                <select name="push_notification" class="form-control">
                    <option value="1" {{ old('push_notification', $setting->push_notification) ? 'selected' : '' }}>
                        Enable</option>
                    <option value="0" {{ !old('push_notification', $setting->push_notification) ? 'selected' : '' }}>
                        Disable</option>
                </select>
            </div>
            <div class="mb-3">
                <label>App Version</label>
                <input type="text" name="app_version" value="{{ old('app_version', $setting->app_version) }}"
                    class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
