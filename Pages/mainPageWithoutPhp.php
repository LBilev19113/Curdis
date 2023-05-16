
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../Js/popup.js"></script>
    <link rel="stylesheet" href="../Css/MainCSS.css">
    <title>CurDis</title>
</head>
<body>
    <div class="container">
        <div class="leftside">
            
            <div class="header">
                <div class="userimg">
                    <img src="../img/default.jpg" class="cover">
                </div>
                <h4>default</h4>
                <ul class="nav_icons">
                    <li><a href="#" class="nav_icons" onclick="togglePopup3()"><ion-icon name="settings-outline"></ion-icon></a></li>
                    <li><a href="#" class="nav_icons" onclick="togglePopup2()"><ion-icon name="add-outline"></ion-icon></a></li>
                    <li><a href="#" class="nav_icons" onclick="togglePopup1()"><ion-icon class="ion" name="ellipsis-vertical"></ion-icon> </a> </li>
                </ul>
                <!--<div class="menu"></div>-->
            </div>
            
            <div class="popup1" id="popup-1">
                <div class="content1">
                    <p>Friend Requests</p>
                    <div class="chatlist">
                        <?php
                        ?>
                        <div class="block active">
                            <div class="details">
                                <div class="listHead">
                                    <h4>username<?php  ?></h4>
                                    <div >
                                        <a href="">Accept</a><br>
                                    </div>
                                    <div >
                                        <a href="">Decline</a><br>
                                    </div>
                                </div>
                            </div>
                        </div>   
                        
                    </div>
                    <div class="close-btn" onclick="togglePopup1()">&times;</div>
               </div>
            </div>
            
            <div class="popup2" id="popup-2">
                <div class="content2">
                    <p>Add friend</p>
                    <form method="POST">
                        <div >
                            <label for="receiver">Name: </label>
                            <input type="text" name="receiver" id="1" autocomplete="off" required>
                        </div>
                        <div >
                            <input type="submit" name="addFriend" value="Add"><br>
                        </div>
                    </form>
                    <div class="close-btn" onclick="togglePopup2()">&times;</div>
               </div>
            </div>
            <div class="popup3" id="popup-3">
                <div class="content3">
                    <div class="close-btn" onclick="togglePopup3()">&times;</div>
               </div>
            </div>
            
            <div class="chatlist">
           
                <div class="block active">
                    <div class="imgbx">
                        <img src="../img/default.jpg">
                    </div>
                    <div class="details">
                        <div class="listHead">
                            <h4>username</h4>
                        </div>
                        <div class="message_p">
                            <p>status</p>
                        </div>
                    </div>
                </div>   
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