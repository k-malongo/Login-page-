<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
   
   include ('config.php');

    $conn=$dbh->prepare('SELECT username FROM users WHERE username=?');
    $conn->bindParam(1,$username);
    $conn->execute();

    if($conn->rowCount() !==0){
    ?>
        <script>
            alert('username Exists you have to pick another username');
            window.location.href='../register.html';
        </script>
        <?php
    }else{$conn=$dbh->prepare('INSERT INTO users (username,password) VALUES (?,?)');
    $conn->bindParam(1,$username);
    $conn->bindParam(2,$password);
    $conn->execute();
    if($conn->rowCount() == 0) {
    ?>
        <script>
            alert('Registration failed, Please try again');
            window.location.href='../register.html';
        </script>
        <?php

}
    elseif($conn->rowCount() !==0){
    $output['error'] = false;
    $output['message'] = "Successfully Registered";
    $output['username']=$username;
    ?>
        <script>
            alert('Successfully Registered you can now login');
            window.location.href='../login.html';
        </script>
        <?php
}
}
//echo json_encode($output);

?>
