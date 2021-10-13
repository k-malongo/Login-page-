 
<?php
$sessionTime = 365 * 24 * 60 * 60;
$sessionName = "loggedin";
session_set_cookie_params($sessionTime);
session_name($sessionName);
session_start();

if (isset($_COOKIE[$sessionName])) {
    setcookie($sessionName, $_COOKIE[$sessionName], time() + $sessionTime, "/");
}
try{
$host="mysql:host=localhost;dbname=kev";
$user_name="root";
$user_password="";
$dbh=new PDO($host,$user_name,$user_password);
date_default_timezone_set('Africa/Nairobi');
}
catch(Exception $e){
exit("Connection Error".$e->getMessage());
}
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
?>
 