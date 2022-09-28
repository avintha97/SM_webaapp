<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/user/user_dashboard.css">
        <!-- CSS only 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>User Dashboard</title>
    </head>

    <body>

        <div class="container">

            <div class="sidebar">

                <!-- <input type="checkbox" name="" class="check" id="check">
                <label for="check">
                    <span class="fa fa-times" id="times" class="tog-span"></span>
                    <span class="fa fa-bars" id="bars" class="tog-span"></span>
                </label> -->

                <nav id="nav">


                    <ul>

                        <li><a href="" class="logo">

                                <img src="../img/user.png" alt="">
                                <span class=""><?php echo $_SESSION['username']; ?></span>
                                <span id="district_value"><?php echo $_SESSION['district']; ?></span>
                            </a></li>
                        <li><a href="home.php">
                                <i class="fas fa-user"></i>
                                <span class="nav-item">My Profile</span>
                            </a></li>
                        <li><a href="power_cut.php">
                                <i class="fas fa-power-off"></i>
                                <span class="nav-item">Today Power Cut</span>
                            </a></li>
                        <li><a href="signal_issue.php">
                                <i class="fas fa-wifi"></i>
                                <span class="nav-item">Today Signal Issues</span>
                            </a></li>
                        <li><a href="uni_area.php">
                                <i class="fas fa-university"></i>
                                <span class="nav-item">University Area</span>
                            </a></li>
                        <li>
                            <a href="../logout.php" class="logout">
                                <i class="fas fa-sign-out"></i>
                                <span class="nav-item">LOG OUT</span>

                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <section class="main">

                <div class="top">
                    <h1>My Profile</h1>
                    <i class="fas fa-user-cog"></i>
                </div>
                <div class="profile-img">
                    <img src="../img/user.png" alt="">
                </div>
                <div class="body">
                    <div class="row">
                        <div class="cards">
                            <i class="fas fa-user"></i>
                            <h3>user information</h3>
                            <div class="user_data">
                                <h4>User Name : <?php echo $_SESSION['username']; ?></h4>
                                <h4>Name :<?php echo $_SESSION['name']; ?></h4>
                                <h4>User Role :<?php echo $_SESSION['role']; ?></h4>
                                <h4>Location : <?php echo $_SESSION['district']; ?></h4>
                            </div>

                        </div>
                        <div class="cards">
                            <i class="fas fa-clock"></i>
                            <h3>Time</h3>
                            <div class="clock">
                                <div>
                                    <span id="hour"></span>
                                    <span class="text">Hours</span>
                                </div>
                                <div>
                                    <span id="minutes"></span>
                                    <span class="text">Minutes</span>
                                </div>
                                <div>
                                    <span id="seconds"></span>
                                    <span class="text">Seconds</span>
                                </div>
                                <div>
                                    <span id="ampm">AM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="cards">
                            <i class="fas fa-sun "></i>
                            <h3>Weather Forcast</h3>
                            <input type="text" value="<?php echo $_SESSION['district']; ?>" id="weather" class="form-control">
                            <div class="weatherdata">
                                <div id="town"></div>
                                <div id="temp"></div>
                                <div id="humidity"></div>
                                <div id="speed"></div>
                            </div>
                        </div>
                        <div class="cards">
                            <i class="fas fa-calendar"></i>
                            <h3>Date</h3>
                            <div class="date">
                                <div>
                                    <span id="year"></span>
                                    <span class="text">year</span>
                                </div>
                                <div>
                                    <span id="month"></span>
                                    <span class="text">Month</span>
                                </div>
                                <div>
                                    <span id="day"></span>
                                    <span class="text">Day</span>
                                </div>
                            </div>
                        </div>


                    </div>
            </section>
        </div>



        <script src="../js/main.js"></script>
        <script>
            colapse.addEventListener("click", function(e) {
                const colapse = document.getElementById("colapse");
                const close = document.getElementById("close");
                const colapsevalue = colapse.getAttribute("id");
                const closevalue = close.getAttribute("id");
                console.log(colapsevalue);
                e.preventDefault();
                if (closevalue == "close") {
                    document.getElementById("nav").style.width = 280;
                    close.setAttribute("id", "colapse");
                } else {
                    document.getElementById("nav").style.width = 0;
                    document.getElementById("colapse").style.position = "fixed";
                    colapse.setAttribute("id", "close");
                }


            })
        </script>

    </body>

    </html>
<?php
} else {
    header("Location:../index.php");
}
?>