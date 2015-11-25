<!Doctype>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<form id="register-form" method="post" action="register_user.php">
    <fieldset>
        <legend>Registration</legend>
        <input type="text" name="user_email" placeholder="your email">
        <br/><br/>
        <input type="password" name="user_password" placeholder="your password">
        <br/><br/>
        <button type="reset">очистить поля</button>
        <button type="submit" name="submit">зарегистрироваться</button>
        <button type="submit" name="authorization">авторизироваться</button>
    </fieldset>
</form>
</body>
</html>