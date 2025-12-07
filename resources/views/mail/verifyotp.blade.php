<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification Email</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 30px 20px;
            text-align: center;
            color: white;
        }

        .header h1 {
            font-size: 28px;
            font-weight: 700;
            margin: 0;
            letter-spacing: -0.5px;
        }

        .header span:first-child {
            color: #27ae60;
        }

        .content {
            padding: 40px 30px;
            text-align: center;
        }

        .greeting {
            font-size: 18px;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .message {
            font-size: 16px;
            color: #7f8c8d;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .otp-code {
            background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%);
            color: white;
            font-size: 32px;
            font-weight: 700;
            padding: 15px 25px;
            border-radius: 10px;
            display: inline-block;
            letter-spacing: 5px;
            margin: 20px 0;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .validity {
            background: #e8f5e8;
            padding: 10px;
            border-radius: 8px;
            margin: 20px 0;
            font-size: 14px;
            color: #27ae60;
        }

        .footer {
            background: #f8f9fa;
            padding: 20px 30px;
            text-align: center;
            border-top: 1px solid #e9ecef;
            color: #7f8c8d;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <h1><span>Fast</span><span>kart.</span></h1>
        </div>

        <div class="content">
            <div class="greeting">
                Hello {{ $email }},
            </div>

            <div class="message">
                You requested a password reset. Use the following One-Time Password (OTP) to continue.
            </div>

            <div class="otp-code">
                {{ $otp }}
            </div>

            <div class="validity">
                ⏰ This OTP is valid for 5 minutes only
            </div>

            <div class="instructions">
                <p>• Enter this code on the verification page</p>
                <p>• Do not share this code with anyone</p>
                <p>• If you did not request this, ignore the email</p>
            </div>
        </div>

        <div class="footer">
            <p>© 2025 Fastkart. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
