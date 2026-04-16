<?php
include 'db.php';

$math = $_POST['math'];
$reading = $_POST['reading'];
$writing = $_POST['writing'];

$python = "C:/Users/akars/AppData/Local/Programs/Python/Python311/python.exe";
$script = "C:/datbasexampp/htdocs/Student_Performance_Prediction/model/predict.py";

$command = "\"$python\" \"$script\" $math $reading $writing 2>&1";

$output = shell_exec($command);
$output = trim($output);

// Split output
$lines = explode("\n", $output);

// Get grade only
$grade = trim($lines[0]);

// Insert into DB
$sql = "INSERT INTO students (math, reading, writing, prediction)
        VALUES ($math, $reading, $writing, '$grade')";

$conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Prediction Result</h2>

    <div class="result">Grade: <?php echo $grade; ?></div>

    <?php
    if (isset($lines[1])) {
        echo "<div class='result risk'>" . trim($lines[1]) . "</div>";
    }
    ?>

    <br>
    <a href="index.php">← Go Back</a>
</div>

</body>
</html>