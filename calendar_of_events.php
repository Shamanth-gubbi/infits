<?php
    include("navbar.php")
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS for full calender -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />
    <!-- JS for jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- JS for full calender -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <!-- bootstrap css and js -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Event Calendar</title>
</head>
<style>
html {
    overflow-x: hidden;
}

#content {
    display: flex;
    flex-direction: column;
    height: 90%;
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 500;
    /* font-size: 35px; */
    padding-left: 20px;
    padding-top: 10px
}

.container-main {
    /* background-color: #2E4272; */
    display: flex;
    font-size: 13px !important;
}

.fixed {
    /* background-color: #4F628E; */
    width: 80%;
}

.flex-item {
    /* background-color: #7887AB; */
    flex-grow: 1;
}

.row {
    width: 100% !important;
    height: 100% !important;
}

.fc table {
    border-collapse: collapse !important;
}

.fc-event {
    background-color: #EFF8FF !important;
    color: #7A78FD !important;
    border: 1px solid #7A78FD !important;
    border-radius: 6px;
    padding-top: 20px !important;
}


.fc-title {
    font-weight: bold !important;
    font-size: 10px;
}

.fc-today {
    background-color: inherit !important;
}

.fc-today-button {
    width: auto !important;
    height: auto !important;
    background: #EFEFEF !important;
    border-radius: 5px !important;
    padding: 5px !important;
}

.fc-next-button {
    color: #4B9AFB !important;
}

.fc-prev-button {
    color: #4B9AFB !important;
}

.fc-time-grid .fc-slats td {
    height: 1.5em;
    border-bottom: hidden !important;
}

table {
    border: 2px solid white !important;
    /* height:400px !important; */
}

.fc-left h2 {
    font-size: 15px !important;
}

.wrapper {
    /* background: #fff;
  border-radius: 10px;
  box-shadow: 0 15px 40px rgba(0,0,0,0.12); */
}

.wrapper header {
    display: flex;
    /* align-items: center; */
    padding-left: 40px;
    /* display :none; */
    justify-content: space-between;
}

header .icons {
    display: flex;
}

header .icons span {
    height: 38px;
    width: 38px;
    margin: 0 1px;
    cursor: pointer;
    color: #878787;
    /* text-align: center; */
    line-height: 38px;
    font-size: 15px;
    user-select: none;
    border-radius: 50%;
}

.icons span:last-child {
    /* margin-right: -10px; */
}

header .icons span:hover {
    background: #f2f2f2;
}

header .current-date {
    font-size: 15px;
    font-weight: 500;
}

.calendar-side {
    /* padding: 20px; */
}

.calendar-side li {
    padding: 0;
}

.calendar-side ul {
    display: flex;
    flex-wrap: wrap;
    list-style: none;
    text-align: center;
}

.calendar-side .days li {
    margin-top: 10px !important;

}

.calendar-side .days {
    margin-bottom: 20px;
}

.calendar-side li {
    color: #333;
    width: calc(100% / 7);
    font-size: 10px;
}

.calendar-side .weeks li {
    font-weight: 500;
    cursor: default;
}

.calendar-side .days li {
    z-index: 1;
    cursor: pointer;
    position: relative;
    margin-top: 30px;
}

.days li.inactive {
    color: #aaa;
}

.days li.active {
    color: #fff;
}

.days li::before {
    position: absolute;
    content: "";
    left: 50%;
    top: 50%;
    height: 40px;
    width: 40px;
    z-index: -1;
    border-radius: 50%;
    transform: translate(-50%, -50%);
}

.days li.active::before {
    color: white !important;
}

.days li:not(.active):hover::before {
    background: #f2f2f2;
}

.prev .next {
    cursor: pointer;
}

.flex-item {
    border-left: 2px solid #E8ECF5;
}

.schedule {
    margin-left: 15px;
}

a:hover {
    text-decoration: none;
    color: #CBC3E3 !important;
}

/* .fc-day-header span{
    color:red !important;
} */

