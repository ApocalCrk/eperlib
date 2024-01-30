<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Masukan User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        .user-info {
            margin-bottom: 15px;
        }

        .user-info strong {
            font-weight: bold;
        }

        .message {
            padding: 15px;
            background: #f9f9f9;
            border-radius: 6px;
        }

        .message p {
            margin: 0;
        }

        footer {
            margin-top: 20px;
            text-align: center;
            color: #777;
        }
        .center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="center">Halo Admin, Anda mendapatkan pesan dari pengguna</h2>
        <div class="user-info">
            <p><strong>Nama:</strong> {{ $detail['nama'] }}</p>
            <p><strong>Email:</strong> {{ $detail['email'] }}</p>
        </div>
        <div class="message">
            <p><strong>Pesan:</strong></p>
            <p>{{ $detail['pesan'] }}</p>
        </div>
    </div>
    <footer>
        <p>&copy;2023 All rights reserved.</p>
    </footer>
</body>

</html>
