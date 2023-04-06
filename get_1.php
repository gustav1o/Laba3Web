<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1st response</title>
</head>
<body>
    <?php
    include('connect.php');

    $group_id = $_GET['group'];

    try {
        $sqlSelect = "SELECT lesson.ID_Lesson, lesson.week_day, lesson.lesson_number, lesson.auditorium, lesson.disciple, lesson.type
                    FROM lesson 
                    JOIN lesson_groups ON lesson_groups.FID_Lesson2 = lesson.ID_Lesson
                    WHERE lesson_groups.FID_Groups = ?";

        $stmt = $dbh->prepare($sqlSelect);

        $stmt->bindValue(1, $group_id);
        $stmt->execute();
        $res = $stmt->fetchAll();

        echo "<table border='1'>";
        echo "<thead><tr><th>ID_Lesson</th><th>Day</th><th>Lesson Number</th><th>Auditorium</th><th>Disciple</th><th>Type</th></tr></thead>";
        echo "<tbody>";

        foreach($res as $row)
        {
            echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>";
        }
        
        echo "</tbody>";
        echo "</table>";
    }
    catch(PDOException $ex) {
        echo $ex->GetMessage();
    }

    $dbh = null;
    ?>
</body>
</html>

