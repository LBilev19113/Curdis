<?php
session_start();

if ( !$_SESSION['user'] ) {
		
	header("location: SignIn.php");
	exit;
}

$email = $_SESSION['user'];
include '../Db/dbconnect.php';
include '../Db/getUserFromEmail.php';
include '../Db/getFriends.php';
#print_r($friend['username']);




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
            
            <div class="header">
                <div class="userimg">
                    <img src="<?php echo $user['profilePicture']?>" class="cover">
                </div>
                <h4><?php echo $user['username']; ?></h4>
                <ul class="nav_icons">
                    <li><ion-icon name="settings-outline"></ion-icon></li>
                    <li><ion-icon name="add-outline"></ion-icon><!--<button class="btn" id="button"><ion-icon name="add-outline"></ion-icon></button>--></li>
                    <li><ion-icon name="ellipsis-vertical"></ion-icon></li>
                </ul>
            </div>
            <!--   Pop up kinda
                <div id="overlay"></div>
                    <div id="popup">
                    <div class="popupcontrols">
                        <span id="popupclose">X</span>
                    </div>
                    <div class="popupcontent">
                        <h1>Some Popup Content</h1>
                    </div>
                </div>
                <script type="text/javascript">
                    // Initialize Variables
                    var closePopup = document.getElementById("popupclose");
                    var overlay = document.getElementById("overlay");
                    var popup = document.getElementById("popup");
                    var button = document.getElementById("button");
                    // Close Popup Event
                    closePopup.onclick = function() {
                    overlay.style.display = 'none';
                    popup.style.display = 'none';
                    };
                    // Show Overlay and Popup
                    button.onclick = function() {
                    overlay.style.display = 'block';
                    popup.style.display = 'block';
                    }
                </script>-->
            
            <div class="chatlist">
              <?php foreach ($friends as $friend): ?>
                <div class="block active">
                    <div class="imgbx">
                        <img src="<?php echo $friend['profilePicture'] ?>">
                    </div>
                    <div class="details">
                        <div class="listHead">
                            <h4><?php echo $friend['username'] ?></h4>
                        </div>
                        <div class="message_p">
                            <p>status</p>
                        </div>
                    </div>
                </div>   
              <?php   endforeach;    ?>
         
            </div>
        </div>

        
        
        
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