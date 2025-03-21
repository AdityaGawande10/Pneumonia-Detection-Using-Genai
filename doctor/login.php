<?php 
require '../db.php'; 
session_start();  
if ($_SERVER["REQUEST_METHOD"] == "POST") {     
    $email = mysqli_real_escape_string($conn, $_POST['email']);     
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM doctors WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {         
        $_SESSION['doctor_email'] = $email;
        echo "<script>
                alert('Login Successful! Redirecting to your dashboard...');
                window.location.href = 'ai.php';
              </script>";
    } else {         
        echo "<div class='error'>Invalid email or password. Please try again.</div>";
    } 
} 
?>  
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Doctor Login</title> 
    <style> 
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            position: relative;
            overflow: hidden;
        }
        .container:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.3);
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
            font-size: 26px;
            font-weight: bold;
        }
        label {
            display: block;
            text-align: left;
            font-weight: 600;
            color: #555;
            margin-bottom: 5px;
        }
        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            transition: border 0.3s, box-shadow 0.3s;
            font-size: 16px;
        }
        input:focus {
            border-color: #6e8efb;
            box-shadow: 0 0 8px rgba(110, 142, 251, 0.5);
        }
        .btn {
            background-color: #6e8efb;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            width: 100%;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s;
            font-weight: bold;
        }
        .btn:hover {
            background-color: #a777e3;
            transform: translateY(-2px);
        }
        .error {
            background-color: #ffdddd;
            color: #d9534f;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 8px;
            text-align: center;
            font-weight: bold;
        }
        .forgot-password {
            display: block;
            margin-top: 10px;
            font-size: 14px;
            color: #6e8efb;
            text-decoration: none;
            transition: color 0.3s;
        }
        .forgot-password:hover {
            color: #a777e3;
        }
        @media (max-width: 480px) {
            .container {
                padding: 25px;
            }
        }
    </style> 
</head> 
<body> 
    <div class="container">
        <h2>Doctor Login</h2>
        <form method="POST" action="">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <button type="submit" class="btn">Login</button>
            <!-- <a href="#" class="forgot-password">Forgot Password?</a> -->
        </form>
    </div>
</body> 
</html>