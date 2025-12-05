<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fastkart - Reset Password</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    @include('backend.partials.auth.style')
</head>

<body>
    <div class="reset-container">
        <div class="logo">
            <h1><span>Fast</span><span>kart.</span></h1>
        </div>

        <p class="instructions">
            Enter your new password below to update your account.
        </p>

        <form>
            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter new password" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm New Password</label>
                <input type="password" class="form-control" id="password_confirmation"
                    placeholder="Confirm new password" required>
            </div>

            <button type="submit" class="btn btn-update mt-3">Update Password</button>
        </form>

        <div class="back-to-login">
            <a href="#">← Back to Login</a>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
