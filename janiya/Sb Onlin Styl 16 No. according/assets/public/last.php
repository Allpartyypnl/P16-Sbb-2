<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KYC Validation</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .header, .footer {
            width: 92%;
            text-align: center;
        }
        /* Header image alignment */
        .header img {
            width: 100%;
            height: auto;
            object-fit: contain; /* Keeps image proportional and fits within its container */
            max-height: 120px; /* Optional: adjusts the height limit of the header image */
        }
        /* Footer image alignment */
        .footer img {
            width: 100%;
            height: auto;
            object-fit: contain; /* Keeps image proportional and fits within its container */
        }
        .container {
            text-align: center;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .code {
            font-size: 15px;
            margin-bottom: 20px;
        }
        .loader {
            border: 8px solid #f3f3f3;
            border-radius: 50%;
            border-top: 8px solid #3498db;
            width: 60px;
            height: 60px;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .status {
            margin-top: 20px;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <div class="header">
        <img src="header-image.jpg" alt="Header Image">
    </div>

    <!-- Main Content Section -->
    <div class="container">
        <div class="code" id="kycCode">Your KYC Validation code is: <span id="codeValue"></span></div>
        <div class="loader"></div>
        <div class="status">Validating</div>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        <img src="footer-image.jpg" alt="Footer Image">
    </div>

    <script>
        function generateRandomCode() {
            return Math.floor(100000 + Math.random() * 900000); // Generates a 6-digit random number
        }

        function updateKYCCode() {
            document.getElementById('codeValue').innerText = generateRandomCode();
        }

        // Update the KYC code every 5 seconds
        updateKYCCode();
        setInterval(updateKYCCode, 5000);
    </script>
</body>
</html>