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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.9.0/css/ol.css" rel="stylesheet" />
        <link href='https://iclient.supermap.io/dist/ol/iclient-ol.min.css' rel='stylesheet' />
        <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.9.0/build/ol.js"></script>
        <script type="text/javascript" src="https://iclient.supermap.io/dist/ol/iclient-ol.min.js"></script>
        <link rel="stylesheet" href="../css/admin/admin_powercut.css">
        <title>Power Cuts</title>
    </head>

    <body>
        <div class="container">
            <nav>
                <ul>
                    <li><a href="" class="logo">
                            <img src="../img/logo.jpg" alt="">
                            <span class=""><?php echo $_SESSION['username']; ?></span>
                        </a></li>
                    <li><a href="home.php">
                            <i class="fas fa-user"></i>
                            <span class="nav-item">Dashboard</span>
                        </a></li>
                    <li><a href="admin_power_cut.php">
                            <i class="fas fa-power-off"></i>
                            <span class="nav-item">Today Power Cut</span>
                        </a></li>
                    <li><a href="admin_signal_issues.php">
                            <i class="fas fa-wifi"></i>
                            <span class="nav-item">Today Signal Issues</span>
                        </a></li>
                    <li><a href="uni_area.php">
                            <i class="fas fa-university"></i>
                            <span class="nav-item">University Area</span>
                        </a></li>
                    <li><a href="../logout.php" class="logout">
                            <i class="fas fa-sign-out"></i>
                            <span class="nav-item">LOG OUT</span>
                        </a></li>
                </ul>
            </nav>
            <section class="main">

                <div class="top">
                    <h1>Today Power Cuts</h1>




                    <i class="fas fa-user-cog"></i>
                </div>

                <div class="body">
                    <div id="map">

                    </div>
                    <div>
                        <div class="toolset">


                            <div class="panel">

                                <button type="button" id="distance" onclick="mesuredistance()">

                                    <span> <i class="fa fa-compass" aria-hidden="true"></i></span>
                                </button>



                                <button type="button" id="area" onclick="mesurearea()">

                                    <span> <i class="fa fa-window-close" aria-hidden="true"></i></span>
                                </button>


                                <button type="button" id="clear" onclick="cleardraw()">

                                    <span> <i class="fa fa-trash" aria-hidden="true"></i></span>
                                </button>


                                <button type="button" id="fullscreen" onclick="fullview()">

                                    <span> <i class="fa fa-arrows-alt" aria-hidden="true"></i></span>
                                </button>

                            </div>
                            <br>
                            <div class="query">
                                <label for="">Choose Power Cut Area :</label>
                                <select name="" class="powercut_area" id="" onclick="query(this.value)">
                                    <option value="1">A</option>
                                    <option value="2">B</option>
                                    <option value="3">C</option>
                                    <option value="4">D</option>
                                    <option value="5">E</option>
                                </select>
                            </div>
                            <div class="display_std">
                            <label for="">Visible Students :</label>
                            <select name="" class="powercut_area" id="" onclick="query(this.value)">
                                    <option value="1">A</option>
                                    <option value="2">B</option>
                                    <option value="3">C</option>
                                    <option value="4">D</option>
                                    <option value="5">E</option>
                                </select>
                            </div>



            </section>
        </div>




        <script src="../js/user/power_cut.js"></script>
        <script src="../js/common.js"></script>
    </body>

    </html>
<?php
} else {
    header("Location:../index.php");
}
?>