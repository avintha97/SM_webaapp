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
        <link rel="stylesheet" href="../css/admin/admin_dashboad.css">
        <!-- CSS only -->
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
                            <span class="nav-item">Dashboard</span>
                        </a></li>
                    <li><a href="admin_power_cut.php">
                            <i class="fas fa-power-off"></i>
                            <span class="nav-item"> Power Cut</span>
                        </a></li>
                    <li><a href="admin_signal_issues.php">
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
            <h1 class="row_h1">Dashboard</h1>
                <div class="body">
               
                    <div class="row">
                        
                        
                            <div class="cards">
                                <i class="fas fa-user"></i>

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
                                <select name="district" id="weather_query" onclick="weathervalue(this.value)">
                                    <option value="Ampara">Ampara</option>
                                    <option value="Anuradhapura">Anuradhapura</option>
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
                                    <option value="Kurunegala">Kurunegala</option>
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
                                <br>
                              
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




    </body>
    <script src="../js/admin_main.js"></script>

    </html>
<?php
} else {
    header("Location:../index.php");
}
?>