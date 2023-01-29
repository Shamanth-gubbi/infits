<?php  
include("navbar.php");

    // include "config.php";
    $errors = array('date' => '') ;
    if ( isset ($_POST['submit'])){
        // value from session
    $dietitianuserID = $_SESSION['name'];
    $eventname = $_POST['subject'];

    $clientname = $_POST['clientname'];
    // echo $clientname ;
    $sql2 = "Select * from addclient WHERE name='$clientname'" ;
    $result2 = mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $clientuserid = $row2['client_id'];
    // echo $clientuserid ;

    $meeting_type = $_POST['meetingtype'];
    $place_of_meeting = $_POST['placeofmeeting'];
    $description = $_POST['description'];
    $attachment = "hello";

    $start_date = date('Y-m-d H:i:s', strtotime($_POST['startdate']));
    $end_date = date('Y-m-d H:i:s', strtotime($_POST['enddate']));
    $start_date_time = substr($start_date,-8);
    $start_date_date = substr($start_date,0,10);
   

    $count = 0;
    $sql = "Select * from create_event" ;
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){ 
        $date_start = $row['start_date'] ;
        $date_time_start = substr($date_start,-8);
        $date_date_start = substr($date_start,0,10);
        $date_end = $row['end_date'] ;
        $date_time_end = substr($date_end,-8);
        $date_date_end = substr($date_end,0,10);
        if ( $date_date_start == $start_date_date){
            if (($start_date_time > $date_time_start) && ($start_date_time < $date_time_end))
            {
                $date_time_start_onlytime = substr($date_time_start,0,5) ; 
        //    echo $date_time_start_onlytime ;
            $count ++;
            }
        }   
    }

    if ($count== 0)
    {
        $sql1 = "INSERT INTO create_event (dietitianuserID,eventname, clientuserid, meeting_type, start_date, end_date, place_of_meeting, description, attachment) VALUES ('$dietitianuserID','$eventname','$clientuserid','$meeting_type','$start_date','$end_date','$place_of_meeting','$description','$attachment')";
        $result1=mysqli_query($conn,$sql1);
        // header("Location: calendar_of_events.php");
        printf("<script>location.href='calendar_of_events.php'</script>");
    }
    else{
        echo '<div style="text-align:center;background: #FFFFFF;
        border: 1px solid #F1F1F1;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
        border-radius: 8px;margin-top:20px;width:30%;margin-left:45%">
        <p style="text-align:center; color:red;font-weight:bold;">Alert !!</p>
        <p>Appointment already booked !!</p>
        </div>' ;

    // printf("<script>location.href='createevent.php'</script>");
    }
  
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Create Event</title>
    <!-- <link rel="stylesheet" href="createevent.css" /> -->
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
    /* padding: 20px; */
}

.event-form {
    /* width: 50%; */
    /* padding: 2%; */
    margin-left: 15%;
    margin-right: 15%;
    /* background-color: palegoldenrod; */
}

.ev-img {
    display: flex;
    justify-content: center;
    align-items: center;
    /* width: 260px;
height: 190px; */
}

.event-image {
    width: 120px;
    height: 120px;
}

.event_title {
    font-size: 12px;
    font-weight: 800;
    /* margin-bottom: 15px; */
}

.eve_form {
    /* background-color: azure; */
    margin:0 auto;
    padding: 10px;
    font-size:12px !important;
    width: 70%;

}

.subject {
    display: block;
    /* font-size: 18px;
    font-weight: bold; */
    width: 100%;
}

.rem-item {
    background: #FFFFFF;
    border: 1px solid #4B9AFB;
    border-radius: 45px;
    padding: 5px;
    margin-top: 10px;
    font-size: 12px;
}

.rem_icon {
    color: #4B9AFB;
    margin-right: 15px;
}



.content-name {
    position: absolute;
    bottom: 5px;
    left: 0px;
    transition: all 0.3s ease;
}



.form_btn {
    width: 30%;
    border-color: #4B9AFB;
    border-radius: 10px;
    color: white;
    text-align: center;
    padding: 10px;
    margin-top: 30px;
}

.txt {
    width: 100%;
    /* margin-bottom: 10px; */
    /* margin-top: 15px; */
    cursor: pointer;
}

.txt p {
    padding-left: 15px;
}
.txt a {
    padding-left: 15px;
}

.txticon {
    padding: 10px;
}

.input-icons i {
    position: absolute;
}

.input-icons {
    width: 100%;
    margin-bottom: 10px;
    border: none;
}

.icon {
    padding: 10px;
    color: black;
    min-width: 50px;
}

