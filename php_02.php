<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odd or Even</title>
</head>
<body>
    <h1>แสดงข้อมูลตัวเลข 1 - 100</h1>
    <?php
    for ($i = 1; $i <= 100; $i++) {
        echo $i . " : " . ($i % 2 == 0 ? "เลขคู่" : "เลขคี่") . "<br>";
    }
    ?>
</body>
</html>
