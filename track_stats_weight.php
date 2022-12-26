<?php  include('config.php');?>

    if($conn->connect_error){
        die("Connection failed :" . $conn->connect_error);
    }
    
    $query="INSERT INTO goals (forWhat, goal, clientID) VALUES ('weight' , $goal, '$client' )";
    $result = $conn->query($query) or die("Query Failed");
    
    if($result){
        unset($_POST["savegoal"]);
        unset($_POST["setgoal"]);
        header(("Location:". $_SERVER['PHP_SELF'] .""));
        // exit();
    }
}
// funtion to fetch
// This can be more Simple by String Concatination
function fetchDataSql($clientId,$from_date, $to_date, $isCustom=0){
    // Connect to Database
    $conn = new mysqli("localhost", "root", "", "infits");
    if($conn->connect_error){
        die("Connection failed :" . $conn->connect_error);
    }
    if($isCustom==1){
        $query="SELECT avg(weight) FROM `weighttracker` WHERE clientID= '$clientId' AND date <= '$to_date'";

    }else if($isCustom==2){
        $query = "SELECT avg(weight) FROM `weighttracker` WHERE clientID= '$clientId' AND date = '$to_date'";

    }else if($isCustom==3){
        $query="SELECT avg(weight) FROM `weighttracker` WHERE clientID= '$clientId' AND date BETWEEN '$from_date' AND '$to_date'";

    }else if($isCustom==5){

        $query = "SELECT * FROM `weighttracker` WHERE clientID= '$clientId' AND date BETWEEN '$from_date' AND '$to_date'";
    }

    $result = $conn->query($query) or die("Query Failed");
    $data = array();
    while($row = $result->fetch_assoc()){
        $data[] =  $row;
    }
    $conn->close();
    return ($data);
}
if(isset($_POST['from_date']) AND isset($_POST['to_date'])){
    $CustomData = array(
        'value' => array(),
        'date' => array(),
        'range' => "",
    );
    $CustomDay_1 = new DateTime($_POST['from_date']);
    $CustomDay_2 = new DateTime($_POST['to_date']);
    $CustomData['range'] =  $CustomDay_1->format('d M Y') ." - ". $CustomDay_2->format('d M Y') ;
    
    while ($CustomDay_2 >= $CustomDay_1) {
        $CustomDataValue = (int) fetchDataSql($clientId,$CustomDay_1->format('Y-m-d'), $CustomDay_1->format('Y-m-d'),2)[0]['avg(weight)'];
    
        array_push($CustomData['value'], $CustomDataValue);
        array_push($CustomData['date'], $CustomDay_1->format('d'));
        $CustomDay_1->modify("+1 day");
    } 
    $CustomData = json_encode($CustomData);
    // return $CustomData;
    header('Content-Type: application/json');
    echo ($CustomData);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    
</head>
<?php include('navbar.php') ?>
<style>

.content{
    padding: 10px 20px;
    display: flex;
    flex-direction: column;
}
tst-left-t{
    padding-left: 3%;
}
.heading{
    width: 145px;
    height: 68px;

}
.heading p{
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 32px;
    line-height: 68px;
    /* letter-spacing: -0.114286px; */
    color: #000000;
    margin: 0;
}
.card-container{
    display: flex;
    flex-wrap: wrap;
    /* justify-content: space-between; */
    gap: 5%;
    padding-left: 1%;
}
.client-card {
width: 100px;
height: 120px;
background: rgba(255, 255, 255, 0.8);
box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.15);
border-radius: 10px;
display: flex;
flex-direction: column;
align-items: center;
justify-content: center;
text-align: center;
gap: 15px;
margin-bottom: 15px;
}
.client-card a{
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.client-card-weight{
    background: linear-gradient(38.98deg, #768B93 7.65%, #8FC4C3 87.93%);
}
.client-card i{
    scale: 1.5;
}
.client-card a img {
    height: 30px;
    width: auto;
}
.client-card p{
font-family: 'NATS';
font-style: normal;
font-weight: 400;
line-height: 1;
font-size: 19px;
    margin: 0;
}

/* tst-left b */
.tst-left-b {
    display: flex;
    flex-direction: column;
    padding: 20px;
    gap: 20px;
}
/* Style the buttons that are used to open the tab content */
.tab {
background-color: #f1f1f1;
border: 1px solid #F8F5F5;
max-width: 365px;
width: 100%;
height: 27px;
border-top-left-radius: 1em;
border-bottom-left-radius: 1em;
border-top-right-radius: 1em;
border-bottom-right-radius: 1em;
position: relative;
}
.tablinks {
background: #FFFFFF;
border: 1px solid #FCFBFB;
border-radius: 0px;
width: 24%;
height: 24px;
float: left;
border: none;
outline: none;
cursor: pointer;
transition: 0.3s;
font-family: 'NATS';
font-style: normal;
font-weight: 400;
font-size: 13px;
line-height: 27px;

color: #4D4D4D;
}
/* border for side buttons */
.graph_button_left{
    border-top-left-radius: 1em;
border-bottom-left-radius: 1em;
width: 28%;
}
.drop{
    position: absolute;
    color: #4D4D4D;
    top: 5px;
    left: 80px;
    margin-left: 8px;
    cursor: pointer;
    
}
#daterange{
    border: none;
    background: transparent;
    height: 0px;
    width: 0px;
    z-index: -1;
    position: absolute;
    left: 71px;
    top: 20px;
}
.graph_button_right{
    border-top-right-radius: 1em;
border-bottom-right-radius: 1em;
}
/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #9CD1D0;
}
.tab button.active {
  background-color: #9CD1D0;
  color: white !important;
}
.graph {
    max-width: 487px;
    max-height: 240px;
    width: 100%;
    height: 100%;
    background: #FFFFFF;
    border: 1px solid #F1F1F1;
    box-shadow: 0px 5px 4px rgba(0, 0, 0, 0.16);
    border-radius: 11px;
    padding: 10px;
}
.tab_content{
    position: relative;
    display: none;
    width: 100%;
    height: 100%;
}
.tab_content canvas{
    width: 100%;
    height: 100%;
}
.i-button {
    position: absolute;
    top: -4%;
    right: -12%;
    cursor: pointer;
}
.i-pop {
    background: #ffffff;
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 25px;
    line-height: 27px;
    position: absolute;
    /* right: -62%; */
    /* top: 10%; */
    right: -12%;
    top: 12%;
    box-shadow: 0px 1.74334px 13.0751px rgb(0 0 0 / 25%);
    border: 1px solid #EFEFEF;
    padding: 10px 15px;
    width: 500px;
    text-align: center;
    border-radius: 15px;
    display: none;
    transition: 2s ease-in-out;
}

