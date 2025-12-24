@extends('backend.master')
@section('title', 'Roles')

@section('content')
<div class="container-fluid py-4">

    {{-- Page Header --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-1">
                        <i class="bi bi-shield-lock me-2"></i> Roles Management
                    </h4>
                    <p class="text-muted mb-0">
                        View, edit and manage all roles and their permissions.
                    </p>
                </div>

                <a href="{{ route('roles.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-1"></i> Create Role
                </a>
            </div>
        </div>
    </div>

    {{-- Roles Table --}}
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-0 text-uppercase text-muted" style="font-size: 11px;">
                            Roles overview
                        </h6>
                        <small class="text-muted">
                            Total roles: {{ $roles->count() }}
                        </small>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table id="rolesTable" class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 60px;">#</th>
                                    <th style="width: 220px;">Role Name</th>
                                    <th>Permissions</th>
                                    <th style="width: 160px;" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($roles as $key => $role)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>

                                        <td>
                                            <span class="fw-semibold">{{ ucfirst($role->name) }}</span>
                                            @if(strtolower($role->name) === 'admin')
                                                <span class="badge bg-success-subtle text-success border ms-1">
                                                    System
                                                </span>
                                            @endif
                                        </td>

                                        <td>
                                            @if($role->permissions->count() > 0)
                                                @foreach($role->permissions as $permission)
                                                    <span class="badge bg-primary-subtle text-primary border mb-1 me-1">
                                                        {{ ucfirst(str_replace('_', ' ', $permission->name)) }}
                                                    </span>
                                                @endforeach
                                            @else
                                                <span class="text-muted">No permissions assigned</span>
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Role Actions">

                                                {{-- Edit --}}
                                                <a href="{{ route('roles.edit', $role->id) }}"
                                                   class="btn btn-outline-primary"
                                                   data-bs-toggle="tooltip"
                                                   data-bs-placement="top"
                                                   title="Edit Role">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>

                                                {{-- Delete (hide for admin role) --}}
                                                @if(strtolower($role->name) !== 'admin')
                                                    <form action="{{ route('roles.destroy', $role->id) }}"
                                                          method="POST"
                                                          class="d-inline-block"
                                                          onsubmit="return confirm('Are you sure you want to delete this role?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="btn btn-outline-danger"
                                                                data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                title="Delete Role">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                @endif

                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted py-4">
                                            No roles found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (window.$ && $.fn.DataTable) {
            $('#rolesTable').DataTable({
                responsive: false,    // j force visible
                autoWidth: false,
                pageLength: 10,
                order: [[0, 'asc']],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search roles..."
                },
                columnDefs: [
                    { targets: 3, orderable: false, width: '160px', className: 'text-center' }
                ]
            });
        }
    });
</script>
@endpush

@endsection
