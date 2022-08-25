<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" href="./css/register.css">
</head>
<body>
     <form action="register_check.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
         
        
         <label>Name</label>
     	<input type="text" name="name" placeholder="Name"><br>

         <label>User Name</label>
     	<input type="text" name="username" placeholder="User Name"><br>
        
         <label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<label>Re-Enter Password</label>
     	<input type="password" name="re-password" placeholder="Re-Enter Password"><br>

         <label>User Role</label>
     	<select name="role">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>

     	<button type="submit">Register</button>
		<a href="index.php">Already Regigistered</a>
     </form>
</body>
</html>