<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Multiplication</title>
</head>
<body>
    <div class="container mt-5">
        <?php
        $my_var = 3; // กำหนดแม่สูตรคูณ
        ?>
        <h1 class="text-center">สูตรคูณแม่ <?php echo $my_var; ?></h1>
        <div class="row">
            <div class="col-12 text-center">
                <?php
                for ($i = 1; $i <= 12; $i++) { 
                    echo $my_var . " * " . $i . " = " . ($my_var * $i) . "<br>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
