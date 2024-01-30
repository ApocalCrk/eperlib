<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .verification-link {
            display: block;
            padding: 12px 24px;
            margin: 20px auto;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .verification-link:hover {
            background-color: #0056b3;
        }

        .thanks {
            text-align: center;
            color: #777;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Verifikasi Email</h1>
        <p>Halo, <strong>{{ $user->nama }}</strong>!</p>
        <p>Silahkan klik link di bawah untuk verifikasi email Anda:</p>
        <a class="verification-link" href="{{ url('/user/verify', $user->token) }}">Verifikasi Email</a>
        <p class="thanks">Terima kasih!</p>
    </div>
</body>
</html>
