<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infits</title>
    <link rel="stylesheet" href="css/email.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <style>
.inlineimage {
  text-align:center; 
  width:100%;
  display:block;
  margin:auto;
}

#flex{
  margin: auto;
  display: flex;
  margin-left: 50%;
  align-items: flex-end;
  transform: translate(-100px); /* Make this half the image width */ 
}

#pp{
height: -40%;
width: -5%;
padding: 15px;
max-width: 100%;  
height: auto;  
background-size: 100px;
}
.header-text .name{
    font-weight: 600;
    font-weight: bold;
}

.header-text .profession{
    position: absolute;
width: 101px;
height: 100px;
left: 851px;
top: 197px;
}


   
        
    </style>
  </head>

  <body>
  <div id="page">
    <?php include 'event_calendar.php'; ?>

    <div id="flex">
  <div id="pp"><img src="images/p1.jpg"></div>
  <div class="header-text">
                    <span class="name">John</span><br>
                    <span class="Profession">Wyane</span>
                </div>
</div>

      
      

</body>
</html>