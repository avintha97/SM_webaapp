<!DOCTYPE html>
<html>

<head>
	<title>Super Map</title>
	<link rel="icon" href="../img/badge.jpg">
	<style>
		.bg-cover {
			display: none;
		}
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		body,
		html {
			height: 100%;
			margin: 0;
			font-family: Arial, Helvetica, sans-serif;
		}

		* {
			box-sizing: border-box;
		}

		.bg-image {
			/* The image used */
			background-image: url("./img/geomatics.jpg");

			/* Add the blur effect */
			filter: blur(8px);
			-webkit-filter: blur(8px);

			/* Full height */
			height: 100%;

			/* Center and scale the image nicely */
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
		}

		/* Position text in the middle of the page/image */
		.bg-text {
			background-color: rgb(0, 0, 0);
			/* Fallback color */
			background-color: rgba(0, 0, 0, 0.4);
			/* Black w/opacity/see-through */
			color: white;
			font-weight: bold;
			border: 3px solid #f1f1f1;
			position: absolute;
			top: 65%;
			left: 85%;
			transform: translate(-50%, -50%);
			z-index: 2;
			width: 25%;
			padding: 20px;
			text-align: center;
		}

		/*Form*/


		input[type=text],
		input[type=password] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}

		button {
			background-color: #04AA6D;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			cursor: pointer;
			width: 100%;
		}

		button:hover {
			opacity: 0.8;
		}

		.cancelbtn {
			width: auto;
			padding: 10px 18px;
			background-color: #f44336;
		}

		.imgcontainer {
			text-align: center;
			margin: 24px 0 12px 0;
		}

		img.avatar {
			width: 40%;
			border-radius: 50%;
		}

		.container {
			padding: 16px;
		}

		span.psw {
			float: right;
			padding-top: 16px;
		}

		/* Change styles for span and cancel button on extra small screens */
		@media screen and (max-width: 300px) {
			span.psw {
				display: block;
				float: none;
			}

			.cancelbtn {
				width: 100%;
			}
		}
	</style>
</head>

<body>

	<div class="bg-image"></div>

	<div class="bg-text">
		<h2 style="background-color: black;color:white;padding:5px;">Login Form</h2>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>

		<form action="login_check.php" method="post">


			<div class="container">
				<label for="user Name"><b>Username</b></label>
				<input type="text" name="username" placeholder="User Name" required>

				<label for="password"><b>Password</b></label>
				<input type="password" name="password" placeholder="Password" id="myInput" required>

				<button type="submit">Login</button>
				<label>
					<input type="checkbox" onclick="myFunction()">Show Password
				</label>
			</div>




		</form>
		<button type="button" style="background-color: black;color:white;width:95%;" class="cancelbtn"> <a href="register.php" style="color: white;text-decoration:none;">Sign Up</a> </button>

	</div>
	<script>
		function myFunction() {
			var x = document.getElementById("myInput");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}
	</script>
</body>

</html>