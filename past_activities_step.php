<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Past Activities Step</title>

    <!-- <link rel="stylesheet" href="css/past_activities_step.css"> -->

    <style>
        #content {
            overflow: auto;
            height: 90%;
            font-family: "Poppins";
            font-style: normal;
            padding: 10px;
            margin: 0px;
        }

        @media only screen and (max-width: 480px) {
            #content {
                padding: 0;
            }
        }

        #content .first-box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap !important;
            padding: 20px 50px 0px 20px;
        }

        @media only screen and (max-width: 680px) {
            #content .first-box {
                flex-direction: column;
                gap: 20px;
                align-items: flex-start;
            }

            #content .first-box .title-box {
                width: 100%;
            }
        }

        @media only screen and (max-width: 480px) {
            #content .first-box {
                padding-right: 0;
            }

            #content .first-box .title-box {
                width: 100%;
            }
        }

        #content .first-box .title-box h1 {
            font-size: 2rem;
        }

        #content .first-box .title-box .filter-box {
            margin-top: 20px;
        }

        @media only screen and (max-width: 680px) {
            #content .first-box .title-box .filter-box {
                width: 100%;
            }
        }

        #content .first-box .title-box .filter-box button {
            border: none;
            background-color: transparent;
            border-radius: 0;
            width: 80px;
            padding: 5px 10px;
        }

        @media only screen and (max-width: 680px) {
            #content .first-box .title-box .filter-box button {
                width: 24% !important;
                font-size: 10px !important;
                margin: 0 !important;
            }

            #content .first-box .title-box .filter-box button:first-child {
                padding: 0;
                padding: 5px 0 !important;
            }

            #content .first-box .title-box .filter-box button:first-child img {
                height: 10px !important;
                width: 10px !important;
                margin: 0 !important;
            }
        }

        @media only screen and (max-width: 480px) {
            #content .first-box .title-box .filter-box button {
                font-size: 10px !important;
            }

            #content .first-box .title-box .filter-box button:first-child {
                padding: 5px 0 !important;
            }

            #content .first-box .title-box .filter-box button:first-child img {
                height: 10px !important;
                width: 10px !important;
            }
        }

        #content .first-box .title-box .filter-box button:first-child {
            border-radius: 13.1385px 0px 0px 13.1385px;
            width: -webkit-fit-content;
            width: -moz-fit-content;
            width: fit-content;
            padding: 5px 20px;
        }

        #content .first-box .title-box .filter-box button:first-child img {
            height: 15px;
            width: 15px;
            margin-left: 5px;
        }

        #content .first-box .title-box .filter-box button:last-child {
            border-radius: 0px 13.1385px 13.1385px 0px;
        }

        #content .first-box .title-box .filter-box button.active {
            background-color: #FF8B8B;
            color: #ffffff !important;
        }

        #content .activity-containers {
            padding: 20px 50px 0px 30px;
            margin: 20px 0px;
        }

        #content .activity-containers h4 {
            font-size: 1.4rem;
        }

        #content .activity-containers .activities-box {
            display: flex;
            gap: 25px;
            flex-wrap: wrap;
            padding-left: 20px;
            padding-top: 10px;
        }

        #content .activity-containers .activities-box .activities {
            background: linear-gradient(180deg, rgba(255, 224, 209, 0.2) 0%, rgba(255, 139, 139, 0.2) 100%);
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-radius: 10px;
            padding: 0 10px;
        }

        #content .activity-containers .activities-box .activities .details {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #content .activity-containers .activities-box .activities .details img {
            margin-right: 20px;
        }

        #content .activity-containers .activities-box .activities .details .para-box p {
            line-height: 12px;
            margin-top: 15px;
        }

        #content .activity-containers .activities-box .activities .details .para-box p.activity-name {
            font-size: 25px;
        }

        #content .activity-containers .activities-box .activities .details .para-box p.time {
            font-size: 17px;
        }

        #content .activity-containers .activities-box .activities .distance {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 10px;
        }

        #content .activity-containers .activities-box .activities .distance img {
            height: 20px;
            width: 20px;
            margin-right: 10px;
        }

        #content .activity-containers .activities-box .activities .distance p.value {
            font-size: 1.1rem;
            margin-top: 15px;
        }
    </style>
