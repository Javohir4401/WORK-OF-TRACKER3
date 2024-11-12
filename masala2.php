<!DOCTYPE html>
<html>
<head>
    <title>Number</title>
</head>
<body>
    <form method="post">
        <label for="number">raqam yozing:</label>
        <input type="number" name="number" id="number" required>
        <button type="submit">Check</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = $_POST["number"];

        if ($number > 0) {
            echo "musbat son";
        } elseif ($number < 0) {
            echo "manfiy son";
        } else {
            echo "nol";
        }
    }
    ?>
</body>
</html>
