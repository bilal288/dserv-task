<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account Created</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            color: #333333;
            line-height: 1.5;
        }
        h1 {
            font-size: 24px;
            font-weight: bold;
            margin: 0;
        }
        p {
            margin: 0 0 10px 0;
        }
        .container {
            width: 600px;
            margin: 0 auto;
        }
        .header {
            background-color: #f5f5f5;
            padding: 20px;
        }
        .content {
            padding: 20px;
            background-color: #ffffff;
        }
        .footer {
            background-color: #f5f5f5;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            
            <h1>Account Created</h1>
        </div>
        <div class="content">
            <p>Dear {{ $mailData['first_name'] }} {{ $mailData['last_name'] }},</p>
            <p>Thank you for registering with our website! Your account has been created successfully.</p>
            <p>Here are the details you provided:</p>
            <ul>
                <li>Title: {{ $mailData['title'] }}</li>
                <li>Email Address: {{ $mailData['email'] }}</li>
                <li>Birthday: {{ $mailData['birthday'] }}</li>
                <li>Gender: {{ $mailData['gender'] }}</li>
            </ul>
            <p>If you have any questions or concerns, please feel free to contact us.</p>
            <p>Best regards,<br>The Support Team</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} <a href="https://dserv.de/">D-serv Gmbh</a>. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
