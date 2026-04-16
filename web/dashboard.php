<?php
include 'db.php';

$result = $conn->query("SELECT * FROM students ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Student Prediction Dashboard</h2>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Math</th>
    <th>Reading</th>
    <th>Writing</th>
    <th>Prediction</th>
    <th>Date</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['math']; ?></td>
    <td><?php echo $row['reading']; ?></td>
    <td><?php echo $row['writing']; ?></td>
    <td><?php echo $row['prediction']; ?></td>
    <td><?php echo $row['created_at']; ?></td>
</tr>
<?php } ?>

</table>

</body>
</html>