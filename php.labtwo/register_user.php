<?php

require_once 'connection.php';

if (isset($_POST['submit'])) {

    if (preg_match('/^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$/', $_POST['user_email'])
        && preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/', $_POST['user_password'])
    ) {
        $link = mysqli_connect($host, $user, $password, $database)
        or die("Error " . mysqli_error($link));

        $email = $_POST['user_email'];
        $pass = $_POST['user_password'];

        $queryUser = "SELECT * FROM Users WHERE Email = '$email'";

        $result = mysqli_query($link, $queryUser)->fetch_row();

        if(!($result[1] == $email)){
            $queryUser = "INSERT INTO Users(Pass, Email) VALUES ('$pass', '$email')";

            $result = mysqli_query($link, $queryUser);

            header('Location: http://php.labtwo/calendar.php');
        }

        echo "This user already exist";
        return;
    }

    echo "This date is invalid";

}
else{
    header('Location: http://php.labtwo/authorization.php');
}

?>