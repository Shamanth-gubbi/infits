<!DOCTYPE HTML>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar menu With Sub-menus | Using HTML, CSS & JQuery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2">
    <link rel="stylesheet" href="assets/styles/style.css">
</head>

<style>
    #content {
        padding: 10px 30px;
    }

    #content .heading {
        font-size: 1.8rem;
    }

    #content .flex-container,
    #content .flex-container .card-box,
    #content .flex-container div {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #content .flex-container {
        /* background-color: #0177FB; */
        height: 550px;
        width: 100%;
    }

    #content .flex-container .card-box {
        /* background-color: #0177FB; */
        justify-content: space-between;
        height: 300px;
        width: 500px;
    }

    #content .flex-container .card-box div {
        background-color: #ffffff;
        justify-content: space-between;
        flex-direction: column;
        height: 200px;
        width: 200px;
        box-shadow: 0 5px 15px 0 rgba(0, 0, 0, .25);
        padding: 20px 10px 10px 10px;
        color: #0177FB;
        font-weight: 600;
        border-radius: 15px;
    }

    #content .flex-container .card-box div p {
        font-size: 1.4rem;
    }

    #content .quote-box,
    #content .quote-box .quote-container {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #content .quote-box .quote-container {
        height: 100px;
        width: 80%;
        background-color: #FFF0D3;
    }

    #content .quote-box .quote-container h2 {
        position: relative;
        font-family: Julius Sans One;
    }

    #content .quote-box .quote-container h2::before {
        content: "";
        position: absolute;
        background-image: url("assets/icons/quote1.svg");
        top: -10px;
        left: -50px;
        height: 40px;
        width: 40px;
        background-size: contain;
        background-repeat: no-repeat;
    }

    #content .quote-box .quote-container h2::after {
        content: "";
        position: absolute;
        background-image: url("assets/icons/quote2.svg");
        top: -10px;
        right: -50px;
        height: 40px;
        width: 40px;
        background-size: contain;
        background-repeat: no-repeat;
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
</style>



<body>

    <?php include("event_calendar.php"); ?>

    <div id="content">
        <h1 class="heading">Clients </h1>
        <div class="flex-container">
            <div class="card-box">
                <div class="add-client">
                    <img src="assets/icons/add-client.svg" alt="Add Client">
                    <p>Add Client</p>
                </div>
                <div class="client-list">
                    <img src="assets/icons/client-Lists.svg" alt="Client List">
                    <p>Client List</p>
                </div>
            </div>
        </div>
        <div class="quote-box">
            <div class="quote-container">
                <!-- <span><img src="assets" alt=""></span> -->
                <h2>NEVER GIVE UP! GREAT THINGS TAKE TIME</h2>

            </div>
        </div>
    </div>




    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <script>
        function openPage(pageName, elmnt, name) {
            // Hide all elements with class="tabcontent" by default */
            var i, tabcontent;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            if (tabcontent.display == "none") {
                elmnt = "nav-res";
            }
            // Show the specific tab content
            document.getElementById(pageName).style.display = "block";
            if (pageName == "Errorpage") {
                document.getElementById(pageName).style.display = "flex";
            }
            if (elmnt == "nav-res") {
                var topnav = document.getElementById("navbar-res");
                var i;
                topnav.className = "nav-res";
            }
            show = document.getElementById("show");
            show.innerHTML = name;
            callaos();
            document.documentElement.scrollTop = 0;
            document.body.scrollTop = 0;
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();

        /* Toggle between adding and removing the "responsive" class to sidenav when the user clicks on the icon */
        function myFunction() {
            var x = document.getElementById("navbar-res");
            if (x.className === "nav-res") {
                x.className += " responsive";
            } else {
                x.className = "nav-res";
            }
        }
    </script>
</body>

</html>