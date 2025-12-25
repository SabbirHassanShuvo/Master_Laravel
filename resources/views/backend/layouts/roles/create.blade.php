@extends('backend.master')

@section('title', 'Create Role')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-9">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h4 class="mb-1">Create Role</h4>
                    <p class="text-muted mb-0">
                        Define a new role and choose which permissions it should have.
                    </p>
                </div>
                <a href="{{ route('roles.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left-circle me-1"></i> Back to Roles
                </a>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">

                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf

                        {{-- Role info --}}
                        <div class="mb-4">
                            <h6 class="text-uppercase text-muted fw-semibold mb-3" style="font-size: 11px;">
                                Role details
                            </h6>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label fw-semibold">
                                        Role name <span class="text-danger">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="e.g. Admin, Moderator, Support"
                                        value="{{ old('name') }}"
                                        required
                                    >
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 d-flex align-items-end">
                                    <small class="text-muted">
                                        Use clear, descriptive names so it’s obvious what access this role has.
                                    </small>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        {{-- Permissions --}}
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div>
                                    <h6 class="text-uppercase text-muted fw-semibold mb-1" style="font-size: 11px;">
                                        Permissions
                                    </h6>
                                    <small class="text-muted">
                                        Select the actions users with this role are allowed to perform.
                                    </small>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" id="select-all" class="form-check-input">
                                    <label for="select-all" class="form-check-label fw-semibold">
                                        Select all
                                    </label>
                                </div>
                            </div>

                            <div class="border rounded-3 p-3" style="max-height: 420px; overflow:auto;">
                                <div class="row g-3">
                                    @foreach ($permissions as $permission)
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    name="permissions[]"
                                                    value="{{ $permission->name }}"
                                                    id="perm-{{ $permission->id }}"
                                                >
                                                <label class="form-check-label" for="perm-{{ $permission->id }}">
                                                    {{ ucwords(str_replace('_', ' ', $permission->name)) }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            @error('permissions')
                                <small class="text-danger d-block mt-1">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Actions --}}
                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <button type="reset" class="btn btn-light border">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i> Create Role
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectAll = document.getElementById('select-all');
        const boxes = document.querySelectorAll('input[name="permissions[]"]');

        if (selectAll) {
            selectAll.addEventListener('change', function () {
                boxes.forEach(cb => cb.checked = this.checked);
            });
        }
    });
</script>
@endpush
