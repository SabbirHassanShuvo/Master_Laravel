@extends('backend.master')

@section('content')
    <div class="container">
        <h2>FQA List</h2>
        <table id="fqa-table" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#fqa-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('getFqa.data') }}',
                columns: [{
                        data: 'question',
                        name: 'question'
                    },
                    {
                        data: 'answer',
                        name: 'answer'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });


        // Delete FQA
        $(document).on('click', '.btn-delete', function() {
            let url = $(this).data('url');
            if (confirm('Are you sure you want to delete this FAQ?')) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        alert(response.success);
                        $('#fqa-table').DataTable().ajax.reload();
                    },
                    error: function(xhr) {
                        alert('Something went wrong!');
                    }
                });
            }
        });
    </script>
@endpush
