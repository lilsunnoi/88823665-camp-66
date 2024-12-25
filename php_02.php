<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Odd or Even</title>
    <style>
        body {
            background: linear-gradient(120deg, #89f7fe, #66a6ff);
            color: #333;
            font-family: 'Arial', sans-serif;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);
        }
        .table-container {
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }
        .odd {
            background-color: #f8d7da;
            color: #721c24;
        }
        .even {
            background-color: #d4edda;
            color: #155724;
        }
    </style>
</head>
<body>
    <h1>แสดงข้อมูลตัวเลข 1 - 100</h1>
    <div class="container table-container">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>เลขที่</th>
                    <th>ประเภท</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 1; $i <= 100; $i++) {
                    $type = $i % 2 == 0 ? "เลขคู่" : "เลขคี่";
                    $class = $i % 2 == 0 ? "even" : "odd";
                    echo "<tr class='{$class}'>
                            <td>{$i}</td>
                            <td>{$type}</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