/* Goal Dialog */
.tst-right {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    margin: 25px 0;
}
.set-goal {
    width: 100%;
    height: 100%;
    max-width: 380px;
    max-height: 450px;
    /* background: #FFFFFF; */
    border: 1px solid #EFEFEF;
    background: url('./images/goal-bg.svg');
    background-repeat: no-repeat;
    background-position: inherit;
    box-shadow: 0px 1.74334px 13.0751px rgba(0, 0, 0, 0.25);
    border-radius: 13.0751px;
    position: relative;
    padding: 10px;
    display: flex;
    gap: 20px;
    flex-direction: column;
    /* justify-content: center; */
    align-items: center;
}
.set-goal .heading{
    position: relative;
    padding-left: 10px;
    width: 100%;
    display: flex;
    justify-content: flex-start;
    flex-direction: column;
}
#g-set-success {
    position: absolute;
    top: 40px;
    right: 15px;
    font-size: 20px;
    letter-spacing: 2px;
}
.set-goal img{
width: 211px;
height: 166px;
}
.set-goal span {
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 23px;
    line-height: 40px;
    color: #788F97;
    margin-top: -10px;
}
.set-goal form{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.set-goal input{
width: 163px;
height: 45px;
border: 1px solid #DFDFDF;
box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.08);
border-radius: 10px;
padding: 8px 25px;
}
.set-goal input::placeholder{
font-family: 'Nunito';
font-style: normal;
font-weight: 700;
font-size: 18px;
line-height: 25px;
color: #ABA3A3;
text-align: center;
}
#save-goal {
    margin-top: 20px;
    border: none;
    width: 124px;
    height: 45px;
    background: linear-gradient(263.28deg, #8EC2C1 0%, #8CBFBE 0.01%, #788F97 93.31%);;
    box-shadow: 0px 3.48718px 3.48718px rgba(0, 0, 0, 0.28);
    border-radius: 10px;
    color: #ffffff;
    font-size: 19px;
    font-family: 'Nunito';
    font-style: normal;
    font-weight: 700;
}
/* page down */
.tsd-left-t {
    padding: 25px 0 25px 10px;
}
.stats-btn-container{
    width: 100%;
    display: flex;
    flex-wrap:wrap;
    justify-content: flex-start;
    align-items: center;
    padding :0 10px;
}
.stat-btn{
    /* max-width: 134px;
    max-height: 57.45px; */
    height: 57.45px;
    /* width: 25%; */
    width: 134px;
    /* height: 100%; */
    background: #FFFFFF;
    border: 1px solid #F1F1F1;
    box-shadow: 0px 3px 4px rgba(0, 0, 0, 0.08);
    border-radius: 16px;
    padding: 5px;
    display: flex;
    align-items: center;
    margin: 10px;
    
}
.stat-data{
    width: 100%;
    height: 100%;
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
}
.stat-data .title{
font-size: 18px;
line-height: 0;
color: #5D5D5D;
margin: 0 15px;
}
.stat-data .value{
font-size: 25px;
line-height: 0;
text-align: center;
color: #000000;
margin-left: 15px;
}
.stat-data .unit{
font-size: 17px;
line-height: 0;
color: #6B6B6B;
margin-left: 5px;
}
/* Table Activity */
.tsd-left-b{
    padding-left: 30px;
}
.tsd-left-b .heading {
    width: 100%;
    max-width: 549px;
    padding: 5px 10px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.tsd-left-b .heading p{
    font-size: 25px;
    line-height: 53px;
}
.tsd-left-b .heading span{
    font-size: 13px;
    font-weight: bold;
    color: #A4A4A4;    
}
.heading-border{
    margin-top: -10px;
    width: 100%;
    max-width: 549px;
    height: 2px;
    background-color: #F5F5F5;
}
.activity-container{
    width: 100%;
    max-width: 549px;
    margin-top: 15px;
}
.activity-box{
    margin: 5px;
    width: 100%;
    display: flex;
    align-items: center;
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    line-height: 0;
}
.activity-date {
    display: flex;
    flex-direction: column;
    width: 17%;
    justify-content: flex-end;
    align-items: center;
}
.activity-box .up{
    font-size: 20px;
    line-height: 10px;
    letter-spacing: 0.03em;
    color: #87A9AC;
}
.activity-box .down{
    font-size: 23px;
    line-height: 49px;
    /* identical to box height */
    letter-spacing: 0.03em;
    color: #000000;
}
.activity-border{
    height: 50px;
    width: 5px;
    background-color: #87A9AC;
    margin: 0 20px;
}
.activity-data{
    display: flex;
    flex-direction: column;
    width: 55%;
    align-items: center;
}
.activity-time{
    font-size: 19px;
    line-height: 40px;
    letter-spacing: 0.03em;
    color: #000000;
    opacity: 0.44;
    display: flex;
    justify-content: flex-start;
    align-items: flex-start;
    height: 70px;
}
/* progress bar */
.tsd-right{
        display: flex;
        flex-direction: column;
        /* justify-content: center; */
        align-items: center;
    }
    .tsd-right .heading {
        width: 100%;
        display: flex;
        justify-content: center;
        gap: 30%;
        padding-right: 5%;
    }
    .tsd-right .heading p{
        font-size: 22px;
        line-height: 46px;
        color: #000000;
    }
    .tsd-right .heading span{
        font-size: 16px;
        line-height: 46px;
        color: #7E969E;
    }
.progress-bar-container{
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    color: #000000;
    position: relative;
}
.progress-circle{
    width: 240px;
    height: 240px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    /* background: conic-gradient(#F9E0E7 50% , #E68AA1 0); */
}
.progress-circle-fill {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    background: #fff;
}
.progress-circle-value{
    width: 200px;
    height: 200px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
.progress-circle-value span{
    font-size: 20px;
    line-height: 35px;
}
#progress-percent{
    font-size: 48px;
    line-height: 50px;
}

.progress-box {
    width: 355px;
    height: 140px;
    padding: 5px 30px;
    margin-top: 30px;
    display: flex;
    flex-direction: column;
    align-items: center;
    /* justify-content: center; */
    /* width: 80%; */
    background: #FFFFFF;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
    border-radius: 10px;
}
.progress-box p{
    font-family: 'NATS';
    font-style: normal;
    font-weight: 400;
    font-size: 22px;
    margin-bottom: 0;
}
.progress-details {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
}
.progress-details p {
    font-size: 19px;
}
.progress-details span {
    font-family: 'NATS';
    font-style: normal;
    font-weight: bolder;
    font-size: 24px;
}

.progress-div {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
/* -------------------- */

/* media */
@media (max-width:420px) {
    .tst-left-b {
    padding: 20px;
    }
    .tsd-left-t {
    padding-left: 0;
    }
    .tsd-left-b {
    padding-left: 0;
    }
    .tsd-right {
    scale: 0.8;
    }
    .progress-bar-container {
    scale: 0.8;
    }
}
</style>
<body>
<div class="content">
    <div class="row ts-top">

        <div class="col-lg-8 tst-left">

            <div class="tst-left-t">
                <div class="heading">
                    <p>Clients Stats</p>
                </div>
                <div class="card-container">
                <div class="client-card" style="color:#FF6C6CCA ;border: 1px solid #FF6C6CCA;">
                        <a href="track_stats_steps.php">
                            <i class="fa-solid fa-shoe-prints" style="color:#FF6C6CCA; rotate: -90deg;"></i>
                            <p style="color: #FF6C6CCA;">Step</p>
                        </a>
                        </div>
                        <div class="client-card" style="color:#E266A9; border: 1px solid #E266A9;">
                        <a href="track_stats_heart.php">
                            <i style="color:#E266A9;" class="fa-solid fa-heart-pulse"></i>
                            <p style="color:#E266A9;">Heart Rate</p>
                            </a>
                        </div>
                        <div class="client-card" style="color:#52A4FF; border: 1px solid #52A4FF;">
                        <a href="track_stats_water.php">
                            <i style="color:#52A4FF;" class="fa-solid fa-droplet"></i>
                            <p style="color:#52A4FF;">Water</p>
                            </a>
                        </div>
                        <div class="client-card client-card-weight" style="color:#7D5DE6; border: 1px solid #7D5DE6;">
                        <a href="track_stats_weight.php">
                            <img src="images/weight_selected.svg" alt="">
                            <p style="color:#FFFFFF;">Weight Track</p>
                            </a>
                        </div>
                        <div class="client-card" style="color:#54AFAC; border: 1px solid #54AFAC;">
                        <a href="track_stats_sleep.php">
                            <i style="color:#54AFAC;" class="fa-solid fa-moon"></i>
                            <p style="color:#54AFAC;">Sleep</p>
                            </a>
                        </div>
                        <div class="client-card" style="color:#E3738D; border: 1px solid #E3738D;">
                        <a href="track_stats_calorie.php">
                            <i style="color:#E3738D;" class="fa-solid fa-stopwatch-20"></i>
                            <p style="color: #E3738D;">Calorie Track</p>
                            </a>
                        </div>
                </div>
            </div>

                <?php 
            //weight fragment
	// $userID = $_POST['userID'];
	$userID = "Azarudeen";
	
	$stmnt = $conn -> prepare("SELECT AVG(weight) FROM weighttracker WHERE WEEKOFYEAR(cast(weighttracker.date as DATE) )=WEEKOFYEAR(NOW()) AND clientid=?");
	
	$stmnt-> bind_param("s",$userID);
	$stmnt-> execute();
	$stmnt-> bind_result($Sum);
	
	$products = array();
	
	while($stmnt->fetch()){
	  $temp = array();
	  
	  $temp['SumWeek']= $Sum;
	   
	  array_push($products,$temp);
	}

	$stmnt = $conn -> prepare("SELECT AVG(weight) FROM weighttracker WHERE YEAR(cast(weighttracker.date as DATE)) = YEAR(NOW()) AND MONTH(cast(weighttracker.date as DATE))=MONTH(NOW()) AND clientid=?");
	
	$stmnt-> bind_param("s",$userID);
	$stmnt-> execute();
	$stmnt-> bind_result($Sum);
	
	while($stmnt->fetch()){
	  $temp = array();
	  
	  $temp['SumMonth']= $Sum;
	   
	  array_push($products,$temp);
	}

	$stmnt = $conn -> prepare("SELECT AVG(weight) FROM weighttracker WHERE cast(weighttracker.date as DATE)=CURRENT_DATE AND clientid=?");
	
	$stmnt-> bind_param("s",$userID);
	$stmnt-> execute();
	$stmnt-> bind_result($Sum);
	
	while($stmnt->fetch()){
	  $temp = array();
	  
	  $temp['SumDaily']= $Sum;
	   
	  array_push($products,$temp);
	}

	$stmnt = $conn -> prepare("SELECT AVG(weight) FROM weighttracker WHERE clientid=?");
	
	$stmnt-> bind_param("s",$userID);
	$stmnt-> execute();
	$stmnt-> bind_result($Sum);
	
	while($stmnt->fetch()){
	  $temp = array();
	  
	  $temp['SumTotal']= $Sum;
	   
	  array_push($products,$temp);
	}

    if(count($products)>-1){
    // echo json_encode($products);
    }

    else {
    echo "failure";
    }
    $dailyCount = array_column($products, 'SumDaily');
    $weeklyCount = array_column($products, 'SumWeek');
    $monthlyCount = array_column($products, 'SumMonth');
    $totalCount = array_column($products, 'SumTotal');
    

    //month graph
        $from = date("Y-m-d", strtotime("first day of this month"));
    $to = date("Y-m-d", strtotime("last day of this month"));

    // $clientID = $_POST['userID'];

    $sql = "select weight,date from weighttracker where clientID = '$userID' and date between '$from' and '$to';";

    $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($connection));

        $emparray = array();
        while($row =mysqli_fetch_assoc($result))
        {
            $emparray['date'] = date("d",strtotime($row['date']));
            $emparray['weight'] = $row['weight'];
            $full[] = $emparray;
        }
        // echo json_encode(['weight' => $full]);
        $dateArrM = array_column($full, 'date');
        $weightArrM = array_column($full, 'weight');
        
    
           for($i=0;$i<count($dateArrM);$i++){
            // $dateArrM[$i] = $dateArrM[$i]-'0';
            $weightArrM[$i] = $weightArrM[$i]-'0';
            }

    //week graph
    ?>
                                        <div class="tab">
                                           <button class="tablinks graph_button_left " onclick="openCity(event, 'London')">Custom Dates</button>
                                           <button class="tablinks" onclick="openCity(event, 'Year')">Year</button>
                                           <button class="tablinks" onclick="openCity(event, 'Month')">Month</button>
                                           <button class="tablinks graph_button_side" class="tab_button_side" onclick="openCity(event, 'Week')">Week</button>
                                        </div>
                <div class="graph">
                                           
                                <?php 

                                       //month graph
                                                                        // if ($_POST['option'] == 'Week') {
                                        $from = date('Y-m-d', strtotime("-1 week"));

                                        $to = date('Y-m-d');

                                        // $clientID = $_POST['userID'];

                                        $clientID = "Azarudeen";

                                        $sql = "select weight,date from weighttracker where clientID = '$clientID' and date between '$from' and '$to';";

                                        $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($connection));

                                            $emparray = array();
                                            while($row =mysqli_fetch_assoc($result))
                                            {
                                                $emparray['weight'] = $row['weight'];
                                                $emparray['date'] = date("d",strtotime($row['date']));
                                                $full[] = $emparray;
                                            }
                                            // echo json_encode(['weight' => $full]);
                                        // }

                                        // if ($_POST['option'] == 'Month') {
                                        
                                        // }
                                    $monthlydata = array_column($full, 'weight');
                                    $monthlydate = array_column($full, 'date');
                                    for ($i=0; $i < count($monthlydata); $i++) { 
                                        $monthlydata[$i] = $monthlydata[$i]-'0';
                                    }
                                   

                                    //year graph
                                    function getArr($from,$to){
                                        $server="localhost";
                                        $username="root";
                                        $password="";
                                        $database = "infits1";  
                                        
                                        $conn=mysqli_connect($server,$username,$password,$database);
                                        
                                        if ($conn->connect_error) {
                                          die("Connection failed: " . $conn->connect_error);
                                        }
                                            
                                        $sql = "select weight,date from weighttracker where clientID = 'Azarudeen' and date between '$from' and '$to';";
                                        
                                            $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($connection));
                                            
                                                $emparray = array();
                                                $mon = array();
                                                while($row =mysqli_fetch_assoc($result))
                                                {
                                                    $emparray['weight'] = $row['weight'];
                                                    $full[] = $emparray;
                                                    $mon[] = $row['weight'];
                                                }
                                                
                                                $sig = 0;
                                                for ($i=0; $i < count($mon) ; $i++) { 
                                                    $sig = $sig + $mon[$i];
                                                }
                                                return $sig/count($mon);
                                        }
                                        $from = array("2022-01-01","2022-02-01","2022-03-01","2022-04-01","2022-05-01","2022-06-01","2022-07-01","2022-08-01","2022-09-01","2022-10-01","2022-11-01","2022-12-01");
                                        $to = array("2022-01-31","2022-02-28","2022-03-31","2022-04-30","2022-05-31","2022-06-30","2022-07-31","2022-08-30","2022-09-31","2022-10-30","2022-11-31","2022-12-30");
                                        
                                            $avgArr = array();
                                            for ($i=0; $i < 12 ; $i++) { 
                                                $avgArr['av'] = getArr($from[$i],$to[$i]);
                                                $avgJson[] = $avgArr;
                                            }
                                            // echo json_encode($avgJson);
                                            $yearlydata = array_column($avgJson, 'av');
                                            for ($i=0; $i < count($yearlydata); $i++) { 
                                                $yearlydata[$i] = $yearlydata[$i]-'0';
                                            }
                                            // echo json_encode($yearlydata);

                                    //week graph
                                        // if ($_POST['option'] == 'Week') {
                                    $from = date("Y-m-d", strtotime("first day of this month"));
                                    $to = date("Y-m-d", strtotime("last day of this month"));

                                    // $clientID = $_POST['userID'];

                                    // $sql = "select weight,date from weighttracker where clientID = '$clientID' and date between '$from' and '$to';";

                                    // $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($connection));

                                    //     $emparray = array();
                                    //     while($row =mysqli_fetch_assoc($result))
                                    //     {
                                    //         $emparray['date'] = date("d",strtotime($row['date']));
                                    //         $emparray['weight'] = $row['weight'];
                                    //         $full[] = $emparray;
                                    //     }
                                    //     echo json_encode(['weight' => $full]);
                                ?>      
               
                                           <!-- Tab content -->
                                <div id="London" id="defaultOpen"class="tabcontent">
                                
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                                <canvas id="myChartwater"></canvas>
                                </div>

                                <div id="Year" class="tabcontent">
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                                <canvas id="myChartYearly"></canvas>
                                </div>

                                <div id="Month" class="tabcontent">
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                                <canvas id="myChartMonthly"></canvas>
                                </div>
                                
                                <div id="Week" class="tabcontent">
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                                <canvas id="myChartWeekly"></canvas>
                                </div>
                                       <script>
                                            function openCity(evt, cityName) {
                                                /* Declare all variables */
                                                var i, tabcontent, tablinks;
                    
                                                /* // Get all elements with class="tabcontent" and hide them */
                                                tabcontent = document.getElementsByClassName("tabcontent");
                                                for (i = 0; i < tabcontent.length; i++) {
                                                    tabcontent[i].style.display = "none";
                                                }
                    
                                                /* // Get all elements with class="tablinks" and remove the class "active" */
                                                tablinks = document.getElementsByClassName("tablinks");
                                                for (i = 0; i < tablinks.length; i++) {
                                                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                                                }
                    
                                                /* // Show the current tab, and add an "active" class to the button that opened the tab */
                                                document.getElementById(cityName).style.display = "block";
                                                evt.currentTarget.className += " active";
                                            }
                    
                                            /* // Get the element with id="defaultOpen" and click on it */
                                            document.getElementById("defaultOpen").click();
                                       </script> 
                               </div>
                </div>
            </div>
            <div id="inner2">
                        <?php
                        // $userID = $_POST['userID'];
                        // $date = $_POST['date'];
                        // $weight = $_POST['weight'];
                        // $height = $_POST['height'];
                        // $bmi = $_POST['bmi'];
                        // $goal = $_POST['goal'];
                        $userID="Azarudeen";
                        $date = date('Y-m-d', strtotime('1 days'));
                        $weight = 70;
                        $height = 170;
                        $bmi = 24;
                        
                        // $goal = $_POST["weightgoal"];
                        $goal = 60;
                        $sql = "select weight from weighttracker where clientID='$userID' and date = '$date'";
                        
                        $result = mysqli_query($conn, $sql);
                        
                        if(mysqli_num_rows($result) == 0){
                        $sql = "insert into weighttracker values('$date',$height,$weight,$bmi,$goal,'$userID')";
                        if (mysqli_query($conn,$sql)) {
                            $sql = "update client set height='$height',weight = '$weight' where clientuserID = '$userID'";
                            mysqli_query($conn,$sql);
                            echo "updated";
                        }
                        else{
                            echo "error";
                        }
                        }
                        else{
                            $sql = "update weighttracker set height='$height',weight = '$weight',goal = '$goal',bmi = '$bmi' where date = '$date' and clientID = '$userID'";
                            if (mysqli_query($conn,$sql)) {
                                $sql = "update client set height='$height',weight = '$weight' where clientuserID = '$userID'";
                                mysqli_query($conn,$sql);
                                echo "updated";
                            }
                            else{
                                echo "error";
                            }   
                        }
                        ?>
                <div class="inner21">
                    <div class="inner21-title">
                        Set Goals
                    </div>
                    <div class="inner21-image">
                        <img src="images/obesity.svg" alt="">
                    </div>
                    <div class="box-title">Daily Steps</div>
                    <form action="">
                    <div class="box-counter">
                    Goal:<input type="number" id="setgoalweight" name="weightgoal">
                    </div>
                    <buttpn class="box-btn"><input type="submit" name="submit" value="Submit"></buttpn>
                    </form>
                    
                    
                </div>
            </div>
        </div>


