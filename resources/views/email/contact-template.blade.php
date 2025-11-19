<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .email-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin: 0 auto;
            max-width: 600px;
        }

        .header {
            background-color: #007bff;
            color: #ffffff;
            text-align: center;
            padding: 15px 0;
            border-radius: 10px 10px 0 0;
        }

        .content {
            margin-top: 20px;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #555555;
        }
    </style>
</head>

<body>

    <div class="email-container">
        <div class="content">
            <p><strong>Name:</strong> {{ $fromName }}</p>
            <p><strong>Email:</strong> {{ $fromEmail }}</p>
            <p><strong>Message:</strong></p>
            <p>{{ $body }}</p>
        </div>
    </div>
</body>

</html>