.input-field {
    width: 100%;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 50px;
}

/* POPUP */

.pop-box .button {
    font-size: 15px;
    text-decoration: none;
    color: black;
    border: 1px solid black;
    border-radius: 20px;
    margin-top: 20px;
    padding: 10px 20px;
}

.bg-popContainer {
    display: none;
}

.pop-box {
    width: 100%;
    height: auto;
    background: #FFFFFF;
    border: 1px solid rgba(225, 225, 225, 0.66);
    box-shadow: 0px 11px 25px rgba(0, 0, 0, 0.1);
    padding: 20px;
    position: relative;
}

.cont {
    border-radius: 20px;
}

input {
    width: 50%;
    display: block;
    margin: 15px auto;
    padding: 5px;
}

.closer {
    position: absolute;
    top: 0;
    right: 14px;
    font-size: 30px;
    transform: rotate(45deg);
    cursor: pointer;
}

::placeholder {
    color: black;
    opacity: 1;
    /* Firefox */
}

:-ms-input-placeholder {
    /* Internet Explorer 10-11 */
    color: black;
}

::-ms-input-placeholder {
    /* Microsoft Edge */
    color: black;
}

/* MEDIA QUERY */


@media screen and (min-width: 720px) {

    /* Styles go here */
    .mobile-menu {
        display: none;
    }
}

@media (min-width: 0px) and (max-width: 720px) {


    .event-form {
        /* height: 100%; */
        margin-left: 0 !important;
        width: 100%;
        display: flex;
        /* justify-content: center; */
        justify-content: space-around;
        align-items: center;
        flex-direction: column;
    }

}

/* Appointment popup */
.modal {
    display: none !important;
    position: fixed !important;
    z-index: 1 !important;
    padding-top: 200px !important;
    left: 0 !important;
    top: 0 !important;
    width: 100% !important;
    height: 100% !important;
    overflow: auto !important;
    background-color: rgb(0, 0, 0) !important;
    background-color: rgba(0, 0, 0, 0.4) !important;
    /* opacity: 0.1 !important; */
}

.modal-content {
    background-color: #fefefe !important;

    margin: auto !important;
    padding: 20px !important;
    border: 1px solid #888 !important;
    width: 30% !important;
    border-radius: 7px !important;
}

/* close btn */
.close {
    color: #aaaaaa !important;
    float: right !important;
    font-size: 28px !important;
    font-weight: bold !important;
}

.close:hover,
.close:focus {
    background-color: red !important;
    padding: 5px 10px !important;
    color: white !important;
    text-decoration: none !important;
    cursor: pointer !important;
}

.alert-header {
    text-align: center;
    color: red;
    font-weight: bold;
}

.modal-content p {
    text-align: center;
    padding-top: 5px;
}
</style>

<body>

    <!-- Contents Start -->
    <div id="content">
        <div class="event-form">
            <div class="ev-img">
                <img class="event-image" src="images/event_image.svg" alt="">
            </div>
            

            <form action="#" method="post">
                <div class="eve_form">
                    <!-- Event name field -->
                    <label for="subject" class="event_title" style="margin-bttom:5px">EVENT NAME</label>
                    <select class="subject" type="text" name="subject" placeholder="Category" style="padding:10px 0px;background: #FFFFFF;
