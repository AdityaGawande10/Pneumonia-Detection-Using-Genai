<?php
session_start();
include 'header.php';
include '../user/db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "You are not logged in. Please log in to access this feature.";
    exit();
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

// Check if 'id' is passed via GET method
if (!isset($_GET['id'])) {
    echo "No report ID provided.";
    exit();
}

$report_id = intval($_GET['id']);

// Fetch report details from database
$stmt = $conn->prepare("SELECT * FROM analyzer_results WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $report_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "No report found.";
    exit();
}

$row = $result->fetch_assoc();

// Close database connection
$stmt->close();
$conn->close();
?>

<!-- Include html2pdf Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

<!-- Display Report as Web Page -->
<div class="main-content" style="margin-left: 250px; padding: 20px; width: calc(100% - 250px);">
    <div id="reportContent" style="background: white; border-radius: 12px; padding: 20px;">
        <h2 style="text-align: center;">AI Detection Report</h2>
        <p><strong>Report ID:</strong> <?php echo $row['id']; ?> <strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; User ID:</strong> <?php echo $user_name; ?></p>
        <p><strong>Date:</strong> <?php echo date("d-m-Y H:i:s", strtotime($row['date'])); ?></p>
        <p><strong>Image:</strong> <br> <img src="../uai/<?php echo $row['image_path']; ?>" alt="Uploaded Image" style="width: 300px; height: auto; border-radius: 8px;"></p>
        <p style="text-align: justify;"><strong>Result:</strong> <br> <?php echo nl2br($row['result']); ?></p>
    </div>
    <!-- Download Button -->
    <center><button onclick="downloadPDF()" style="margin-top: 20px; padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;"><i class="fa fa-download" aria-hidden="true"> &nbsp;Download </i> </button></center>
</div>

<!-- JavaScript to Generate PDF -->
<script>
    function downloadPDF() {
        const element = document.getElementById('reportContent');
        const opt = {
            margin:       0.5,
            filename:     'AI_Detection_Report.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
        };
        
        html2pdf().from(element).set(opt).save();
    }
</script>
