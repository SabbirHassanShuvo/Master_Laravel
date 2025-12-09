@extends('backend.master')

@section('content')
    <form method="POST" action="{{ route('settings.mail.update') }}" class="card p-4 shadow-sm">
        @csrf

        @php
            $envKeys = [
                'MAIL_MAILER',
                'MAIL_HOST',
                'MAIL_PORT',
                'MAIL_USERNAME',
                'MAIL_PASSWORD',
                'MAIL_ENCRYPTION',
                'MAIL_FROM_ADDRESS',
            ];
        @endphp

        @foreach ($mailSettings as $key => $value)
            <div class="row mb-4">
                <label for="{{ $key }}" class="col-md-3 form-label">{{ str_replace('_', ' ', $key) }}</label>
                <div class="col-md-9">
                    <input class="form-control @error($key) is-invalid @enderror" id="{{ $key }}"
                        name="{{ $key }}" type="text" value="{{ old($key, $value) }}"
                        placeholder="Enter {{ str_replace('_', ' ', $key) }}">
                    @error($key)
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        @endforeach


        <div class="row justify-content-end">
            <div class="col-sm-9">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </div>
    </form>
@endsection