$allDataSum = fetchDataSql($clientId, '', $today->format('Y-m-d'), 1)[0]['avg(weight)'];
$todayData = fetchDataSql($clientId, "", $today->format('Y-m-d'),2)[0]['avg(weight)'];
$pastWeek =new DateTime();
$pastWeek->modify('-1 week');
$weekAvg = fetchDataSql($clientId,$pastWeek->format('Y-m-d'), $today->format('Y-m-d'),3)[0]['avg(weight)'];
$pastMonth = new DateTime();
$pastMonth->modify('-1 month');
$monthAvg = fetchDataSql($clientId,$pastMonth->format('Y-m-d'), $today->format('Y-m-d'),3)[0]['avg(weight)'];
?>
    <div class="row ts-down">
        <div class="col-lg-8 tsd-left">
            <div class="tsd-left-t">
                <div class="stats-btn-container">
                    
                <div class="flex-container-bottom">
                            <div class="bottom-stats-btn">
                                <div class="heart_info">
                                    <span>Daily Count</span>
                                    <span><span><?php echo json_encode((int) $dailyCount[0]-'0');?></span> Kgs</span>
                                </div>
                                
                            </div>

                            <div class="bottom-stats-btn">
                                <div class="heart_info">
                                    <span>Weekly Avg</span>
                                    <span><span><?php echo json_encode((int) $weeklyCount[0]-'0');?></span> Kgs</span>
                                </div>
                                
                            </div>
                    
                      
                      
                            <div class="bottom-stats-btn">
                                <div class="heart_info">
                                <span>Monthly Avg</span>
                                <span><span><?php echo json_encode((int) $monthlyCount[0]-'0');?></span> Kgs</span>
                                </div>
                                
                            </div>

                            <div class="bottom-stats-btn">
                                <div class="heart_info">
                                <span>Total</span>
                                <span><span><?php echo json_encode((int) $totalCount[0]-'0');?></span> Kgs</span>
                                </div>
                               
                            </div>
                    </div>
                           
                </div>
                <div class="row">
                    <div class="col-sm-12">
                    <div class="table">
                        <div class="table_top">
                     <span>Past Activity</span>
                      </div>
                     <?php
                     $a=1;
                     
                    while ($a <= 4) {
                        
                     echo ' <div class="table_element">';
                     echo '<div class="date">';
                     echo '<span>Sep</span>';
                     echo ' <p>18</p>';
                     echo '</div>';
                     echo '<div class="table_activity">';
                     echo '<span>Sep</span>';
                     echo '<p>18</p>';
                     echo ' </div>';
                     echo '<div class="table_time">';
                     echo '   <span>9:10 AM</span>';
                     echo ' </div>';
                     echo '</div>';
                     
                     $a++;
                    }
                     
                    
                     ?>
                      </div> 

                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                    <div class="pheader">
						<h4>Daily Progress</h4>
						<p>View Activity</p>
					</div>
                <div class="cpb">
                    <div role="progressbar" style="--value:<?php $value = 50; echo $value; ?>"></div>
                </div>
                <div class="cpb_bottom">
                        <div class="cpb_bottom_header">Your Progress</div>
                        <div class="cpb_bottom_content">
                            <div class="weight_today">
                                <span>Progress Today</span>
                                <span>19-07-2022</span>
                                <h4>-.07 kg</h4>
                            </div>
                            <div class="weight_week_ago">
                                <div class="weight_today">
                                    <span>Progress Today</span>
                                    <span>19-07-2022</span>
                                    <h4>-.07 kg</h4>
                                </div>
                            </div>
                        </div>
            <div class="activity_pop">
                
                <?php
                   
                ?>
                <img src="images/exit.svg" alt="">
                    <div class="pop_header">
                        <span>Activity</span>
                    </div>
                    <div class="pop_box">
                       <img src="images/man_running.svg" alt="">
                        <div class="pop_box_info">
                            <span>Running</span>
                            <p> m</p>
                        </div>
                        <div class="pop_box_info">
                        <span>Running</span>
                            <p>m</p>
                        </div>
                    </div>
                    <div class="pop_box">
                    <img src="images/man_running.svg" alt="">
                        <div class="pop_box_info">
                            <span>Running</span>
                            <p> m</p>
                        </div>
                        <div class="pop_box_info">
                        <span>Running</span>
                            <p> m</p>
                        </div>
                    </div>
                    <div class="pop_box">
                    <img src="images/man_running.svg" alt="">
                        <div class="pop_box_info">
                            <span>Running</span>
                            <p> m</p>
                        </div>
                        <div class="pop_box_info">
                        <span>Running</span>
                            <p> m</p>
                        </div>
                    </div>
                    <div class="pop_box">
                    <img src="images/man_running.svg" alt="">
                        <div class="pop_box_info">
                            <span>Running</span>
                            <p>m</p>
                        </div>
                        <div class="pop_box_info">
                        <span>Running</span>
                            <p>9075 m</p>
                        </div>
                    </div>
                    <div class="pop_box">
                    <img src="images/man_running.svg" alt="">
                        <div class="pop_box_info">
                            <span>Running</span>
                            <pm</p>
                        </div>
                        <div class="pop_box_info">
                        <span>Running</span>
                            <p>9075 m</p>
                        </div>
                    </div>
                    <div class="pop_box">
                    <img src="images/man_running.svg" alt="">
                        <div class="pop_box_info">
                            <span>Running</span>
                            <p> m</p>
                        </div>
                        <div class="pop_box_info">
                        <span>Running</span>
                            <p>9075 m</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
           
        </div>
    </div>
