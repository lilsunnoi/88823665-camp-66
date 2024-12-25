<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Odd or Even Checker</title>
    <style>
        body {
            background: linear-gradient(120deg, #c3eaff, #e4c1f9);
            color: #333;
            font-family: 'Arial', sans-serif;
        }
        h1, h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);
        }
        .form-container {
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 500px;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        ul li {
            background: #e3f2fd;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>แสดงข้อมูลตัวเลขว่าเป็นเลขคู่หรือเลขคี่</h1>
    <div class="container form-container">
        <form method="POST">
            <div class="mb-3">
                <label for="start" class="form-label">เริ่มต้น:</label>
                <input type="number" id="start" name="start" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="end" class="form-label">สิ้นสุด:</label>
                <input type="number" id="end" name="end" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">แสดงผล</button>
        </form>
    </div>
    <div class="container">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $start = intval($_POST['start']);
            $end = intval($_POST['end']);

            if ($start > $end) {
                echo "<div class='alert alert-danger text-center'>กรุณากรอกค่าเริ่มต้นให้น้อยกว่าหรือเท่ากับค่าที่สิ้นสุด</div>";
            } else {
                echo "<h2>ข้อมูลตัวเลขตั้งแต่ $start ถึง $end</h2>";
                echo "<ul class='mt-4'>";
                for ($i = $start; $i <= $end; $i++) {
                    echo "<li>$i : " . ($i % 2 == 0 ? "เลขคู่" : "เลขคี่") . "</li>";
                }
                echo "</ul>";
            }
        }
        ?>
    </div>
</body>
</html>