border: 1px solid #F1F1F1;
box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
border-radius: 8px;"
                        required>
                        <option value="Consultation">Consultation</option>
                        <option value="Dietplan">Diet Plan</option>
                        <option value="Followup">Follow Up</option>
                    </select>
                    <br>
                    <!-- Reminder types display -->
                    <!--***** Add an array to store these values -->
                    <div class="reminder">
                        <div class="event_title">REMINDER TYPE</div>
                        <div class="rem">
                            <div style="display: inline-block;" class="rem-item"><i
                                    class="fa-solid fa-suitcase rem_icon"></i>Consultation</div>
                            <div style="display: inline-block;" class="rem-item"><i
                                    class="fa-solid fa-apple-whole rem_icon"></i>Diet Plan</div>
                            <div style="display: inline-block;" class="rem-item"><i
                                    class="fa-solid fa-phone rem_icon"></i>Call
                            </div>
                            <div style="display: inline-block;" class="rem-item"><i
                                    class="fa-solid fa-add rem_icon"></i>Others
                            </div>
                        </div>
                    </div>
                    <br>

                    <!-- Main event details form -->
                    <div class=" event_title">EVENT DETAILS</div>

                    <div style="max-width:100%;margin:auto">

                        <!-- Add client fields -->
                        <div class="input-icons">
                            <i class="fa-solid fa-user icon">
                            </i>
                            <select style="border-bottom:1.8px solid #EFEFEF;border-top:none;border-left:none;border-right:none" name="clientname"
                                class="input-field" required>
                                <option value="" disabled selected>Add Client</option>
                                <?php
                                $id = $_SESSION['name'] ;
                                $query = "SELECT client_id,name FROM addclient WHERE dietitianuserID = '$id' ";
                                $result1=mysqli_query($conn,$query); 
                                while($row = mysqli_fetch_assoc($result1) ){ ?>
                                <option value="<?php echo $row['name']?>"><?php echo $row['name']?></option>
                                <?php
                                } 
                                ?>
                            </select>
                        </div>

                        <!-- Meeting type fields -->
                        <div class="input-icons">
                            <i class="fa-solid fa-suitcase icon">
                            </i>
                            <select style="border-bottom:1.8px solid #EFEFEF;border-top:none;border-left:none;border-right:none" name="meetingtype"
                                class="input-field" required>
                                <option value="" disabled selected>Meeting Type</option>
                                <option value="Videocall">Video Call</option>
                                <option value="Call">Call</option>
                                <option value="In person">In person</option>
                            </select>
                        </div>


                        <!-- Date and Time fields -->
                        <div class="txt button" style="border-bottom:1.8px solid #EFEFEF" id="button">
                            <i class="fa-solid fa-calendar-days txticon" style="display:inline-block">
                            </i>
                            <p style="display:inline-block">Date and Time</p>
                        </div>

                        <!-- Date and Time Pop up -->
                        <div id="bg_container" class="bg-popContainer">
                            <div class="pop-box">
                                <div id="close" class="closer">+</div>
                                <div>
                                    <p style="display:inline-block; margin-right:10px">Start Date</p>
                                    <input style="display:inline-block;" type="datetime-local" name="startdate"
                                        placeholder="StartDate" id="startdate" required>
                                </div>
                                <div>
                                    <p style="display:inline-block;margin-right:18px;">End Date</p>
                                    <input style="display:inline-block;" type="datetime-local" id="enddate"
                                        placeholder="EndDate" name="enddate" required>
                                </div>

                            </div>
                        </div>

                        <!-- Place of meeting field -->
                        <div class="input-icons">
                            <i class="fa-solid fa-location icon">
                            </i>
                            <input style="border-bottom:1.8px solid #EFEFEF;border-top:none;border-left:none;border-right:none" class="input-field"
                                type="text" placeholder="Place of meeting" name="placeofmeeting">
                        </div>

                        <!-- Add Description Field -->
                        <div class="input-icons">
                            <i class="fa-solid fa-bars icon">
                            </i>
                            <input style="border-bottom:1.8px solid #EFEFEF;border-top:none;border-left:none;border-right:none" class="input-field"
                                type="text" placeholder="Add Description" name="description" required>
                        </div>

                        <!-- Add attachment field -->
                        <div class="input-icons">
                            <i class="fa-solid fa-paperclip icon">
                            </i>
                            <input style="border-bottom:1.8px solid #EFEFEF;border-top:none;border-left:none;border-right:none" class="input-field"
                                type="text" placeholder="Attachment" name="attachment" required>
                        </div>
                    </div>

                    <div style="width:100%; margin-left:20%; margin-right:10%">
                        <a href="createevent.php"><input style="display:inline-block; color:black; background:white;"
                                class="form_btn" placeholder="Cancel"></input></a>
                        <button style="display:inline-block; background: #4B9AFB;" class="form_btn" name="submit"
                            type="submit">Book Appointment</button>
                    </div>
                </div>
        </div>
        </form>
    </div>
    </div>
    <!-- Contents End -->


    <!-- Appointment booked popup -->

    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="alert-header">ALERT</div>
            <!-- <span class="close">&times;</span> -->
            <?php
            // $date_time_start_onlytime = substr($date_time_start,-6) ;

            ?>
            <p>You already have <> with <> at <>
            </p>
        </div>
    </div>





</body>
<script>
// get elements by id

const popOutButton = document.getElementById("button")

const exitcontainer = document.getElementById("bg_container")
const bg_container = document.querySelector(".bg-popContainer")
// Add event listeners 

popOutButton.addEventListener("click", popOutNow);

function popOutNow(e) {
    e.preventDefault();

    document.querySelector(".bg-popContainer").style.display = "flex";

}


const cancelPop = document.getElementById("close");

cancelPop.addEventListener("click", CancelPopOut);

function CancelPopOut(e) {
    e.preventDefault();
    bg_container.style.display = "none";


}
</script>

</html>
