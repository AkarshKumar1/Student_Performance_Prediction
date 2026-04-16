<?php
include 'db.php';

// Fetch data
$result = $conn->query("SELECT * FROM students ORDER BY id DESC");

// Counts
$total = $conn->query("SELECT COUNT(*) as count FROM students")->fetch_assoc()['count'];
$a = $conn->query("SELECT COUNT(*) as count FROM students WHERE prediction='A'")->fetch_assoc()['count'];
$b = $conn->query("SELECT COUNT(*) as count FROM students WHERE prediction='B'")->fetch_assoc()['count'];
$c = $conn->query("SELECT COUNT(*) as count FROM students WHERE prediction='C'")->fetch_assoc()['count'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>📊 Student Dashboard</h2>

    <!-- 🔥 Stats -->
    <div class="stats">
        <div class="card total">Total<br><?php echo $total; ?></div>
        <div class="card a">A<br><?php echo $a; ?></div>
        <div class="card b">B<br><?php echo $b; ?></div>
        <div class="card c">C<br><?php echo $c; ?></div>
    </div>

    <!-- 🔍 Search -->
    <input type="text" id="search" placeholder="Search (A / B / C / values...)" onkeyup="searchTable()">

    <!-- 📊 Table -->
    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Math</th>
                    <th>Reading</th>
                    <th>Writing</th>
                    <th>Prediction</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
            </thead>

            <tbody>
            <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['math']; ?></td>
                <td><?php echo $row['reading']; ?></td>
                <td><?php echo $row['writing']; ?></td>

                <td>
                    <?php 
                    $prediction = $row['prediction'];

                    if ($prediction == 'A') {
                        echo "<span class='green'>$prediction</span>";
                    } elseif ($prediction == 'B') {
                        echo "<span class='blue'>$prediction</span>";
                    } else {
                        echo "<span class='red'>$prediction</span>";
                    }
                    ?>
                </td>

                <?php
                $datetime = $row['created_at'];
                $date = date("d M Y", strtotime($datetime));
                $time = date("h:i A", strtotime($datetime));
                ?>

                <td><?php echo $date; ?></td>
                <td><?php echo $time; ?></td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <a href="index.php" class="back-btn">← Back to Home</a>
</div>

<!-- 🔥 FIXED SEARCH SCRIPT -->
<script>
function searchTable() {
    let input = document.getElementById("search").value.toLowerCase().trim();
    let rows = document.querySelectorAll("tbody tr");

    rows.forEach(row => {
        let prediction = row.children[4].innerText.toLowerCase().trim();
        let fullText = row.innerText.toLowerCase();

        // 🔥 Special handling for A, B, C
        if (input === "a" || input === "b" || input === "c") {
            row.style.display = (prediction === input) ? "" : "none";
        } else {
            row.style.display = fullText.includes(input) ? "" : "none";
        }
    });
}
</script>

</body>
</html>