.fc-axis {
    color: #AAAAAA !important;
}

/* Side Calendar */
</style>

<body>
    <!-- Contents Start -->
    <div id="content">
        <div class="container-main">
            <div class="fixed">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <h5 style="display:inline-block;">Calendar</h5>
                                <a href="createevent.php" class="event_btn" style="display:inline-block; float:right;background: #7A78FD;
            border-radius: 7px;border: none; color: white; padding:10px">+ Create Schedule</a>
                            </div>
                            <br>
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-item">
                <div class="wrapper">
                    <div class="calendar-side">
                        <header>
                            <p class="current-date"></p>
                            <div class="icons">
                                <span id="prev" class="material-symbols-rounded"> <i
                                        class="fa-solid fa-chevron-left"></i></span>
                                <span id="next" class="material-symbols-rounded"><i
                                        class="fa-solid fa-chevron-right"></i></span>
                            </div>

                        </header>
                        <ul class="weeks">
                            <li>Sun</li>
                            <li>Mon</li>
                            <li>Tue</li>
                            <li>Wed</li>
                            <li>Thu</li>
                            <li>Fri</li>
                            <li>Sat</li>
                        </ul>
                        <ul class="days"></ul>
                    </div>
                </div>
                <!-- Todays Schedule -->
                <div class="schedule">
                    <p style="font-weight:bold;">Todays Schedule</p>
                    <?php
                    date_default_timezone_set("Asia/Kolkata");
                    $now = date("m/d/Y") ;
                    echo date("F j", strtotime($now));
?>
                    <br><br>
                    <div>
                        <?php

                $id = $_SESSION['name'] ;
                // echo gettype($id) ;
                $sql = "SELECT * FROM create_event WHERE `dietitianuserID`='$id'";  
                $result=mysqli_query($conn,$sql); 
                $row = mysqli_fetch_assoc($result) ;     

                while($row = mysqli_fetch_assoc($result)){ 
                    $s = $row['start_date'];
                    $dt = new DateTime($s);
                    $date = $dt->format('m/d/Y');
                    $clientid = $row['clientuserid'];
                $sql1 = "SELECT client_id,name FROM addclient WHERE client_id=$clientid";
                $result1=mysqli_query($conn,$sql1); 
                $row1 = mysqli_fetch_assoc($result1) ;
                $name = $row1['name'] ;

                $startdate = $row['start_date'];
                $newstartdate = date('h:i A', strtotime($startdate));
                $enddate = $row['end_date'];
                $newenddate = date('h:i A', strtotime($enddate));

                    if ($date == $now){
                    ?>
                        <div class="schedule-card">

                            <div class="schedule-card-title"><?php echo $row['eventname'] ?></div>
                            <div></div>
                            <div class="schedule-card-name" style="margin-top:15px">
                                <div
                                    style="display:inline-block;background-color:#528aae;margin-right:10px;border-radius:50%;width:20px;height:20px;color:white;text-align:center;">
                                    <i class="fa-solid fa-user-tie"></i>
                                </div>
                                <div style="display:inline-block"><?php 
                            echo $name ; 
                            ?></div>
                            </div>
                            <div class="schedule-card-place" style="margin-top:15px">

                                <div
                                    style="display:inline-block;background-color:#528aae;margin-right:10px;border-radius:50%;width:20px;height:20px;color:white;text-align:center;">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div style="display:inline-block"><?php echo $row['place_of_meeting'] ?></div>
                            </div>
                            <div style="margin-top:15px;color:#4B9AFB">
                                <?php echo $newstartdate ?> -
                                <?php echo $newenddate ?>

                            </div>
                        </div>
                        <?php
                }}?>



                    </div>
                </div>
                <style>
                .schedule-card {
                    background: #EFF8FF;
                    border-radius: 21px;
                    width: 90%;
                    padding: 15px;
                    margin-bottom: 20px;
                }

                .schedule-card-title {
                    font-weight: 600;
                    font-size: 18px;
                    color: #3C82D7;
                }

                .fc-prev-button {
                    color: #4B9AFB !important;
                    background-color: #EFEFEF !important;
                }

                .fc-next-button {
                    color: #4B9AFB !important;
                    background-color: #EFEFEF !important;
                }

                .fc-today-button {
                    padding-left: 20px !important;
                    padding-right: 20px !important;
                    text-transform: capitalize !important;
                    color: black !important;
                    font-weight: bold !important;
                    background-color: #EFEFEF !important;

                }

                .fc-agendaWeek-button {
                    background: #EFEFEF !important;
                    border-radius: 5px !important;
                }
                </style>
            </div>
        </div>
    </div>
    <!-- Contents end -->
