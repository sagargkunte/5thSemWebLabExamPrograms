<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Remember you have to copy this file to C drive -> xampp -> htdocs to run it in your local server. -->
</head>

<body>

    <h1>Welcome to Our website</h1>
    <?php

    $file = "counter.txt";

    if(!file_exists($file)) {
        file_put_contents($file,0);
    }
    $count = (int)file_get_contents($file);
    $count++;

    file_put_contents($file,$count);
    // echo "Hello, World!";

    echo "<p>Visitors count : $count</p>"
    ?>
</body>

</html>