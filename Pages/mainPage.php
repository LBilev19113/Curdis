<?php
session_start();

if ( !$_SESSION['user'] ) {
		
	header("location: SignIn.php");
	exit;
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/MainCSS.css">
    <title>CurDis</title>
</head>
<body>
    <div class="container">
        <div class="leftside">
            <!--User Profile-->
            <div class="header">
                <div class="userimg">
                    <img src="../img/img2.jpg" class="cover">
                </div>
                <ul class="nav_icons">
                    <li><ion-icon name="settings-outline"></ion-icon></li>
                    <li><ion-icon name="add-outline"></ion-icon></li>
                    <li><ion-icon name="ellipsis-vertical"></ion-icon></li>
                </ul>
            </div>
            <!--Chatlist-->
            <div class="chatlist">
                <div class="block active">
                    <div class="imgbx">
                        <img src="../img/Kayla-Person.jpg">
                    </div>
                    <div class="details">
                        <div class="listHead">
                            <h4>*UserName*</h4>
                            <p class="time">16:20</p>
                        </div>
                        <div class="message_p">
                            <p></p>
                            <b></b>
                        </div>
                    </div>
                </div>
              <?php  for($i=0; $i<10; $i++): ?>

                <div class="block unread">
                    <div class="imgbx">
                        <img src="../img/img3.jpg">
                    </div>
                    <div class="details">
                        <div class="listHead">
                            <h4>*UserName*</h4>
                            <p class="time">12:33</p>
                        </div>
                        <div class="message_p">
                            <p>Hey, cutie</p>
                            <b>1</b>
                        </div>
                    </div>
                </div>   
              <?php   endfor;    ?>
         
            </div>
        </div>

        
        
        <!--Chat-->
        <div class="rightside">
            <div class="header2">
                <div class="imgText">
                    <div class="userimg2">
                        <img src="../img/Kayla-Person.jpg" class="cover">
                    </div>
                    <h4>*UserName* <br> <span>online</span></h4>
                </div>
                <ul class="nav_icons">
                    <li><ion-icon name="ellipsis-vertical"></ion-icon></li>
                </ul>
            </div>
            <div class="chatbox_input">
                <ion-icon name="attach-outline"></ion-icon>
                <input type="text" placeholder="Type a message">
            </div>
        </div>
    </div>

     

    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>