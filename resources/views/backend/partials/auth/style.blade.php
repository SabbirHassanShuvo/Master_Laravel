<style>
    /* Global Styles */
    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
        padding: 20px;
    }

    /* Shared Containers */
    .login-container,
    .forgot-container,
    .reset-container,
    .otp-container {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        padding: 40px;
        width: 100%;
        max-width: 450px;
        transition: transform 0.3s ease;
    }

    .login-container:hover,
    .forgot-container:hover,
    .reset-container:hover,
    .otp-container:hover {
        transform: translateY(-5px);
    }

    /* Logo Section */
    .logo {
        text-align: center;
        margin-bottom: 20px;
    }

    .logo h1 {
        font-size: 2.5rem;
        font-weight: 700;
        letter-spacing: -1px;
        color: #2c3e50;
    }

    .logo span:first-child {
        color: #27ae60;
    }

    .logo span:last-child {
        color: #2c3e50;
    }

    /* Instructions text */
    .instructions {
        text-align: center;
        color: #7f8c8d;
        margin-bottom: 30px;
        line-height: 1.6;
    }

    /* Form Styles */
    .form-label {
        font-weight: 600;
        color: #2c3e50;
    }

    .form-control {
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        padding: 12px 15px;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #27ae60;
        box-shadow: 0 0 0 3px rgba(39, 174, 96, 0.1);
    }

    /* OTP Input Styles */
    .otp-input-container {
        display: flex;
        justify-content: center;
        gap: 12px;
        margin-bottom: 30px;
    }

    .otp-input {
        width: 50px;
        height: 60px;
        font-size: 24px;
        text-align: center;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        outline: none;
        transition: all 0.3s ease;
    }

    .otp-input:focus {
        border-color: #27ae60;
        box-shadow: 0 0 0 3px rgba(39, 174, 96, 0.1);
    }

    /* Buttons */
    .btn-login,
    .btn-reset,
    .btn-update,
    .btn-verify {
        background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%);
        border: none;
        border-radius: 10px;
        padding: 12px;
        font-size: 18px;
        font-weight: 600;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        width: 100%;
    }

    .btn-login:hover,
    .btn-reset:hover,
    .btn-update:hover,
    .btn-verify:hover {
        background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(39, 174, 96, 0.3);
    }

    .btn-verify {
        margin-bottom: 20px;
    }

    /* Links */
    .forgot-password,
    .back-to-login,
    .signup-link,
    .resend-otp {
        text-align: center;
        margin-top: 15px;
        color: #7f8c8d;
    }

    .forgot-password a,
    .back-to-login a,
    .signup-link a,
    .resend-otp a {
        color: #27ae60;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .forgot-password a:hover,
    .back-to-login a:hover,
    .signup-link a:hover,
    .resend-otp a:hover {
        color: #2ecc71;
        text-decoration: underline;
    }

    /* Divider */
    .divider {
        position: relative;
        text-align: center;
        margin: 20px 0;
    }

    .divider::before {
        content: "";
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 1px;
        background: #e0e0e0;
    }

    .divider span {
        position: relative;
        background: white;
        padding: 0 15px;
        color: #7f8c8d;
        font-size: 14px;
    }

    /* Social Login */
    .social-login {
        display: flex;
        gap: 15px;
        margin-top: 20px;
    }

    .social-btn {
        flex: 1;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        padding: 10px;
        text-align: center;
        font-weight: 600;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .social-btn:hover {
        border-color: #27ae60;
        background: #f8f9fa;
    }

    /* Responsive */
    @media (max-width: 576px) {

        .login-container,
        .forgot-container,
        .reset-container,
        .otp-container {
            padding: 30px 20px;
        }

        .logo h1 {
            font-size: 2rem;
        }

        .otp-input {
            width: 45px;
            height: 55px;
            font-size: 20px;
        }
    }
</style>
