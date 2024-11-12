<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form method="post">
            <label for="text">soz yozing:</label>
            <input type="text" name="string" id="string" required>
            <button type="submit">Check</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $string = $_POST["string"];
            
            $length = strlen($string);
            echo "String uzunligi: " . $length;            
        }
        ?>
</body>
</html>