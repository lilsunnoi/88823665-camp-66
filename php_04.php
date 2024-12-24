<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odd or Even Checker</title>
</head>
<body>
    <h1>แสดงข้อมูลตัวเลขว่าเป็นเลขคู่หรือเลขคี่</h1>
    <form method="POST">
        <label for="start">เริ่มต้น:</label>
        <input type="number" id="start" name="start" required>
        <label for="end">สิ้นสุด:</label>
        <input type="number" id="end" name="end" required>
        <button type="submit">แสดงผล</button>
    </form>
    <hr>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $start = intval($_POST['start']);
        $end = intval($_POST['end']);

        if ($start > $end) {
            echo "<p>กรุณากรอกค่าเริ่มต้นให้น้อยกว่าหรือเท่ากับค่าที่สิ้นสุด</p>";
        } else {
            echo "<h2>ข้อมูลตัวเลขตั้งแต่ $start ถึง $end</h2>";
            echo "<ul>";
            for ($i = $start; $i <= $end; $i++) {
                echo "<li>$i : " . ($i % 2 == 0 ? "เลขคู่" : "เลขคี่") . "</li>";
            }
            echo "</ul>";
        }
    }
    ?>
</body>
</html>
