<?php
@session_start();
if (!isset($_SESSION['doctor_email'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctor Dashboard</title>
    <style>
     /* General Styling */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #ECF0F1;  /* Soft Light Gray */
    margin: 0;
    padding: 0;
    display: flex;
    overflow-x: hidden;
}

/* Sidebar Menu */
.menu {
    position: fixed;
    top: 0;
    left: 0;
    background-color: #2C3E50;  /* Deep Blue-Gray */
    width: 250px;
    height: 100%;
    padding-top: 20px;
    transition: transform 0.3s ease-in-out;
    z-index: 11;
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2);
}

.menu a {
    display: block;
    color: white;
    padding: 14px 20px;
    text-decoration: none;
    margin-bottom: 10px;
    border-radius: 5px;
    font-size: 16px;
    font-weight: 500;
    transition: background 0.3s, transform 0.2s;
}

.menu a:hover {
    background-color: #16A085;  /* Teal Green Hover */
    transform: translateX(5px);
}

/* Close button in sidebar */
.menu a:first-child {
    font-size: 18px;
    text-align: right;
    padding-right: 20px;
}

/* Toggle Button */
.menu-toggle {
    font-size: 28px;
    cursor: pointer;
    margin-left: 15px;
    display: none;
    color: white;
}

/* Header */
.header {
    background-color:#2C3E50;  /* Teal Green */
    color: white;
    padding: 15px 20px;
    text-align: left;
    width: 100%;
    position: fixed;
    top: 0;
    z-index: 10;
    display: flex;
    align-items: center;
    font-size: 20px;
    font-weight: bold;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Main Content */
.container {
    flex-grow: 1;
    padding: 90px 20px 20px 270px;
    transition: padding-left 0.3s;
}

/* Stats Cards */
.stats-container {
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
    flex-wrap: wrap;
}

.stat-card {
    background: linear-gradient(to right, #1ABC9C, #16A085);  /* Gradient Effect */
    border-radius: 10px;
    padding: 20px;
    text-align: center;
    width: 220px;
    color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out, box-shadow 0.3s;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.stat-card h2 {
    font-size: 24px;
    margin: 0;
}

.stat-card p {
    margin-top: 8px;
    font-size: 14px;
}

/* Navigation Cards */
.card {
    background-color: white;
    border-radius: 10px;
    padding: 15px;
    text-align: center;
    margin-bottom: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out, box-shadow 0.3s;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.card a {
    color: #1ABC9C;  /* Teal Green Links */
    text-decoration: none;
    font-size: 16px;
    font-weight: bold;
}

/* Mobile Styles */
@media (max-width: 991px) {
    .menu {
        transform: translateX(-100%);
    }
    .menu.show {
        transform: translateX(0);
    }
    .menu-toggle {
        display: inline-block;
    }
    .container {
        padding-left: 20px;
    }
}

    </style>
</head>
<body>

<!-- Sidebar Menu -->
<div class="menu" id="menu">
    <a href="javascript:void(0)" onclick="toggleMenu()" style="text-align: right; margin-right: 20px;">✖</a>
    <a href="dashboard.php">Dashboard</a>
    <a href="ai.php">Ai Detector</a>
    <a href="viewappointments.php">View Appointments</a>
    
    <a href="logout.php">Logout</a>
</div>

<!-- Header -->
<div class="header">
    <span class="menu-toggle" onclick="toggleMenu()">☰</span>
    <span>Doctor Dashboard</span>
</div>

<!-- JavaScript for Menu Toggle -->
<script>
    function toggleMenu() {
        var menu = document.getElementById('menu');
        menu.classList.toggle('show');
    }

    // Close menu if clicked outside (for mobile)
    document.addEventListener('click', function(event) {
        var menu = document.getElementById('menu');
        var toggleButton = document.querySelector('.menu-toggle');

        if (window.innerWidth <= 991 && !menu.contains(event.target) && !toggleButton.contains(event.target)) {
            menu.classList.remove('show');
        }
    });
</script>