</head>

<body>

    <?php include 'navbar.php' ?>


    <div id="content">
        <div class="first-box">
            <div class="title-box">
                <h1>Past Activities</h1>
                <div class="filter-box">
                    <button class="filter-btn" onclick="showActivities(0);">Custom Dates <img
                            src="assets/icons/Vector (1).svg"></button>
                    <button class="filter-btn" onclick="showActivities(1);">Year</button>
                    <button class="filter-btn" onclick="showActivities(2);">Month</button>
                    <button class="filter-btn" onclick="showActivities(3);">Week</button>
                </div>
            </div>
            <img src="images/Group 1000004735.svg" alt="Steps">
        </div>

        <div class="activities-wrapper">
            <!-- custom date -->
        </div>

        <div class="activities-wrapper">
            <!-- Year -->
        </div>

        <div class="activities-wrapper">
            <!-- Month -->
        </div>

        <div class="activities-wrapper">

            <?php for ($i = 0; $i < 3; $i++) { ?>
                <div class="activity-containers">
                    <h4>19 Jun 2021</h4>
                    <div class="activities-box">

                        <?php for ($j = 0; $j < 6; $j++) { ?>

                            <div class="activities">
                                <div class="details">
                                    <img src="icons/Vector.svg">
                                    <div class="para-box">
                                        <p class="activity-name">Running</p>
                                        <p class="time">11:10 a.m</p>
                                    </div>
                                </div>
                                <div class="distance">
                                    <img src="icons/Frame.svg">
                                    <p class="value">9070 m</p>
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                </div>
            <?php } ?>

        </div>

    </div>


    <script>
        let btns = document.getElementsByClassName("filter-btn");
        let activitiesWrapper = document.getElementsByClassName("activities-wrapper");

        // console.table(activitiesWrapper);

        for (let index in activitiesWrapper) {
            if (index == 0) {
                activitiesWrapper[index].style.display = "block";
                btns[index].classList.add("active");

            } else {
                activitiesWrapper[index].style.display = "none";
            }
        }

        function showActivities(index) {
            if (index == 0) {
                for (let i = 0; i < btns.length; i++) {
                    // btns[index].classList.add("active");

                    if (i == index) {
                        btns[i].classList.add("active")
                        activitiesWrapper[i].style.display = "block";
                    } else {
                        btns[i].classList.remove("active");
                        activitiesWrapper[i].style.display = "none";
                    }
                }
                // contentShow.style.display = "none";

            }
            else if (index == 1) {
                for (let i = 0; i < btns.length; i++) {

                    if (i == index) {
                        btns[i].classList.add("active")
                        activitiesWrapper[i].style.display = "block";
                    } else {
                        btns[i].classList.remove("active");
                        activitiesWrapper[i].style.display = "none";
                    }
                }
            }
            else if (index == 2) {
                for (let i = 0; i < btns.length; i++) {

                    if (i == index) {
                        btns[i].classList.add("active")
                        activitiesWrapper[i].style.display = "block";
                    } else {
                        btns[i].classList.remove("active");
                        activitiesWrapper[i].style.display = "none";
                    }
                }
            }
            else if (index == 3) {
                for (let i = 0; i < btns.length; i++) {

                    if (i == index) {
                        btns[i].classList.add("active")
                        activitiesWrapper[i].style.display = "block";
                    } else {
                        btns[i].classList.remove("active");
                        activitiesWrapper[i].style.display = "none";
                    }
                }

                document.getElementById("activities-wrapper").style.display = "block";

            }


        }
    </script>
</body>

</html>