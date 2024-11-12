<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form method="post">
            <label for="number">soz yozing:</label>
            <input type="number" name="number" id="number" required>
            <button type="submit">Check</button>
        </form>
        <?php
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $number = $_POST["number"];
        
        $factorial = 1;

        for ($i = 1; $i <= $number; $i++) {
            $factorial *= $i;
        }

        echo "$number soning factoriali: " . $factorial;
    }
        ?>

</body>
</html>