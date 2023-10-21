<?php 
    require('connection.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width-device-width, initial-scale-1.0">
    <title>CAR SHOWROOM MANAGEMENT SYSTEM</title>
    <link rel="stylesheet" type="text/css" href="main_style.css">
</head>
<body>
    <section class="main_pg">  
        <nav>
            <a href="#"><img src='WbsiteLogo.gif'></a>
            <div class="nav-links" id="navLinks">
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><button type="button" onclick="popup('login_popup')">LOGIN</button></li>
                    <li><button type="button" onclick="popup('reg_popup')">REGISTER</button></li>   
                </ul>
            </div>  
        </nav>
        

        <!---------------------------------Login-popup----------------------------------------------->

        <div class="popup-container" id="login_popup">
            <div class="popup">
                <form method="POST" action="login_reg.php">
                    <h2>
                        <span>LOGIN</span>
                        <button type="reset" onclick="popup('login_popup')">X</button>
                    </h2>
                    <input type="text" placeholder="Email or Username" name="email_username" required>
                    <input type="password" placeholder="Password" name="password" required>
                    <button type="submit" class="login_btn" name="login">LOGIN</button>
                </form>
                <div class="forgot_btn">
                    <button type="button" onclick="forgot_popup()">Forgot Password ?</button>
                </div>
            </div>
        </div>

        <!---------------------------------Register-popup----------------------------------------------->
        <div class="popup-container" id="reg_popup">
            <div class="reg popup">
                <form method="POST" action="login_reg.php">
                    <h2>
                        <span>REGISTER</span>
                        <button type="reset" onclick="popup('reg_popup')">X</button>
                    </h2>
                    <input type="text" placeholder="First Name" name="firstname" required>
                    <input type="text" placeholder="Last Name" name="lastname" required>
                    <input type="text" placeholder="Username" name="username" required>
                    <input type="email" placeholder="E-mail" name="email" required>
                    <input type="password" placeholder="Password" name="password" required>
                    <button type="submit" class="reg_btn" name="register">REGISTER</button>
                </form>
            </div>
        </div>

        <!---------------------------------Forgot_pass-popup----------------------------------------------->

        <div class="popup-container" id="forgot_popup">
            <div class="forgot popup">
                <form method="POST" action="forgot_password.php">
                    <h2>
                        <span>RESET PASSWORD</span>
                        <button type="reset" onclick="popup('forgot_popup')">X</button>
                    </h2>
                    <input type="email" placeholder="Email" name="email" required>
                    <button type="submit" class="reset_btn" name="send_reset_link">SEND LINK</button>
                </form>
            </div>
        </div>
        

        <script type="text/javascript">
            function popup(popup_name)
            {
                get_popup=document.getElementById(popup_name);
                if(get_popup.style.display=="flex")
                {
                    get_popup.style.display="none";
                }
                else
                {
                    get_popup.style.display="flex";
                }
            }

            function forgot_popup()
            {
                document.getElementById('login_popup').style.display="none";
                document.getElementById('forgot_popup').style.display="flex";
            }
        </script>
    </section>
</body>
</html>