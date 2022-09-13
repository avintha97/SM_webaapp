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
		<input type="text" name="name" placeholder="Name">

		<label>Index Number</label>
		<input type="text" name="username" placeholder="Index Number">

		<label>Password</label>
		<input type="password" name="password" placeholder="Password">

		<label>Re-Enter Password</label>
		<input type="password" name="re-password" placeholder="Re-Enter Password">

		<label>Select Your District</label>
		<select name="district" id="" >
            <option value="Ampara">Ampara</option>
            <option value="Anuradapura">Anuradapura</option>
            <option value="Badulla">Badulla</option>
            <option value="Batticoloa">Batticoloa</option>
            <option value="Colombo">Colombo</option>
            <option value="Galle">Galle</option>
            <option value="Gampaha">Gampaha</option>
            <option value="Hambantota">Hambantota</option>
            <option value="Jaffna">Jaffna</option>
            <option value="Kaluthara">Kaluthara</option>
            <option value="Kandy">Kandy</option>
            <option value="Kegalle">Kegalle</option>
            <option value="Kilinochchi">Kilinochchi</option>
            <option value="Kurunagala">Kurunagala</option>
            <option value="Mannar">Mannar</option>
            <option value="Matale">Matale</option>
            <option value="Matara">Matara</option>
            <option value="Monaragala">Monaragala</option>
            <option value="Mullativu">Mullativu</option>
            <option value="NuwaraEliya">Nuwara Eliya</option>
            <option value="Polonnaruwa">Polonnaruwa</option>
            <option value="Puttalam">Puttalam</option>
            <option value="Rathnapura">Rathnapura</option>
            <option value="Trincomalee">Trincomalee</option>
            <option value="Vavunia">Vavunia</option>
        </select>

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