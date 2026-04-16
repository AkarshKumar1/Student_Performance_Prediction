<!DOCTYPE html>
<html>
<head>
    <title>Student Prediction</title>
</head>
<body>

<h2>Student Performance Prediction</h2>

<form action="predict.php" method="post">
    Math: <input type="number" name="math" required><br><br>
    Reading: <input type="number" name="reading" required><br><br>
    Writing: <input type="number" name="writing" required><br><br>
    
    <input type="submit" value="Predict">
</form>

</body>
</html>