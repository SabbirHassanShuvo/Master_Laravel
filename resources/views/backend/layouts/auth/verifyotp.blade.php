<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fastkart - OTP Verification</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @include('backend.partials.auth.style')
</head>

<body>
    <div class="otp-container">
        <div class="logo">
            <h1><span>Fast</span><span>kart.</span></h1>
        </div>

        <div class="instructions">
            <p>We've sent a 6-digit verification code to your email.<br>Enter the code below to continue.</p>
        </div>

        <form method="POST" action="{{ route('verify-otp.post') }}">
            @csrf
            <div class="otp-input-container">
                <input type="text" name="d1" class="otp-input" maxlength="1" inputmode="numeric">
                <input type="text" name="d2" class="otp-input" maxlength="1" inputmode="numeric">
                <input type="text" name="d3" class="otp-input" maxlength="1" inputmode="numeric">
                <input type="text" name="d4" class="otp-input" maxlength="1" inputmode="numeric">
                <input type="text" name="d5" class="otp-input" maxlength="1" inputmode="numeric">
                <input type="text" name="d6" class="otp-input" maxlength="1" inputmode="numeric">
            </div>

            <button type="submit" class="btn btn-verify">Verify Code</button>
        </form>


        <div class="back-to-login">
            <a href="{{ route('login') }}">← Back to Login</a>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Auto-focus and auto-move functionality for OTP inputs
        document.addEventListener('DOMContentLoaded', function() {
            const otpInputs = document.querySelectorAll('.otp-input');

            otpInputs.forEach((input, index) => {
                input.addEventListener('input', function() {
                    if (this.value.length === 1 && index < otpInputs.length - 1) {
                        otpInputs[index + 1].focus();
                    }
                });

                input.addEventListener('keydown', function(e) {
                    if (e.key === 'Backspace' && this.value === '' && index > 0) {
                        otpInputs[index - 1].focus();
                    }
                });

                // Allow only numeric input
                input.addEventListener('keypress', function(e) {
                    if (!/[0-9]/.test(e.key)) {
                        e.preventDefault();
                    }
                });
            });
        });
    </script>
</body>

</html>
