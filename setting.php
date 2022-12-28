<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infits</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    
    <style>
      #page{
        overflow: hidden;
      }
      #content {
    display: flex;
    flex-direction: column;
    height: 90%;
    font-family: 'Poppins';
    font-style: normal;
    padding: 10px;
    margin: 0px;
}
/*UPCOMING EVENTS*/
.events{
  display: flex;
  flex-direction: column;
}
.container {


background: url(Unsplash-Avatars_0004s_0005_laurence-cruz-P7yvmajPvkM-unsplash);
border: 5px solid #FFFFFF;
filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.06));
border-radius: 20px;

height: 174px;
width: 174px;
left: 625px;
top: 161px;
border-radius: 20px;

}

.time{
position: absolute;
width: 101px;
height: 100px;
left: 851px;
top: 197px;

font-family: 'NATS';
font-style: normal;
font-weight: 400;
font-size: 40px;
line-height: 123.84%;
/* or 50px */

display: flex;
align-items: center;

color: #000000;
}

.pp, .text{
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 18px;
  font-weight: 500;
  margin-top: 5px;
}
.join-button{

  background: white;
  border: 1px solid #4B9AFB;
  border-radius: 30px;
  color: black;
  box-shadow: 2px 4px 16px rgba(0,0,0,.2);
  color: #4B9AFB;
  padding: 8px 16px;
  border-radius: 20px;
  margin-top: 25px;
  font-size: 15px;
}

/*TASK LIST*/
.list{
  display: flex;
  
}
.task-buts{
  display: flex;
  flex-direction: row;
  justify-content: space-around;
}
.box{
  margin-left: 42px;
  background: #FFFFFF;
  border: 1px solid #F4F4F4;
  box-shadow: 0px 64px 64px -64px rgba(50, 50, 50, 0.11);
  border-radius: 12px;
  width: 90%;
}
.small-box{
  margin: 10px;
  padding: 10px;
  background: #FFFFFF;
  border: 1px solid #EFEEEE;
  border-radius: 12px;
}
.task-button{
  background-color: #4B9AFB;
  padding: 10px;
  width: 40%;
  border: 1px solid #4B9AFB;
  border-radius: 10px;
  color: white;
  font-size: 20px;
}
.task-box{
  display: flex;
  align-items: center;
  justify-content: space-between;
  background-color: #EFF8FF;
  padding: 10px;
  width: 70%;
  border: 1px solid #EFF8FF;
  border-radius: 10px;
  color: #120D26;
  font-size: 20px;
  margin-bottom: 15px;
}
.min-box{
  display: flex;
  flex-direction: column;
  width: 49%;
  align-items: center;
}
.task-content{
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
}
.task-text{
  display: flex;
  align-items: flex-start;
  flex-direction: column;

}
.center-flex{
display: flex;
align-items: center;
justify-content: center;
}
    </style>
  </head>

  <body>
    <?php include 'event_calendar.php';?>

    <div id="content">

      <!------------------------------------------------DASHBOARD--------------------------------------------------------->
        

      <!-----------------------------------------------EVENTS--------------------------------------------------------->
        

            

            

            
         
       <!-----------------------------------------------TASK-LIST------------------------------------------------------>
        

</body>
</html>