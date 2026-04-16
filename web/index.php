<!DOCTYPE html>
<html>
<head>
    <title>Student Prediction</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>🎓 Student Prediction</h2>

    <form action="predict.php" method="post">
        <input type="number" name="math" placeholder="Math Score" required>
        <input type="number" name="reading" placeholder="Reading Score" required>
        <input type="number" name="writing" placeholder="Writing Score" required>
        
        <button type="submit">Predict</button>
    </form>
</div>

</body>
</html>