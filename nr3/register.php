<script type="text/javascript">
function validate()
{
  
  var checker = <?php
    require_once("database/mysql.php");

    
    $conn->close();
    $myJSON = json_encode($myObj);

echo $myJSON;
?>
  var login = document.getElementById('log').value;
  var pass1 = document.getElementById('p1').value;
  var pass2 = document.getElementById('p2').value;
  if(pass1 != pass2)
  { 
    alert("Hasła nie są takie same");
    return false;
  }
  return true;
}
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
<form onsubmit="return validate();" action="logic.php" method="post">
    Podaj dane:</br>
    Login<input id="log" name="loginReg" value="" pattern="^[a-zA-Z0-9]*.{4,10}$" title="Może się składać z wszystkich liter od A do Z i numerów bez znaków specjalnych. Musi składać się conajmniej z 4 znaków i nie więcej niż 10" required></input></br>
    Email<input id="email" name="emailReg" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" title="Wprowadź poprawny email." required value="" ></input></br>
    Hasło<input id="p1" type="password" name="password1Reg" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,64}" title="Musi składać się z conajmniej jednego numeru i małej litery, oraz posiadać conajmniej 8 znaków ale nie więcej niż 64." required value=""></input></br>
    Hasło2<input id="p2"type="password" name="password2Reg" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,64}" title="Musi składać się z conajmniej jednego numeru i małej litery, oraz posiadać conajmniej 8 znaków ale nie więcej niż 64." required value=""></input></br>
    Typ rejestracji<select name="data_type">
    <option value="1">Osoba Fizyczna</option>
    <option value="2">Firma</option>
    <input type="submit">
    
</form>
</body>

