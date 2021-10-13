<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
   
   include ('config.php');

    $conn=$dbh->prepare('SELECT * FROM users WHERE username=? AND password =?');
    $conn->bindParam(1,$username);
    $conn->bindParam(2,$password);
    $conn->execute();
    if($conn->rowCount()>0){
    ?>
        <script>
            alert('Login Success');
        </script>
        <?php
    }else{
        ?>
        <script>
            alert('Wrong Credentials');
            window.location.href='../login.html';
        </script>
    <?php
}
?>
<html>  
<head>  
   <link rel = "stylesheet" type = "text/css" href = "css/login_styles.css">   
   <link rel="stylesheet" type="text/css" href="css/forms.css">
</head>  
<body>  
    <div id = "frm">  
        <h1>Welcome</h1>  
        <form name="f1" action = "#">  
            <p>  
               Logged in as : <?php echo $username ?>
            </p>  
        </form>  
    </div>  
     
</body>     
</html>  
