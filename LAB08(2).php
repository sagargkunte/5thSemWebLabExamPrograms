<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Remember you have to copy this file to C drive -> xampp -> htdocs to run it in your local server. -->
</head>

<body>
    <h3>Student Record sorter</h3>

    <?php
    $conn = new mysqli("localhost", "root", "", "students", 3307);

    if ($conn->connect_error) {
        die("Connection failed");
    }

    $result = $conn->query("SELECT * FROM students");
    // echo $result;
    $students = [];

    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
    // print_r($students);
    

    echo "<h3>Unsorted Lists</h3>";
    echo "<table>";

    echo "<tr><th>ID</th><th>NAME</th><th>CGPA</th></tr>";

    foreach ($students as $s) {
        echo "<tr>
                <td>{$s['id']}</td>
                <td>{$s['name']}</td>
                <td>{$s['cgpa']}</td>
                </tr>
            ";
    }
    echo "</table>";

    $n = count($students);

    for ($i = 0; $i < $n - 1; $i++) {
        $min = $i;

        for ($j = $i + 1; $j < $n; $j++) {
            if ($students[$j]['cgpa'] < $students[$min]['cgpa']) {
                $min = $j;
            }

        }

        $temp = $students[$i];
        $students[$i] = $students[$min];
        $students[$min] = $temp;
    }


    echo "<h3>Sorted Lists</h3>";
    echo "<table>";

    echo "<tr><th>ID</th><th>NAME</th><th>CGPA</th></tr>";

    foreach ($students as $s) {
        echo "<tr>
                <td>{$s['id']}</td>
                <td>{$s['name']}</td>
                <td>{$s['cgpa']}</td>
                </tr>
            ";
    }
    echo "</table>";

    $conn->close();
    ?>
</body>

</html>