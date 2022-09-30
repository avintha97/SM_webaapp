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
        <link href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.9.0/css/ol.css" rel="stylesheet" />
        <link href='https://iclient.supermap.io/dist/ol/iclient-ol.min.css' rel='stylesheet' />
        <!-- <link rel="stylesheet" href="../css/user/signal_issues.css"> -->
        <link rel="stylesheet" href="../lyr_switcher/ol-layerswitcher-master/dist/ol-layerswitcher.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                
                font-size: 15px;
                
                padding: 0px;
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
                margin: auto;
                text-align: center;
                font-family: arial;
            }

            .price {
                color: grey;
                font-size: 22px;
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

            /*flex*/
            .flex-container {
                display: flex;
                flex-direction: row;
                font-size: 30px;
                text-align: center;
            }

            .flex-item-left {
                background-color: #f1f1f1;
                padding: 10px;
                flex: 50%;
            }

            .flex-item-right {
                background-color: #f1f1f1;
                padding: 10px;
                flex: 50%;
            }

           
            @media (max-width: 800px) {
                .flex-container {
                    flex-direction: column;
                }
            }

            /*avatar*/
            .avatar {
                vertical-align: middle;
                width: 75px;
                height: 75px;
                border-radius: 50%;
            }

            /*logout_button*/
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

            #map {
                height: 100vh;
                width: 100%;
                background-size: cover;
            }

            .toolset {
                position: absolute;
                top: 60px;
                left: 225px;
                z-index: 1000;
                justify-content: space-evenly;

            }

            .panel {
                display: flex;
                justify-content: space-evenly;
            }

            .panel {
                display: flex;
                justify-content: space-evenly;
            }

            .panel button {
                padding: 5px;
                margin: 3px;
                padding: 3px;
                cursor: pointer;
                height: 30px;
                width: 30px;
                border-radius: 50%;
                background-color: rgb(230, 230, 230);


            }


            .panel button {
                padding: 5px;
                margin: 3px;
                padding: 3px;
                cursor: pointer;

            }
            .legend {
                position: relative;
                left: 950px;
                top: 450px;
                background-color: white;
                padding: 10px;
                opacity: 0.8;
            }

            .dot_low {
                height: 10px;
                width: 10px;
                background-color: green;
                border-radius: 50%;
                display: inline-block;
               

            }

            .dot_middle {
                height: 10px;
                width: 10px;
                background-color: yellow;
                border-radius: 50%;
                display: inline-block;

            }

            .dot_high {
                height: 10px;
                width: 10px;
                background-color: red;
                border-radius: 50%;
                display: inline-block;

            }
        </style>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.9.0/build/ol.js"></script>
        <script type="text/javascript" src="https://iclient.supermap.io/dist/ol/iclient-ol.min.js"></script>
        <script src="../lyr_switcher/ol-layerswitcher-master/dist/ol-layerswitcher.js"></script>
        
        <title> Signal Issues</title>
    </head>

    <body>

        <div class="sidenav">
            <div style="padding-left:25%;"><img src="../img/user_info.jpg" alt="user_info" class="avatar">
                <span class="" id="uname" style="color:white"><?php echo $_SESSION['username']; ?></span>
                <span id="district_value" style="color:white"><?php echo $_SESSION['district']; ?></span>
            </div>

            <a href="home.php" style="padding-top: 50px;"><i class="fa fa-tachometer" style="padding-right: 15px;"></i>Dashboard</a>

            <a href="power_cut.php"><i class="fas fa-user" style="padding-right: 15px;"></i>Powercut isues</a>
            <a href="signal_issue.php"><i class="fas fa-power-off" style="padding-right: 15px;"></i>Signal Isues</a>
            <a href="uni_area.php"><i class="fas fa-university" style="padding-right: 15px;"></i>university Area</a>
        </div>

        <div class="navbar">

            <div class="dropdown">
                <button class="dropbtn">Profile
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <div style="padding-left: 40%;"><img src="../img/user_info.jpg" alt="Avatar" class="avatar"></div>
                    <a href="../logout.php"> <button class="block">Logout</button></a>

                </div>
            </div>
        </div>
        <div class="main">

            <div id="map">

            </div>
            <div class="toolset">
                <div class="panel">
                    <button type="button" id="distance" onclick="mesuredistance()">

                        <span> <i class="fa fa-compass" aria-hidden="true"></i></span>
                    </button>
                    <div class="panel">
                        <button type="button" id="area" onclick="mesurearea()">

                            <span> <i class="fa fa-window-close" aria-hidden="true"></i></span>
                        </button>
                        <div class="panel">
                            <button type="button" id="clear" onclick="cleardraw()">

                                <span> <i class="fa fa-trash" aria-hidden="true"></i></span>
                            </button>
                            <div class="panel">
                                <button type="button" id="fullscreen" onclick="fullview()">

                                    <span> <i class="fa fa-arrows-alt" aria-hidden="true"></i></span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="legend">
                        <h2>legend</h2>
                        <h3><span id="low" class="dot_low"></span>low condition</h3>
                        <h3><span id="mid" class="dot_middle"></span>middle condition</h3>
                        <h3><span id="high" class="dot_high"></span>high condition</h3>
                    </div>


                </div>



                <script src="../js/user/signal_issue.js"></script>
                <script src="../js/common.js"></script>
    </body>

    </html>
<?php
} else {
    header("Location:../index.php");
}
?>