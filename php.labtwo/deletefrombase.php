<?php

require_once 'get_and_draw_date.php';
require_once 'connection.php';

if (isset($_POST['note'])) {
    $link = mysqli_connect($host, $user, $password, $database)
    or die("Error " . mysqli_error($link));

    $note = $_POST['note'];
    $newDate = "'" . $year . '-' . $month . '-' . $day . "'";
    $email = $_SESSION['email'];

    $queryDate = "DELETE FROM notes WHERE Date like $newDate AND UserEmail = '$email'";
    $result1 = mysqli_query($link, $queryDate) or die("Error " . mysqli_error($link));

    mysqli_close($link);
}
else{
    header('Location: http://php.labtwo/calendar.php');
}
?>