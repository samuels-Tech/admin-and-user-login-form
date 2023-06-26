<?php
$host ="localhost";
$user= "root";
$password ="";
$db = "user";

session_start();

$data =mysqli_connect($host,$user,$password,$db);
if($data ===false){
    die("connection error");
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
 $username =$_POST["username"];
 $password=$_POST["password"];
}
$sql = "SELECT * FROM login WHERE username = '" . $username . "' AND password = '" . $password . "'";

$result =mysqli_query($data,$sql);
$row = mysqli_fetch_array($result);
if($row['usertype']=="user"){

    $_SESSION["username"]=username;

    header("location:user.php");
    exit();
}
elseif($row['usertype']=="admin"){
    header("location:admin.php");
    exit();
    $_SESSION["username"]=username;

}
else{
    echo "username or password incorrect";
}







?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
<center>
    <h1>Login Form</h1>
    <form action="#"method="POST">
        <div>
            <label for="username">username:</label>
            <input type="text" name="username" placeholder="username">
        </div>
        <div>
            <label for="Password">Password:</label>
            <input type="Password" name="password" placeholder="password">
        </div>
        <div>
            <input type="submit" value="Login">
        </div>
        </center>
    </form>
</body>
</html>