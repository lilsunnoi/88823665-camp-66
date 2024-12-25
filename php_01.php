<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Multiplication</title>
    <style>
        body {
            background: linear-gradient(120deg, #f6d365, #fda085);
            color: #fff;
            font-family: 'Arial', sans-serif;
        }
        h1 {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }
        .card {
            background-color: rgba(255, 255, 255, 0.1);
            border: none;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <?php
        $my_var = 3; // กำหนดแม่สูตรคูณ
        ?>
        <h1 class="text-center mb-4">สูตรคูณแม่ <?php echo $my_var; ?></h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card text-center">
                    <?php
                    for ($i = 1; $i <= 12; $i++) { 
                        echo "<p>" . $my_var . " x " . $i . " = " . ($my_var * $i) . "</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
