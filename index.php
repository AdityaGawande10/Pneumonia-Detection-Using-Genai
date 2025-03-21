<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="AI-based Pneumonia Analyzer for detecting pneumonia from chest X-rays with high accuracy.">
    <title>AI Pneumonia Analyzer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        /* Global Styles */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg,rgb(149, 179, 247),rgb(8, 115, 137));
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            backdrop-filter: blur(12px);
            background: rgba(255, 255, 255, 0.15);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.3);
            max-width: 500px;
            width: 100%;
            text-align: center;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            border: 2px solid rgba(255, 255, 255, 0.2);
        }

        .card:hover {
            transform: translateY(-12px);
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.4);
        }

        h1 {
            color: #fff;
            font-size: 34px;
            margin-bottom: 15px;
            text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3);
        }

        p {
            color: #f8f9fa;
            font-size: 18px;
            line-height: 1.6;
        }

        .btn-custom {
            display: block;
            width: 100%;
            padding: 14px;
            margin: 12px 0;
            font-size: 18px;
            border-radius: 25px;
            transition: all 0.3s ease-in-out;
            color: white;
            font-weight: 600;
            letter-spacing: 1px;
            border: none;
        }

        .btn-primary { background: #1b262c; }
        .btn-success { background:rgb(16, 96, 149); }
        .btn-warning { background: #ffb400; color: #000; }

        .btn-custom:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            color: #fff;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="card">
        <h1>Rayscan-AI</h1>
        <p>Analyze X-Ray Image Using AI.</p>

        <a href="user/index.php" class="btn btn-primary btn-custom">Login / Register as User</a>
        <a href="doctor/login.php" class="btn btn-success btn-custom">Login as Doctor</a>
        <a href="doctor/register.php" class="btn btn-warning btn-custom">New Doctor Signup</a>

        <!-- <div class="footer">
            <p>&copy; 2025 AI Pneumonia Analyzer. All Rights Reserved.</p>
        </div> -->
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>