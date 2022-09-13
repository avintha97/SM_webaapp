<?php
session_start();
include "db_conn.php";


if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['re-password']) && isset($_POST['role']) && isset($_POST['district'])){

    function clearData($data){
$data = trim($data);
$data =stripslashes($data);
$data=htmlspecialchars($data);
return $data;
    }
$username = clearData($_POST['username']);
$password = clearData($_POST['password']);
$repassword = clearData($_POST['re-password']);
$role = clearData($_POST['role']);
$name = clearData($_POST['name']);
$district =ClearData(($_POST['district']));




if(empty($name)){
    header("Location: register.php?error=Name is required");
}
else if(empty($username)){
    header("Location: register.php?error=Userame is required");
}else if(empty($password)){
    header("Location: register.php?error=password is required&");
}else if(empty($repassword)){
    header("Location: register.php?error=Re-password is required");
}else if(empty($role)){
    header("Location: register.php?error=Please choose role&");
}else if(empty($district)){
    header("Location: register.php?error=Please choose your District&");
}
else if($password != $repassword){
    header("Location: register.php?error=Password Does not mached");
}
else{

    
     $sql2 = "SELECT * FROM users WHERE username = '$username' ";
     $res = mysqli_query($conn,$sql2);

     if(mysqli_num_rows($res)>0){
        header("Location: register.php?error=User already registered");
     }else{
        $sql3 = "INSERT INTO users(name,username,password,role,District) VALUES('$name','$username','$password','$role','$district')";
        $res1 = mysqli_query($conn,$sql3);
        if($res1){
            header("Location: index.php");
        }else{
            header("Location: register.php?error=Unknown error");
        }
     }

}

}else{
    header("Location: register.php");
}