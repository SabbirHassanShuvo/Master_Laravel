<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fastkart - Forgot Password</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    @include('backend.partials.auth.style')
</head>

<body>
    <div class="forgot-container">
        <div class="logo">
            <h1><span>Fast</span><span>kart.</span></h1>
        </div>

        <p class="instructions">
            Enter your email address below and we'll send you a link to reset your password.
        </p>

        <form>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
            </div>

            <button type="submit" class="btn btn-reset mt-3">Send Reset Link</button>
        </form>

        <div class="back-to-login">
            <a href="#">← Back to Login</a>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
