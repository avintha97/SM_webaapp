<?php
session_start();

 if(isset($_SESSION['id']) && isset($_SESSION['username'])){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin/admin_dashboad.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>User Dashboard</title>
</head>
<body>
<div class="container">
   <nav>
    <ul>
        <li><a href="" class="logo">
            <img src="../img/logo.jpg" alt="">
            <span class=""><?php echo $_SESSION['username']; ?></span>
        </a></li>
        <li><a href="">
        <i class="fas fa-user"></i>
            <span class="nav-item">Data</span>
        </a></li>
        <li><a href="admin_power_cut.php">
        <i class="fas fa-power-off"></i>
            <span class="nav-item"> Power Cut</span>
        </a></li>
        <li><a href="">
        <i class="fas fa-wifi"></i>
            <span class="nav-item">Signal Issues</span>
        </a></li>
        <li><a href="">
        <i class="fas fa-university"></i>
            <span class="nav-item">Details</span>
        </a></li>
        <li><a href="../logout.php" class="logout">
        <i class="fas fa-sign-out"></i>
           <span class="nav-item">LOG OUT</span>
        </a></li>
    </ul>
   </nav>
   <section class="main">
   
    
   </section>
</div>




</body>
</html>
<?php
 }else{
     header("Location:../index.php");
 }
?>