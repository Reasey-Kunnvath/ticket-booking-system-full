<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our App</title>
    <!-- Bootstrap 5 CSS (CDN for simplicity, but inline styles are used for email compatibility) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Additional inline-compatible styles for email clients */
        .container {
            max-width: 600px !important;
            margin: 0 auto !important;
        }

        .btn-primary {
            background-color: #0d6efd !important;
            color: #fff !important;
            text-decoration: none !important;
            padding: 10px 20px !important;
            border-radius: 5px !important;
            display: inline-block !important;
        }

        .text-muted {
            color: #6c757d !important;
        }
    </style>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f8f9fa; padding: 20px;">
    <div class="container bg-white p-4 shadow-sm rounded">
        <!-- Header -->
        <div class="text-center mb-4">
            <h1 class="h3" style="color: #0d6efd;">Welcome to Our App</h1>
            <p class="text-muted">We're excited to have you on board!</p>
        </div>

        <!-- Body -->
        <div class="mb-4">

            <p>Hello <strong>{{ $data['user']->name ?? 'User' }}</strong>,</p>
            <p>Please verify your email to get started.</p>
            <p>Your verification code is:</p>
            <h2 class="text-center" style="color: #0d6efd;">{{ $data['verifyToken'] ?? 'XXXXXX' }}</h2>
            <p class="text-muted">This code was generated on {{ $data['timestamp'] ?? now() }}.</p>

        </div>
        <!-- Call to Action -->
        {{-- <div class="text-center mb-4">
            <a href="{{ url('/verify-email?user_id=' . $data['user']->id . '&token=' . $data['verifyToken']) }}"
                class="btn-primary">
                Verify Now
            </a>
        </div> --}}

        <!-- Footer -->
        <div class="text-center text-muted">
            <p>Need help? Contact us at:
                <a href="mailto:{{ $data['support_email'] ?? 'support@example.com' }}" style="color: #0d6efd;">
                    {{ $data['support_email'] ?? 'support@example.com' }}
                </a>
            </p>
            <p>&copy; {{ date('Y') }} Our App. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
