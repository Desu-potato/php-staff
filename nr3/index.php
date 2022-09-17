
<script type="text/javascript">
    function take_me_to_register(){
        location.href = "register.php";
    };
</script>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billings</title>
</head>
<body>
<form action="logic.php" method="post">
    <h1>Zaloguj się</h2></br>
    Podaj dane:</br>
    Login<input name="login" value="1" autocorrect="off"></input></br>
    Hasło<input type="password" name="password" value="1" autocorrect="off"></input>
    <input type="submit">
    
</form>
<button id="register" onclick="take_me_to_register()">Zarejestruj się</button>
</body>

