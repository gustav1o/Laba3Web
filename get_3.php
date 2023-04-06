<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3d response</title>
</head>
<body>
    <?php
    include('connect.php');

    $auditorium = $_GET['auditorium'];

    try {
        $sqlSelect = "SELECT lesson.week_day, lesson.lesson_number, lesson.disciple, teacher.name
                    FROM lesson 
                    INNER JOIN lesson_teacher ON lesson.ID_Lesson = lesson_teacher.FID_Lesson1 
                    INNER JOIN teacher ON lesson_teacher.FID_Teacher = teacher.ID_Teacher 
                    WHERE lesson.auditorium = ?";

        $stmt = $dbh->prepare($sqlSelect);

        $stmt->bindValue(1, $auditorium);
        $stmt->execute();
        $res = $stmt->fetchAll();

        echo "<table border='1'>";
        echo "<thead><tr><th>День недели</th><th>Номер пары</th><th>Дисциплина</th><th>Преподаватель</th></tr></thead>";
        echo "<tbody>";

        foreach($res as $row)
        {
            echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
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

