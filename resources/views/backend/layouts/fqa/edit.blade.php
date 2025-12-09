@extends('backend.master')

@section('content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0">Edit FAQ</h5>
                    </div>
                    <div class="card-body p-4">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('fqa.update', $fqa->id) }}" method="POST">
                            @csrf
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control form-control-sm" id="question" name="question"
                                    placeholder="Question" value="{{ old('question', $fqa->question) }}" required>
                                <label for="question">Question</label>
                            </div>

                            <div class="form-floating mb-4">
                                <textarea class="form-control form-control-sm" id="answer" name="answer" placeholder="Answer" style="height: 120px;"
                                    required>{{ old('answer', $fqa->answer) }}</textarea>
                                <label for="answer">Answer</label>
                            </div>

                            <div class="form-floating mb-4">
                                <select class="form-select form-select-sm" id="status" name="status" required>
                                    <option value="active" {{ $fqa->status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ $fqa->status == 'inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                                <label for="status">Status</label>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-sm py-2">Update FAQ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
