<?php

require_once 'get_and_draw_date.php';
require_once 'connection.php';

if (isset($_POST['note'])) {
    $link = mysqli_connect($host, $user, $password, $database)
    or die("Error " . mysqli_error($link));

    $note = $_POST['note'];
    $newDate = "'" . $year . '-' . $month . '-' . $day . "'";

    session_start();
    $email = $_SESSION['email'];

    if (!empty($_POST['note'])) {
        $queryInsert = "INSERT INTO notes (Date, Text, UserEmail) VALUES ($newDate, '$note', '$email')";
        $result2 = mysqli_query($link, $queryInsert) or die("Error " . mysqli_error($link));
    }
    $queryDate = "SELECT n.Text FROM notes n WHERE n.Date = $newDate AND n.UserEmail = '$email'";
    $result1 = mysqli_query($link, $queryDate) or die("Error " . mysqli_error($link));

    if ($result1) {
        $rows = mysqli_num_rows($result1); // количество полученных строк
        for ($i = 0; $i < $rows; ++$i) {
            $row = mysqli_fetch_row($result1);
            for ($j = 0; $j < 1; ++$j)
                echo "<textarea class='text' wrap='hard' disabled>$row[$j]</textarea>";
        }
        mysqli_free_result($result1);
    }
    mysqli_close($link);
}
else{
    header('Location: http://php.labtwo/calendar.php');
}
?>