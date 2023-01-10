<!DOCTYPE HTML>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar menu With Sub-menus | Using HTML, CSS & JQuery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2">
</head>

<style>
    @import url('https://fonts.googleapis.com/earlyaccess/nats.css');
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap');

    body {
        margin: 0;
        /* width: 100vw;
        height: 100vh; */
    }

    .nav {
        height: 0px;
        background-color: black;
    }

    .nav-res {
        display: none;
    }

    .sidenav {
        min-width: 15vw;
        max-width: fit-content;
        height: 100vh;
        background-color: white;
        text-align: left;
        position: sticky;
        top: 0;
        float: left;
        display: flex;
        flex-direction: column;
        border-right: #E8ECF5 2px solid;
    }

    .sidenav .sidenavlink {
        color: #131635;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        font-family: 'Poppins', serif;
        text-decoration: none;
        margin-bottom: 2vh;
        margin-left: 43px;
        font-style: normal;
        font-weight: 500;
        font-size: 18px;
        margin-right: 30px;
    }

    .sidenav .menu-bottom {
        position: absolute;
        bottom: 40px;
        display: flex;
        flex-direction: column;
    }

    .sidenav .sidenavlink:hover {
        cursor: pointer;
    }

    #logo {
        height: auto;
        width: 174px;
        margin-left: 10px;
        margin-bottom: 3vh;
        margin-top: 2vh;
    }

    .sidenav .nav-icon {
        height: 16px;
        width: 16px;
        margin-right: 15px;
    }

    .tabcontent {
        color: white;
        display: none;
        padding: 40px 20px;
        height: 100%;
    }

    .topnav {
        position: relative;
        min-height: 10%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 1vh;
        border-bottom: #E8ECF5 2px solid;
    }

    .topnav .topnav-content p {
        margin: 0;
    }

    .topnav-content {
        margin-left: 30px;
        color: #8D8D8D;
        font-style: normal;
        font-family: 'Manrope', serif;
        font-weight: 700;
        display: flex;
        justify-content: center;
        flex-direction: column;
    }

    #topnav-content-1 {
        font-size: 20px;
        letter-spacing: 0.05em;
        margin-bottom: 5px;
    }

    #topnav-content-2 {
        letter-spacing: 1px;
        font-weight: 500;
        font-size: 15px;
    }

    .topnav-content #topnav-content-3 {
        font-family: 'Poppins';
        /* NATS */
        font-style: normal;
        font-weight: 400;
        font-size: 33px;
        color: #000000;
    }

    #topnav-content-1-name {
        color: #212121;
    }

    .topnav-icons {
        height: 100%;
        margin-right: 3vw;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .topnav-icons img {
        margin-left: 30px;
        justify-self: center;
    }

    a:hover,
    .active {
        align-items: center;
        border: 1px solid #E5F1FF;
        background-color: #E5F1FF;
        color: #0177FB !important;
        border-radius: 10px;
    }

    a {
        padding: 1px 2px 1px 3px;
        text-decoration: none;
    }

    .main {
        align-items: center;
        font-family: monospace;
        font-size: xx-large;
        font-weight: bold;
        margin-left: 25%;
        margin-top: -3%
    }

    .main img {
        height: 200px;
        width: 200px;
        margin-top: 5%;
        border: #000000;
    }

    .row button {
        background-color: white;
        border-radius: 10px;
        border: 1px solid #ccc;
        font-family: 'Times New Roman', Times, serif;
        font-size: small;
        height: 170px;
        width: 250px;
    }

    .row button:hover {
        box-shadow: 0 0 11px rgba(185, 130, 229);
        cursor: pointer;
    }

    .hold1 .hold2 img {
        margin-top: -135px;
    }

    .column {
        float: right;
        width: 28.33%;
        padding: 15px;
    }

    .row .column img {
        width: 120px;
        height: 120px;

    }

    .log button {
        height: 30px;
        width: 100px;
        margin-left: 70%;
        margin-top: 5%;
        color: white;
        background-color: red;
        border-radius: 10px;
        font-family: 'Times New Roman';
        font-size: medium;
    }


    .rotate_image {
        -webkit-transform: rotate(180deg);
        -moz-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        -o-transform: rotate(180deg);
        transform: rotate(180deg);
        /* transform: scaleX(-1); */
    }

    .rotate_tree {
        -webkit-transform: rotate(45deg);
        -moz-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        -o-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .flip_image {
        -webkit-transform: scaleX(-1);
        transform: scaleX(-1);
    }

    @media screen and (min-width: 720px) {

        /* Styles go here */
        .mobile-menu {
            display: none;
        }
    }

    @media (min-width: 0px) and (max-width: 720px) {
        .sidenav {
            display: none;
        }
    }

    /*--------------------- MOBILE SIDENAV---------------------*/
    /*HAMBURGER MENU*/
    .sidenavv {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #ffffff;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .sidenavv a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 20px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .sidenavv a:hover {
        border: 1px solid #E5F1FF;
        background-color: #E5F1FF;
        color: #0177FB !important;
        border-radius: 10px;
    }

    .sidenavv .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    .image-stack {
        Display: grid;
        Grid-template-columns: repeat(12, 1fr);
        Position: relative;
    }

    .m-2 {
        margin-top: 2%;
    }

    .main-title {
        font-family: 'Manrope';
        margin-top: 1%;
        font-weight: bold;
        font-size: larger;

    }

    .rgb-green {
        background-color: rgb(60, 216, 151) !important;
    }

    .w-99 {
        width: 99% !important;
    }

    .wrapper {
        display: inline-block;
        position: relative;
    }

    .big-img {
        width: 100%;
        max-width: 100%;
        /* border: 1px solid blue; */
    }

    .small-img {
        /* border: 1px solid red; */
        position: absolute;
    }
</style>

<body>
    <div class="nav">
        <div class="navcontent">
        </div>
    </div>

    <div class="nav-res" id="navbar-res">
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <img src="./icons/menu.png">
        </a>
        <a onclick="openPage('Home','nav-res', 'HOME')" class="active" id="defaultOpen"
            style="margin-top:10vh;">Dashboard</a>
        <a onclick="openPage('Key_Projects','nav-res','KEY PROJECTS')">Messages</a>
        <a onclick="openPage('Client','nav-res','CLIENT TESTIMONIAL')">Live</a>
        <a onclick="openPage('Careers','nav-res','CAREERS')">Mail</a>
        <a onclick="openPage('Contact','nav-res','CONTACT US')">Recipes</a>
        <a onclick="openPage('Careers','nav-res','CAREERS')">Appoinments</a>
        <a onclick="openPage('Contact','nav-res','CONTACT US')">Client List</a>
        <a>Settings</a>
        <a>Get Help</a>
        <a>Log Out</a>
    </div>

    <div class="sidenav" id="sidenavbar">
        <img src="images/logo.png" class="sidenavlink" id="logo">
        <a class="sidenavlink" onclick="openPage('Home','sidenav','HOME')" id="defaultOpen"><img
                src="images/vec_dashboard.png" class="nav-icon">Dashboard</a>
        <a class="sidenavlink" onclick="openPage('Key_Projects','sidenav','KEY PROJECTS')"><img
                src="images/vec_messages.png" class="nav-icon">Messages</a>
        <a class="sidenavlink" onclick="openPage('Client','sidenav','CLIENT TESTIMONIAL')"><img
                src="images/vec_live.png" class="nav-icon">Live</a>
        <a class="sidenavlink" onclick="openPage('Careers','sidenav','CAREERS')"><img src="images/vec_mail.png"
                class="nav-icon">Mail</a>
        <a class="sidenavlink" onclick="openPage('Contact','sidenav','CONTACT US')"><img src="images/vec_recipies.png"
                class="nav-icon">Recipies</a>
        <a class="sidenavlink" onclick="openPage('Contact','sidenav','CONTACT US')"><img
                src="images/vec_appointments.png" class="nav-icon">Appoinments</a>
        <a class="sidenavlink" onclick="openPage('Contact','sidenav','CONTACT US')"><img
                src="images/vec_client_list.png" class="nav-icon">Client List</a>
        <div class="menu-bottom">
            <a class="sidenavlink"><img src="images/vec_gethelp.png" class="nav-icon">Get Help</a>
            <a class="sidenavlink"><img src="images/vec_settings.png" class="nav-icon">Settings</a>
            <a href="logout.php" class="sidenavlink"><img src="images/vec_logout.png" class="nav-icon">Log Out</a>
        </div>
    </div>

    <div class="topnav">
        <div class="topnav-content" id="topnav-change">
            <p id="topnav-content-1">Good Morning, <span id="topnav-content-1-name">

                    </strong></p>

            </span></p>
            <p id="topnav-content-2">Your performance summary this week</p>
        </div>
        <div class="topnav-icons">
            <img src="images/pp.png" style="height: 24px; width: 24; display:none;" id="addusermale">

            <img src="images/vec_search.png" style="height: 20px; width: 20px;">
            <img src="images/vec_notification.png" style="height: 20px; width: 20px;">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <h3 class="main-title">Recipes</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <button class="w-99" style ="background-color:#56775b;">
                <div class="wrapper">
                    <span class="small-img"
                        style="z-index:1; font-family: 'Manrope'; font-size: larger; font-weight: bold; margin-left: -34%; margin-top: -30%;color: white;">All Recipe</span>
                    <span class="small-img"
                        style="z-index: 1; color: #ffffffec; font-family: 'Manrope'; font-size: smaller; font-weight: bold; margin-left: -50%; margin-top: -5%;">
                    Free menu planning <br> to suit your needs
                    </span>

                    <img class="rotate_image big-img" src="all_recipe_circle.svg"
                        style="height:100px;width:100px;margin-top:-70%;margin-left:4%; transform: scaleY(-1);">
                    <img class="small-img" src="all_recipe.svg"
                        style="height: 130px; width: 130px; margin-top: -100%; margin-left: -22%;">
                    <img class="small-img" src="all_recipe_arc.svg"
                        style="height:100px;width:100px;margin-top:-60%;margin-left:-109%">
                    <img class="small-img" src="all_recipe_icon.svg"
                        style="margin-top: -2%;margin-left: -114%; margin-right: 15%;height: 250%;">
                    <img class="small-img" src="all_recipe_circle.svg"
                        style="height: 73px;width: 104px;margin-top: -3%;margin-left:4%;">
                </div>
            </button>
        </div>
        <div class="col-sm-3">
            <button class="w-99" style="background-color:#e36267;">
                <div class="wrapper">
                    <span class="small-img"
                        style="z-index:1; font-family: 'Manrope'; font-size: larger; font-weight: bold; margin-left: -34%; margin-top: -30%;">All time fav</span>
                    <span class="small-img"
                        style="z-index: 1; color: #0505059c; font-family: 'Manrope'; font-size: smaller; font-weight: bold; margin-left: -50%; margin-top: -5%;">
                    Free menu planning <br> to suit your needs
                    </span>

                    <img class="rotate_image big-img" src="all_time_fav_circle.svg"
                        style="height:100px;width:100px;margin-top:-70%;margin-left:4%; transform: scaleY(-1);">
                    <img class="small-img" src="all_time_fav.svg"
                        style="height: 130px; width: 130px; margin-top: -100%; margin-left: -22%;">
                    <img class="small-img" src="all_time_fav_arc.svg"
                        style="height:100px;width:100px;margin-top:-60%;margin-left:-109%">
                    <img class="small-img" src="all_time_fav_icon.svg"
                        style="margin-top: -8%;; margin-left: -107%; margin-right: 15%;">
                    <img class="small-img" src="all_time_fav_circle.svg"
                        style="height: 73px;width: 104px;margin-top: -3%;margin-left:4%;">
                </div>
            </button>
            </div>

        <div class="col-sm-3">
            <button class="w-99" style="background-color:#6e9ec0de;">
                <div class="wrapper">
                    <span class="small-img"
                        style="z-index:1; font-family: 'Manrope'; font-size: larger; font-weight: bold; margin-left: -34%; margin-top: -30%;color:white">Recommended</span>
                    <span class="small-img"
                        style="z-index: 1; color: #ffffff9c; font-family: 'Manrope'; font-size: smaller; font-weight: bold; margin-left: -50%; margin-top: -5%;">
                    Free menu planning <br> to suit your needs
                    </span>

                    <img class="rotate_image big-img" src="recomend_circle.svg"
                        style="height:100px;width:100px;margin-top:-70%;margin-left:4%; transform: scaleY(-1);">
                    <img class="small-img" src="snack.svg"
                        style="height: 130px; width: 130px; margin-top: -100%; margin-left: -22%;">
                    <img class="small-img" src="recomend_arc.svg"
                        style="height:100px;width:100px;margin-top:-60%;margin-left:-109%">
                    <img class="small-img" src="recomend_icon.svg"
                        style="margin-top: -2%; margin-left: -107%;margin-right: 15%;height: 236%;">
                    <img class="small-img" src="recomend_circle.svg"
                        style="height: 73px;width: 104px;margin-top: -3%;margin-left:4%;">
                </div>
            </button>
        </div>
    </div>
    
    <div class="col-sm-12">
        <h3 class="main-title">&ensp;All Recipes</h3>
    </div>
        <div class="row">
            <div class="col-sm-4">
                <button>
                    <div class="level">
                        <img src="Rectangle 6272.png" style="height:40px;width:80px;background-color:rgb(255,255,255);margin-left:-70%;margin-top:0%;">
                        <img src="Medium.svg" style="height:13px;width:43px;margin-left:-27%;margin-top:0%;">
                    </div>

                    <img src="food.svg" style="margin-top:-5%;height:80px;width:140px;">
                    <div class="level">
                        <img src="Rectangle 6272.png" style="height:33px;width:73px;background-color:rgb(255,255,255);margin-left:71%;margin-top:-85%;">
                        <img src="clock.svg" style="height:8px;width:41px;margin-left:63%;margin-top:-102%;">
                        <img src="hands.svg" style="height:5px;width:30px;margin-left:64%;margin-top:-119%;">
                        <img src="20_00.svg" style="height:7px;width:30spx;margin-left:46%;margin-top:-134%;">
                    </div>

                    <p style="margin-top:-30%">Aloo Paratha</p>
                    <img src="cal.svg" style="height:20px;width:20px;margin-left:-80%;margin-top:-7%">
                    <p style="margin-top:-12%;margin-left:-48%">299 kcal</p>

                    <img src="round.svg" style="height:18px;width:18px;margin-left:50%;margin-top:-35%">
                    <img src="12 steps.svg" style="height:100px;width:50px;margin-left:67%;margin-top:-50%">

                </button>
            </div>

            <div class="col-sm-4" style = "margin-top:1%">
                <button>
                    <div class="level">
                        <img src="Rectangle 6272.png" style="height:40px;width:80px;background-color:rgb(255,255,255);margin-left:-70%;margin-top:0%;">
                        <img src="Medium.svg" style="height:13px;width:43px;margin-left:-27%;margin-top:0%;">
                    </div>

                    <img src="food.svg" style="margin-top:-5%;height:80px;width:140px;">
                    <div class="level">
                        <img src="Rectangle 6272.png" style="height:33px;width:73px;background-color:rgb(255,255,255);margin-left:71%;margin-top:-85%;">
                        <img src="clock.svg" style="height:8px;width:41px;margin-left:63%;margin-top:-102%;">
                        <img src="hands.svg" style="height:5px;width:30px;margin-left:64%;margin-top:-119%;">
                        <img src="20_00.svg" style="height:7px;width:30spx;margin-left:46%;margin-top:-134%;">
                    </div>

                    <p style="margin-top:-30%">Aloo Paratha</p>
                    <img src="cal.svg" style="height:20px;width:20px;margin-left:-80%;margin-top:-7%">
                    <p style="margin-top:-12%;margin-left:-48%">299 kcal</p>

                    <img src="round.svg" style="height:18px;width:18px;margin-left:50%;margin-top:-35%">
                    <img src="12 steps.svg" style="height:100px;width:50px;margin-left:67%;margin-top:-50%">

                </button>
            </div>

            <div class="col-sm-4">
                <button>
                    <div class="level">
                        <img src="Rectangle 6272.png" style="height:40px;width:80px;background-color:rgb(255,255,255);margin-left:-70%;margin-top:0%;">
                        <img src="Medium.svg" style="height:13px;width:43px;margin-left:-27%;margin-top:0%;">
                    </div>

                    <img src="food.svg" style="margin-top:-5%;height:80px;width:140px;">
                    <div class="level">
                        <img src="Rectangle 6272.png" style="height:33px;width:73px;background-color:rgb(255,255,255);margin-left:71%;margin-top:-85%;">
                        <img src="clock.svg" style="height:8px;width:41px;margin-left:63%;margin-top:-102%;">
                        <img src="hands.svg" style="height:5px;width:30px;margin-left:64%;margin-top:-119%;">
                        <img src="20_00.svg" style="height:7px;width:30spx;margin-left:46%;margin-top:-134%;">
                    </div>

                    <p style="margin-top:-30%">Aloo Paratha</p>
                    <img src="cal.svg" style="height:20px;width:20px;margin-left:-80%;margin-top:-7%">
                    <p style="margin-top:-12%;margin-left:-48%">299 kcal</p>

                    <img src="round.svg" style="height:18px;width:18px;margin-left:50%;margin-top:-35%">
                    <img src="12 steps.svg" style="height:100px;width:50px;margin-left:67%;margin-top:-50%">

                </button>
            </div>
        </div>
</body>

</html>