</body>
<script>
 var xValues = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];  
 var yValues = [1000, 2000, 3000, 5000, 2000, 5000, 6000];
 var xValuesM = [<?php echo '"'.implode('","',  $monthlydate ).'"' ?>];
var yValuesM = [<?php echo '"'.implode('","',  $monthlydata ).'"' ?>];
var xValuesY = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    var yValuesY = [<?php echo '"'.implode('","',  $yearlydata ).'"' ?>];
                    new Chart("myChartwater", {
                                type: "line",
                                data: {
                                labels: result['date'],
                                datasets: [{
                                    fill: false,
                                    lineTension: 0,
                                    backgroundColor: "#7E969E",
                                    borderColor: "#7E969E",
                                    data: result['value'],
                                    borderWidth: 1
                                }]
                                },
                                options: {
                                    // title: {
                                    //     display: true,
                                    //     text: result['range'],
                                    //     fontFamily: 'NATS',
                                    //     fontStyle: 'bold',
                                    //     fontSize: 15,
                                    //     // fontColor: 'black',
                                    //     fontColor: '#9D9D9D',
                                    // },
                                    scales: {
                                        xAxes:[{
                                            gridLines:{
                                                display:false,
                                            },
                                            ticks:{
                                                fontFamily: 'NATS',
                                                fontStyle: 'bold',
                                                fontSize:11,
                                                fontColor: '#9D9D9D',
                                            }
                                        }],
                                        yAxes:[{
                                            ticks:{
                                                // min:2500,
                                                // max:3000,
                                                // stepSize:100,
                                                fontFamily: 'NATS',
                                                fontStyle: 'bold',
                                                fontSize:13,
                                                fontColor: '#9D9D9D',
                                            },
                                        }],
                                    },
                                    legend:{
                                        display:false,
                                    },
                                    //   responsive:true,
                                    tooltips:{
                                        enabled:true,
                                        // innerHeight:500,
                                        // innerWidth:500,
                                    },
                                    layout:{
                                        padding:{
                                            left:5,
                                            right:5,
                                            top:0,
                                            bottom:5,
                                        },
                                    },
                                }
                            });
                        }
                    });
        document.getElementsByClassName('graph_button_left')[0].click();
}
const date_btn = document.getElementById('daterange-btn');
date_btn.addEventListener('click' , ()=>{
    fp.toggle();
});
const fp = flatpickr("input[type = date-range]", {
    maxDate: "today",
    dateFormat: "Y-m-d",
    mode: "range",
    onClose:[
        function(selectedDates){
            const Date_1 = new Date(selectedDates[0]);
            const Date_2 = new Date(selectedDates[1]);
            CustomChart_Data(Date_1.toISOString().slice(0,10),Date_2.toISOString().slice(0,10));
        }
    ]
});

