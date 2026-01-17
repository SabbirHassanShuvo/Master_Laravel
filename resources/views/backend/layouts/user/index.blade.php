@extends('backend.master')
@section('title', 'Admin Dashboard')
@section('content')
    <div class="col-sm-12">
        <div class="card card-table">
            <div class="card-body">
                <div class="title-header option-title">
                    <h5>All Users</h5>
                    <a href="{{ route('createUser') }}" class="btn btn-theme d-flex align-items-center">
                        <i data-feather="plus"></i> Add New
                    </a>
                </div>

                <div class="table-responsive table-product">
                    <table class="table theme-table" id="users-table">
                        <thead>
                            <tr>
                                <th>SL No</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style>
        #users-table th:nth-child(1),
        #users-table td:nth-child(1) {
            text-align: center;
        }

        #users-table th:last-child,
        #users-table td:last-child {
            text-align: center;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('getUsers.data') }}',
                columns: [{
                        data: 'sl_no',
                        name: 'sl_no',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'role',
                        name: 'role',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    }
                ]
            });

            // Delete User
            $('#users-table').on('click', '.btn-delete', function() {
                if (confirm('Are you sure you want to delete this user?')) {
                    let url = $(this).data('url');
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(res) {
                            alert(res.success);
                            table.ajax.reload();
                        },
                        error: function(err) {
                            alert('Something went wrong');
                        }
                    });
                }
            });
        });
    </script>
@endpush
