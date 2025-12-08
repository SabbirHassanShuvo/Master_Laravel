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
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('getUsers.data') }}',
                columns: [{
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
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
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
