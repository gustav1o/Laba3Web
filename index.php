<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ЛР№3 Рудник І. О.</title>
    <style>
        .block{
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <h1>Лабораторна робота №3. Рудник І. О. КІУКІ-19-8. Варіант 1</h1>
    <section>
        <div class="block">
            <form action="get_1.php" method="get">
                <label for="group">Выберите группу:</label>
                <select name="group" id="group">
                    <?php
                        include('connect.php');
                        try {
                            $stmt = $dbh->query("SELECT ID_Groups, title FROM groups");
                            $res = $stmt->fetchAll();
                            foreach($res as $row)
                            {
                                echo "<option value='$row[0]'>$row[1]</option>";
                            }
                        }
                        catch(PDOException $ex) {
                            echo $ex->GetMessage();
                        }
            
                        $dbh = null;
                    ?>
                </select>
                <input type="submit" value="Найти расписание">
            </form>
        </div>
        <div class="block">
            <form action="get_2.php" method="get">
                <label for="teacher">Выберите преподавателя:</label>
                <select name="teacher" id="teacher">
                    <?php
                        include('connect.php');
                        try {
                            $stmt = $dbh->query("SELECT ID_Teacher, name FROM teacher");
                            $res = $stmt->fetchAll();
            
                            foreach($res as $row)
                            {
                                echo "<option value='$row[0]'>$row[1]</option>";
                            }
                        }
                        catch(PDOException $ex) {
                            echo $ex->GetMessage();
                        }
            
                        $dbh = null;
                    ?>
                </select>
                <input type="submit" value="Найти расписание">
            </form>
        </div>               
        <div class="block">        
            <form action="get_3.php" method="get">
            <label for="auditorium">Выберите аудиторию:</label>
            <select name="auditorium" id="auditorium">
                <?php
                    include('connect.php');
                    try {
                        $stmt = $dbh->query("SELECT DISTINCT auditorium FROM lesson");
                        $res = $stmt->fetchAll();
        
                        foreach($res as $row)
                        {
                            echo "<option value='$row[0]'>$row[0]</option>";
                        }
                    }
                    catch(PDOException $ex) {
                        echo $ex->GetMessage();
                    }
        
                    $dbh = null;
                ?>
            </select>
            <input type="submit" value="Найти расписание">
            </form>
        </div>               
    </section>
</body>
</html>    