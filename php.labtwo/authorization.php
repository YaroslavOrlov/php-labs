<!Doctype>
<html>
<head>
    <title>Authorization</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<form id="auth-form" method="post" action="authorithation_user.php">
    <fieldset>
        <legend>Authorization</legend>
        <input type="text" name="user_email" placeholder="your email">
        <br/><br/>
        <input type="password" name="user_password" placeholder="your password">
        <br/><br/>
        <button type="reset">очистить поля</button>
        <button type="submit" name="submit">войти</button>
        <button type="submit" name="registration">зарегистрироваться</button>
    </fieldset>
</form>
</body>
</html>