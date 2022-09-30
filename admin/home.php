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
        <!-- <link rel="stylesheet" href="../css/admin/admin_dashboad.css"> -->
        <style>
            body {
                margin: 0;
                overflow: hidden;
            }

            .navbar {
                overflow: hidden;
                background-color: #111;
            }

            .navbar a {
                float: right;
                font-size: 16px;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }

            .dropdown {

                float: right;
                overflow: hidden;
            }

            .dropdown .dropbtn {
                font-size: 16px;
                border: none;
                outline: none;
                color: white;
                padding: 14px 16px;
                background-color: inherit;
                font-family: inherit;
                margin: 0;
            }

            .navbar a:hover,
            .dropdown:hover .dropbtn {
                background-color: red;
            }

            .dropdown-content {

                display: none;
                position: absolute;
                background-color: #f9f9f9;
                width: 20%;
                right: 0px;
                box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                z-index: 1;
            }

            .dropdown-content a {
                float: none;
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
                text-align: center;
                min-width: 300px;
            }

            .dropdown-content a:hover {
                background-color: #ddd;
            }

            .dropdown:hover .dropdown-content {
                display: block;
            }

            /*side*/
            .sidenav {
                height: 100%;
                width: 160px;
                position: fixed;
                z-index: 1;
                top: 0;
                left: 0;
                background-color: #111;
                overflow-x: hidden;
                padding-top: 20px;

            }

            .sidenav a {
                padding: 6px 8px 6px 16px;
                text-decoration: none;
                font-size: 15px;
                color: #818181;
                display: block;
                padding-bottom: 20px;
            }

            .sidenav a:hover {
                color: #f1f1f1;
            }

            .main {
                margin-left: 160px;

                font-size: 28px;

                padding: 0px 10px;
            }

            @media screen and (max-height: 450px) {
                .sidenav {
                    padding-top: 15px;
                }

                .sidenav a {
                    font-size: 18px;
                }
            }

            /*card*/
            .card {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                max-width: 300px;
                padding: 20px;
                text-align: center;
                font-family: arial;
                background-color: red;
            }



            .card button {
                border: none;
                outline: 0;
                padding: 12px;
                color: white;
                background-color: #000;
                text-align: center;
                cursor: pointer;
                width: 100%;
                font-size: 18px;
            }

            .card button:hover {
                opacity: 0.7;
            }


            .flex-container {
                display: flex;
                flex-direction: row;
                font-size: 15px;
                text-align: center;
                justify-content: space-evenly;
            }

            @media (max-width: 800px) {
                .flex-container {
                    flex-direction: column;
                }
            }


            .avatar {
                vertical-align: middle;
                width: 75px;
                height: 75px;
                border-radius: 50%;
            }


            .block {
                display: block;
                width: 100%;
                border: none;
                background-color: black;
                color: white;
                padding: 14px 28px;
                font-size: 16px;
                cursor: pointer;
                text-align: center;
            }

            .block:hover {
                background-color: black;
                color: white;
            }


            .flip-card {
                background-color: transparent;
                width: 300px;
                height: 300px;
                perspective: 1000px;
            }

            .flip-card-inner {
                position: relative;
                width: 100%;
                height: 100%;
                text-align: center;
                transition: transform 0.6s;
                transform-style: preserve-3d;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            }

            .flip-card:hover .flip-card-inner {
                transform: rotateY(180deg);
            }

            .flip-card-front,
            .flip-card-back {
                position: absolute;
                width: 100%;
                height: 100%;
                -webkit-backface-visibility: hidden;
                backface-visibility: hidden;
            }

            .flip-card-front {
                background-color: #bbb;
                color: black;
            }

            .flip-card-back {
                background-color: black;
                color: white;
                transform: rotateY(180deg);
            }



            .clock {
                display: flex;
                margin-right: 40px;
                justify-content: center;
                padding-top: 20px;


            }

            .date {
                display: flex;
                padding-top: 20px;
                justify-content: center;


            }

            .clock div {
                margin: 5px;

                position: relative;
            }

            .date div {
                margin: 5px;
                position: relative;
            }

            .clock span {
                width: 60px;
                height: 40px;
                background-color: rgb(54, 54, 55);
                opacity: 0.8;
                color: white;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 20px;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            }

            .date span {
                width: 60px;
                height: 40px;
                background-color: rgb(54, 54, 55);
                opacity: 0.8;
                color: white;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 20px;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            }

            .clock .text {
                height: 10px;
                font-size: 6px;
                text-transform: uppercase;
                letter-spacing: 2px;
                background: rgb(2, 2, 2);
                opacity: 0.8;

            }

            .date .text {
                height: 10px;
                font-size: 6px;
                text-transform: uppercase;
                letter-spacing: 2px;
                background: rgb(2, 2, 2);
                opacity: 0.8;

            }

            .clock #ampm {
                bottom: 0;
                position: absolute;
                width: 60px;
                height: 30px;
                font-size: 20px;
                background: rgb(11, 11, 11);
            }


            .weatherdata {
                padding: 10px;
                font-size: 15px;

            }

            .user_data {
                padding-top: 20px;
            }

            .data_block {
                padding-top: 50px;
            }
        </style>
        </style>
        <!-- CSS only -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital@1&display=swap" rel="stylesheet">
        <title>Admin Dashboard</title>
    </head>

    <body>


        <div class="sidenav">
            <div style="padding-left:25%;"><img src="../img/user_info.jpg" alt="user_info" class="avatar">
            </div>

            <a href="home.php" style="padding-top: 50px;"><i class="fa fa-tachometer" style="padding-right: 15px;"></i>Dashboard</a>

            <a href="admin_power_cut.php"><i class="fas fa-power-off" style="padding-right: 15px;"></i>Powercut isues</a>
            <a href="admin_signal_issues.php"><i class="fas fa fa-wifi" style="padding-right: 15px;"></i>Signal Isues</a>
            <a href="https://www.sab.ac.lk/geo/"><i class="fa fa-university" style="padding-right: 12px;"></i>Go to Web</a>
        </div>

        <div class="navbar">

            <div class="dropdown">
                <button class="dropbtn">Profile
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <div style="padding-left: 40%;"><img src="../img/user.png" alt="Avatar" class="avatar"></div>
                    <a href="../logout.php"> <button class="block">Logout</button></a>


                </div>
            </div>
        </div>
        <div class="main">
            <h1 style="padding-left:35%;"> Admin Dashboard</h1>

            <div class="flex-container" style="padding-top:50px ;">

                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <img src="../img/user_info.jpg" alt="Avatar" style="width:300px;height:300px;">
                        </div>
                        <div class="flip-card-back">
                            <h3>Admin information</h3>
                            <div class="user_data">
                                <h4>User Name : <?php echo $_SESSION['username']; ?></h4>
                                <h4>Name :<?php echo $_SESSION['name']; ?></h4>
                                <h4>User Role :<?php echo $_SESSION['role']; ?></h4>
                                <h4>Location : <?php echo $_SESSION['district']; ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <img src="../img/time_info.jpg" alt="Avatar" style="width:300px;height:300px;">
                        </div>
                        <div class="flip-card-back">
                            <div class="data_block">
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
                    </div>
                </div>
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <img src="../img/weather_info.jpg" alt="Avatar" style="width:300px;height:300px;">
                        </div>
                        <div class="flip-card-back">
                            <div style="padding-top: 100px;">
                                <di<h3>Weather Forcast</h3>
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
                        </div>
                    </div>
                </div>
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <img src="../img/date_info.jpg" alt="Avatar" style="width:300px;height:300px;">
                        </div>
                        <div class="flip-card-back">
                            <div class="data_block">
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
                    </div>
                </div>

            </div>
        </div>

    </body>
    <script src="../js/admin_main.js"></script>

    </html>
<?php
} else {
    header("Location:../index.php");
}
?>