</body>
<script>
$(document).ready(function() {
    display_events();
}); //end document.ready block
function display_events() {
    var events = new Array();
    $.ajax({
        url: 'display_event.php',
        dataType: 'json',
        success: function(response) {
            var result = response.data;
            $.each(result, function(i, item) {
                events.push({
                    event_id: result[i].eventID,
                    title: result[i].eventname,
                    start: result[i].start_date,
                    end: result[i].end_date,
                });
            })
            var calendar = $('#calendar').fullCalendar({
                defaultView: 'agendaWeek',
                // displayEventTime : false,
                timeZone: 'local',
                allDaySlot: false,
                //  plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
                header: {
                    left: 'prev , today next ',
                    // center: 'title',
                    right: 'agendaWeek, month ,agendaDay'
                },

                // { year: 'numeric', month: 'long' },

                editable: false,
                selectable: true,
                selectHelper: true,
                events: events,
                eventRender: function(event, element, view) {
                    element.bind('click', function() {
                        // $(element).tooltip({title: event.title});
                    });
                }
            }); //end fullCalendar block    
        }, //end success block
        error: function(xhr, status) {
            alert(response.msg);
        }
    }); //end ajax block    
}

const daysTag = document.querySelector(".days"),
    currentDate = document.querySelector(".current-date"),
    prevNextIcon = document.querySelectorAll(".icons span");
// getting new date, current year and month
let date = new Date(),
    currYear = date.getFullYear(),
    currMonth = date.getMonth();
// storing full name of all months in array
const months = ["January", "February", "March", "April", "May", "June", "July",
    "August", "September", "October", "November", "December"
];
const renderCalendar = () => {
    let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(), // getting first day of month
        lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(), // getting last date of month
        lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(), // getting last day of month
        lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); // getting last date of previous month
    let liTag = "";
    for (let i = firstDayofMonth; i > 0; i--) { // creating li of previous month last days
        liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
    }
    for (let i = 1; i <= lastDateofMonth; i++) { // creating li of all days of current month
        // adding active class to li if the current day, month, and year matched
        let isToday = i === date.getDate() && currMonth === new Date().getMonth() &&
            currYear === new Date().getFullYear() ? "active" : "";
        liTag += `<li class="${isToday}">${i}</li>`;
    }
    for (let i = lastDayofMonth; i < 6; i++) { // creating li of next month first days
        liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`
    }
    currentDate.innerText = `${months[currMonth]} ${currYear}`; // passing current mon and yr as currentDate text
    daysTag.innerHTML = liTag;
}
renderCalendar();
prevNextIcon.forEach(icon => { // getting prev and next icons
    icon.addEventListener("click", () => { // adding click event on both icons
        // if clicked icon is previous icon then decrement current month by 1 else increment it by 1
        currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;
        if (currMonth < 0 || currMonth > 11) { // if current month is less than 0 or greater than 11
            // creating a new date of current year & month and pass it as date value
            date = new Date(currYear, currMonth);
            currYear = date.getFullYear(); // updating current year with new date year
            currMonth = date.getMonth(); // updating current month with new date month
        } else {
            date = new Date(); // pass the current date as date value
        }
        renderCalendar(); // calling renderCalendar function
    });
});
</script>

</html>
