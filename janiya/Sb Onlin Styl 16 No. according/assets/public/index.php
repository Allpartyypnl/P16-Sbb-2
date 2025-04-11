<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Renewal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            animation: blinkBackground 1s infinite;
        }

        @keyframes blinkBackground {
            0%, 100% { background-color: #ff0000; }
            50% { background-color: #ffffff; }
        }

        .container {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
        }
        .container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #000;
        }
        .container p {
            font-size: 18px; /* Increased font size for Hindi text */
            color: #000;
            font-weight: bold; /* Made text bold */
            margin-bottom: 30px;
            line-height: 1.5;
        }
        .contact-button {
            background-color: #25D366;
            color: #000;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 16px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }
        .contact-button:hover {
            background-color: #20b558;
        }
        .contact-button img {
            width: 20px;
            height: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>30 Days Plan Expired</h1>
        <p>आपकी 30 दिनों की Plan समाप्त हो गई है। जारी रखने के लिए कृपया इसका Repayment करें।
हमसे जुड़ने के लिए कृपया व्हाट्सएप करें।</p>
        <a href="https://wa.me/00" class="contact-button">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp Logo">
            Contact on WhatsApp
        </a>
    </div>
</body>
</html>