window.customChart = new Chart(defaultChart, {
    type: 'line',
    data: {
    labels: [<?php echo("'". implode("','", $wholeYearData['month']). "'") ?>],
    datasets: [{
        fill: false,
        lineTension: 0,
        backgroundColor: "#7E969E",
        borderColor: "#7E969E",
        data: [<?php echo(implode(', ', $wholeYearData['value'])) ?>],
        borderWidth: 1
    }]
    },
    options: {
    scales: {
        xAxes:[{
            gridLines:{
                display:false,
            },
            ticks:{
                fontFamily: 'NATS',
                fontStyle: 'bold',
                fontSize:11,
                fontColor: '#9D9D9D',
            }
        }],
        yAxes:[{
            ticks:{
                // min:2500,
                // max:3000,
                // stepSize:100,
                fontFamily: 'NATS',
                fontStyle: 'bold',
                fontSize:13,
                fontColor: '#9D9D9D',
            },
        }],
    },
    legend:{
        display:false,
    },
    //   responsive:true,
    tooltips:{
        enabled:true,
        // innerHeight:500,
        // innerWidth:500,
    },
    layout:{
        padding:{
            left:5,
            right:5,
            top:5,
            bottom:5,
        },
    },
    }
});
// Yearly Chart
const yearlyChart = document.getElementById('myChartYearly');
new Chart(yearlyChart, {
    type: 'line',
    data: {
    labels: [<?php echo("'". implode("','", $wholeYearData['month']). "'") ?>],
    datasets: [{
        fill: false,
        lineTension: 0,
        backgroundColor: "#7E969E",
        borderColor: "#7E969E",
        data: [ <?php echo(implode(', ', $wholeYearData['value'])) ?>],
        borderWidth: 1
    }]
    },
    options: {
    scales: {
        xAxes:[{
            gridLines:{
                display:false,
            },
            ticks:{
                fontFamily: 'NATS',
                fontStyle: 'bold',
                fontSize:11,
                fontColor: '#9D9D9D',
            }
        }],
        yAxes:[{
            ticks:{
                // min:2500,
                // max:3000,
                // stepSize:100,
                fontFamily: 'NATS',
                fontStyle: 'bold',
                fontSize:13,
                fontColor: '#9D9D9D',
            },
        }],
    },
    legend:{
        display:false,
    },
    //   responsive:true,
    tooltips:{
        enabled:true,
        // innerHeight:500,
        // innerWidth:500,
    },
    layout:{
        padding:{
            left:5,
            right:5,
            top:5,
            bottom:5,
        },
    },
    }
});
// Monthly Chart
const monthlyChart = document.getElementById('myChartMonthly');
new Chart(monthlyChart, {
    type: 'line',
    data: {
    labels: [<?php echo("'" . implode("','", $wholeMonthData['date']) . "'") ?>],
    datasets: [{
        fill: false,
        lineTension: 0,
        backgroundColor: "#7E969E",
        borderColor: "#7E969E",
        data: [ <?php echo(implode(', ', $wholeMonthData['value'])) ?>],
        borderWidth: 1
    }]
    },
    options: {
    scales: {
        xAxes:[{
            gridLines:{
                display:false,
            },
            ticks:{
                fontFamily: 'NATS',
                fontStyle: 'bold',
                fontSize: 11,
                fontColor: '#9D9D9D',
            }
        }],
        yAxes:[{
            ticks:{
                // min:2500,
                // max:3000,
                stepSize:500,
                fontFamily: 'NATS',
                fontStyle: 'bold',
                fontSize:12,
                fontColor: '#9D9D9D',
            },
        }],
    },
    legend:{
        display:false,
    },
      responsive:true,
    tooltips:{
        enabled:true,
        // innerHeight:500,
        // innerWidth:500,
    },
    layout:{
        padding:{
            left:5,
            right:5,
            top:5,
            bottom:5,
        },
    },
    }
});
// Weekly Chart
const weeklyChart = document.getElementById('myChartWeekly');
new Chart(weeklyChart, {
    type: 'line',
    data: {
    // labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
    labels: [
        <?php
         echo("'" . implode("','", $wholeWeekData['day']) . "'") 
    ?>
    ],
    datasets: [{
        fill: false,
        lineTension: 0,
        backgroundColor: "#7E969E",
        borderColor: "#7E969E",
        data: [ <?php echo( implode(', ',$wholeWeekData['value'])) ?>],
        borderWidth: 1
    }]
    },
    options: {
    scales: {
        xAxes:[{
            gridLines:{
                display:false,
            },
            ticks:{
                fontFamily: 'NATS',
                fontStyle: 'bold',
                fontSize: 13,
                fontColor: '#9D9D9D',
            },
        }],
        yAxes:[{
            ticks:{
                // min:2500,
                // max:3000,
                stepSize:500,
                fontFamily: 'NATS',
                fontStyle: 'bold',
                fontSize:12,
                fontColor: '#9D9D9D',
            },
        }],
    },
    legend:{
        display:false,
    },
      responsive:true,
    tooltips:{
        enabled:true,
        // innerHeight:500,
        // innerWidth:500,
    },
    layout:{
        padding:{
            left:5,
            right:5,
            top:5,
            bottom:5,
        },
    },
    }
});
</script>
</body>
</html>