@extends('backend.master')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0 py-3">Add API Keys</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('payment-gateway.update') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Stripe Testing Type</label>
                                <select class="form-control" name="stripe_type" id="stripe_type">
                                    <option value="sandbox">Sandbox</option>
                                    <option value="production">Production</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">App Publish Key</label>
                                <input type="text" class="form-control" id="publish_key" name="publish_key">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">App Secret Key</label>
                                <input type="text" class="form-control" id="secret_key" name="secret_key">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Webhook Secret</label>
                                <input type="text" class="form-control" id="webhook_secret" name="webhook_secret">
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-success btn-lg">
                                    Save Keys
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Pass data to JS --}}
    <script>
        const sandbox = @json($sandbox);
        const production = @json($production);

        function fillForm(data) {
            document.getElementById('publish_key').value = data?.publish_key ?? '';
            document.getElementById('secret_key').value = data?.secret_key ?? '';
            document.getElementById('webhook_secret').value = data?.webhook_secret ?? '';
        }

        // Load sandbox by default
        fillForm(sandbox);

        // Change form data on type change
        document.getElementById('stripe_type').addEventListener('change', function() {
            if (this.value === 'sandbox') {
                fillForm(sandbox);
            } else {
                fillForm(production);
            }
        });
    </script>
@endsection
