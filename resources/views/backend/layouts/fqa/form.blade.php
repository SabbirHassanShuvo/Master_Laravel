@extends('backend.master')

@section('content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0">Add New FAQ</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('fqa.store') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control form-control-sm" id="question" name="question"
                                    placeholder="Question" required>
                                <label for="question">Question</label>
                            </div>
                            <div class="form-floating mb-4">
                                <textarea class="form-control form-control-sm" id="answer" name="answer" placeholder="Answer" style="height: 120px;"
                                    required></textarea>
                                <label for="answer">Answer</label>
                            </div>
                            <div class="form-floating mb-4">
                                <select class="form-select form-select-sm" id="status" name="status" required>
                                    <option value="" disabled selected>Select status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                <label for="status">Status</label>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-sm py-2">Add FAQ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
