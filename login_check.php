<?php
session_start();
include "db_conn.php";


if(isset($_POST['username']) && isset($_POST['password'])){

    function clearData($data){
$data = trim($data);
$data =stripslashes($data);
$data=htmlspecialchars($data);
return $data;
    }
$username = clearData($_POST['username']);
$password = clearData($_POST['password']);

if(empty($username)){
    header("Location: index.php?error=User name is required");
}else if(empty($password)){
    header("Location: index.php?error=password is required");
}else{
    
    $sql1 = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
    $res = mysqli_query($conn,$sql1);

    if(mysqli_num_rows($res)===1){
        $row = mysqli_fetch_assoc($res);
      

        if($row['username']=== $username && $row['password']===$password && $row['role'] === 'admin'){
            $_SESSION['username'] =$row['username'];
            $_SESSION['name'] =$row['name'];
            $_SESSION['password'] =$row['password'];
            $_SESSION['id'] =$row['id'];
            $_SESSION['role'] =$row['role'];
            header("Location:./admin/home.php");
        }else if($row['username']=== $username && $row['password']===$password && $row['role'] === 'user'){
            $_SESSION['username'] =$row['username'];
            $_SESSION['name'] =$row['name'];
            $_SESSION['password'] =$row['password'];
            $_SESSION['id'] =$row['id'];
            $_SESSION['role'] =$row['role'];
           header("Location:./user/home.php");
          
        }else{
            header("Location: index.php?error=Username or Password Incorret");
        }
    }else{
        header("Location: index.php?error=Username or Password Incorret");
    }
}

}else{
    header("Location: index.php");
}