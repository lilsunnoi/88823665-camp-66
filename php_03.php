<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplication Table</title>
</head>
<body>
    <h1>แสดงตารางสูตรคูณ</h1>
    <form method="POST">
        <label for="number">กรอกแม่สูตรคูณ:</label>
        <input type="number" id="number" name="number" required>
        <button type="submit">แสดงผล</button>
    </form>
    <hr>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $number = intval($_POST['number']);
        echo "<h2>สูตรคูณแม่ $number</h2>";
        echo "<ul>";
        for ($i = 1; $i <= 12; $i++) {
            echo "<li>$number x $i = " . ($number * $i) . "</li>";
        }
        echo "</ul>";
    }
    ?>
</body>
</html>
