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

// 🔥 Insert into DB
$sql = "INSERT INTO students (math, reading, writing, prediction)
        VALUES ($math, $reading, $writing, '$output')";
$conn->query($sql);

echo "<h2 style='color: green;'>Prediction: $output</h2>";
echo "<br><a href='dashboard.php'>View Dashboard</a>";
?>