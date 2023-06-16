<?php
session_start();

if ( !$_SESSION['user'] ) {
		
	header("location: SignIN.php");
	exit;
}

$email = $_SESSION['user'];
include '../Db/dbconnect.php';
include '../Db/getUserFromEmail.php';
include '../Db/getFriends.php';
include '../Db/getFriendrequests.php';

$user_id = $user['user_id'];

$messageSender = $user_id;
$messageReceiver= $user_id;

if ( isset( $_POST['addFriend'] ) ) {
	
	
	$sender = $user_id;
    $username = $_POST['receiver'];

    include '../Db/getUserFromName.php';
    $receiver = $userIdFromName['user_id'];
    
    include '../Db/addFriend.php';

}

/*if ( isset( $_POST['changeProfile']) ) {

    //$filename = $_FILES["uploadfile"]["name"];
    //$tempname = $_FILES["uploadfile"]["tmp_name"];

    $filename = $_POST['changePfp'];;
    $route = "../img/" . $filename;
    $newUsername = $_POST['changeUsername'];
 
    if ( $newUsername = "" && ! is_null($route)) {
        include "../Db/changeProfilePic.php";

    } elseif ( $filename = ""  && ! is_null($newUsername)) {
        include "../Db/changeUsername.php";
        
    }elseif($filename = ""  && $newUsername = ""){
        }
    else {
        include "../Db/changeUsernameAndProfilePic.php";
    }

    include "../Db/changeUsernameAndProfilePic.php";


}*/

    if (isset($_POST['changeProfile'])) {
        
        $newUsername = $_POST['changeUsername'];
        $img = "../img" . $_FILES['image']['name'];

        include "../Db/changeUsernameAndProfilePic.php";

        move_uploaded_file($_FILES['image']['tmp_name'], "../img/$img");

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="popup.js"></script>
    <link rel="stylesheet" href="../Css/MainCSS.css">
    <script>
        function toggleTheme(value) {
            var sheets = document
                .getElementsByTagName('link');
  
            sheets[0].href = value;
        }
    </script>
    <title>CurDis</title>
</head>
<body>
    <div class="container">
        <div class="leftside">
            
            <div class="header">
                <div class="userimg">
                    <a href="#" onclick="togglePopup4()"><img src="<?php echo $user['profilePicture']?>" class="cover"></a>
                </div>
                <h4><?php echo $user['username']; ?></h4>
                <ul class="nav_icons">
                    <li><a href="#" class="nav_icons" onclick="togglePopup3()"><ion-icon name="settings-outline"></ion-icon></a></li>
                    <li><a href="#" class="nav_icons" onclick="togglePopup2()"><ion-icon name="add-outline"></ion-icon></a></li>
                    <li><a href="#" class="nav_icons" onclick="togglePopup1()"><ion-icon class="ion" name="ellipsis-vertical"></ion-icon> </a> </li>
                </ul>
                <!--<div class="menu"></div>-->
            </div>
            
            <div class="popup1" id="popup-1">
                <div class="content1">
                    <p>Friend Requests</p><br>
                    <div class="chatlist">
                        <?php 
                        include '../Db/getFriendrequests.php';

                        if (isset( $_GET['accept_id'])) {
    
                            $sender =  $user_id;
                            $receiver = $_GET['accept_id'];

                            include '../Db/acceptrequest.php';
                            
                        }

                        if (isset( $_GET['decline_id'])) {
                            include '../Db/removeRequest.php';
                        }
                    
                        foreach ($requests as $request):?>
                        <div class="block active">
                            <div class="details">
                                <div class="listHead">
                                    <h4><?php echo $request['username'] ?></h4>
                                        <a href="mainPage.php?accept_id=<?= $request['user_id'] ?>" class="accept">Accept</a>
                                        <a href="mainPage.php?decline_id=<?= $request['user_id'] ?>" class="decline">Decline</a>
                                </div>
                            </div>
                        </div>   
                        <?php   endforeach;    ?>
                    </div>
                    <div class="close-btn" onclick="togglePopup1()">&times;</div>
               </div>
            </div>
            
            <div class="popup2" id="popup-2">
                <div class="content2">
                    <p>Add friend</p>
                    <form method="POST">
                        <div class="nametype">
                            <label for="receiver">Name: </label> <br>
                            <input type="text" name="receiver" id="1" autocomplete="off" placeholder="Add name..." required>
                        </div>
                        <div class="addfriend">
                            <input type="submit" name="addFriend" value="Add"><br>
                        </div>
                    </form>
                    <div class="close-btn" onclick="togglePopup2()">&times;</div>
               </div>
            </div>
            <div class="popup3" id="popup-3">
                <div class="content3">
                    <p>Choose your color theme.</p>
                    <ul class="themes"> <br>
                        <li><a href="#" onclick="toggleTheme('../Css/MainCss.css')">Monochrome</a></li>
                        <li><a href="#" onclick="toggleTheme('../Css/red.css')">911 whats's your emergancy?</a></li>
                        <li><a href="#" onclick="toggleTheme('../Css/green.css')">Welcome to the Jungle</a></li>
                        <li><a href="#" onclick="toggleTheme('../Css/lilac.css')">Lilac</a></li>
                        <li><a href="#" onclick="toggleTheme('../Css/weeb.css')">I really wanna stay at your house</a></li>
                        <li><a href="#" onclick="toggleTheme('../Css/blue.css')">i'm blue</a></li>
                        <li><a href="#" onclick="toggleTheme('../Css/colorful.css')">"My child is perfectly fine"</a></li>
                        <li><a href="#" onclick="toggleTheme('../Css/cyberpunk.css')">Cyberpunk</a></li>
                    </ul>
                    <div class="close-btn" onclick="togglePopup3()">&times;</div>
               </div>
            </div>

            <div class="popup4" id="popup-4">
                <div class="content4">
                    <form action="mainPage.php" method="post" enctype="multipart/form-data">
                        <input type="image" value="image" src="<?php echo $user['profilePicture']?>">
                        <label for="file-upload" class="custom-file-upload"><span class="file-label"></span></label>
                       
                        <input type="file" name="image" class="hidden" id="file-upload">
                       
                        <h3><?php echo $user['username']?></h3>
                        <input type="text" placeholder="Change your username..." name="changeUsername"> 
                        <input type="submit" class="changename" value=" Change " name="changeProfile">
                        <a href="SignIn.php" class="logout">LOG OUT</a>
                        <div class="close-btn" onclick="togglePopup4()">&times;</div>
                    </form>
                </div>
            </div> 
            <div class="chatlist">
             <?php
                    if (isset( $_GET['chat_id'])) {
                        
                        $messageReceiver =  $_GET['chat_id'];
                    }
             
             
                foreach ($friends as $friend):
                
                ?>
                <a href="mainPage.php?chat_id=<?= $friend['user_id'] ?>"  style="text-decoration:none" ><div class="block active">
                    <div class="imgbx">
                        <img src="<?php echo $friend['profilePicture'] ?>">
                    </div>
                    <div class="details">
                        <div class="listHead">
                            <h4><?php echo $friend['username'] ?></h4>
                        </div>
                        <div class="message_p">
                            
                        </div>
                    </div>
                </div></a> 
             <?php   endforeach;    ?>
            </div>
        </div>
        <div class="rightside">
            <div class="header2">
                <div class="imgText">
                    <div class="userimg2">
                        <?php 
                            include "../Db/getCurrentChat.php";
                        ?>
                        <img src="<?php echo $currentChat['profilePicture']  ?>" class="cover">
                    </div>
                    <h4><?php echo $currentChat['username'] ?><br> </h4>
                </div>
                <ul class="nav_icons">
                    <li><ion-icon name="ellipsis-vertical"></ion-icon></li>
                </ul>
            </div>
            <div class="chatbox_input" style="z-index: 1000 !important;">
                <form method="POST">
                    <input type="text" name="message" placeholder="Type a message">
                    <input type="submit" name="messageInput" value="send">

                    <?php
                            if ( isset( $_POST['messageInput'] ) ) {
	 
                                $message = $_POST['message'];
                                include '../Db/sendMessage.php';
                            
                            }
                    ?>  
                </form>

                
            </div>
            <div class="chatbox">
                    <?php 
                       
                        include "../Db/getMessages.php";
                        foreach($messages as $message):
                    ?>
                    <div class="messages">
                    <img src="<?php echo $message['profilePicture'] ?>">
                    <p><?php echo $message['message'] ?></p><br>
                    </div>
                    <?php endforeach; ?>
                
            </div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>