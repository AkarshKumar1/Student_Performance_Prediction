<?php
include 'db.php';

// Get form data
$math = $_POST['math'];
$reading = $_POST['reading'];
$writing = $_POST['writing'];

// 🔥 Your Render API URL (REPLACE THIS)
$url = "https://student-performance-prediction-5rbv.onrender.com/predict";

// Prepare data for API
$data = array(
    "reading" => (int)$reading,
    "writing" => (int)$writing
);

// Convert data to JSON
$options = array(
    'http' => array(
        'header'  => "Content-Type: application/json",
        'method'  => 'POST',
        'content' => json_encode($data),
        'timeout' => 10
    )
);

// Create context
$context = stream_context_create($options);

// Call API
$result = file_get_contents($url, false, $context);

// 🔥 Handle API failure
if ($result === FALSE) {
    die("Error connecting to ML API");
}

// Decode response
$response = json_decode($result, true);

// Extract values safely
$grade = isset($response['grade']) ? $response['grade'] : "N/A";
$risk = isset($response['risk']) ? $response['risk'] : "";

// Insert into database
$sql = "INSERT INTO students (math, reading, writing, prediction)
        VALUES ($math, $reading, $writing, '$grade')";

$conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Prediction Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Prediction Result</h2>

    <!-- Grade -->
    <div class="result">Grade: <?php echo $grade; ?></div>

    <!-- Risk -->
    <?php if ($risk == "At-Risk Student") { ?>
        <div class="result risk"><?php echo $risk; ?></div>
    <?php } ?>

    <br>
    <a href="index.php" class="back-btn">← Go Back</a>
</div>

</body>
</html>