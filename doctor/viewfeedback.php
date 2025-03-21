<?php
session_start();
include '../db.php';
include 'header.php';

// Check if the appointment ID is provided
if (!isset($_GET['appointment_id'])) {
    echo "No appointment ID provided.";
    exit();
}

$appointment_id = $_GET['appointment_id'];

// Fetch feedback from the database
$feedback_query = "SELECT feedback_text, rating, user_email, created_at FROM feedback WHERE appointment_id = '$appointment_id'";
$feedback_result = $conn->query($feedback_query);

if ($feedback_result->num_rows > 0) {
    $feedback = $feedback_result->fetch_assoc();
} else {
    echo "<div class='alert alert-danger'>No feedback found for this appointment.</div>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Feedback</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        
        h2 {
            color: #4A90E2;
            text-align: center;
        }
        .feedback-details {
            margin-top: 20px;
            line-height: 1.6;
        }
        .feedback-details p {
            margin-bottom: 12px;
            color: #333;
        }
        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4A90E2;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .back-button:hover {
            background-color: #357ABD;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Feedback Details</h2>
    <div class="feedback-details">
        <p><strong>User Email:</strong> <?php echo htmlspecialchars($feedback['user_email']); ?></p>
        <p><strong>Feedback:</strong><br> <?php echo nl2br(htmlspecialchars($feedback['feedback_text'])); ?></p>
        <p><strong>Rating:</strong> <?php echo htmlspecialchars($feedback['rating']); ?> / 5</p>
        <p><strong>Submitted At:</strong> <?php echo htmlspecialchars($feedback['created_at']); ?></p>
    </div>
    <a href="viewappointments.php" class="back-button">Back to Appointments</a>
</div>

<?php $conn->close(); ?>
</body>
</html>
