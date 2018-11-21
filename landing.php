<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>System Udostępniania Wykładów</title>
    <link rel="stylesheet" type="text/css" href="css/landing.css">
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<section class="showcase" id="main">
    <div class="tresc">
        <div class="naglowek">
            <h1>Witaj w Systemie Udostepniania Wykladow</h1>
        </div>
        <div class="tekst">
            <p>Aby uzyskac dostep do serwisu zaloguj sie lub zarejestruj</p>
        </div>
        <div class="buttony">
            <div class="container grid-2 center">
                <div>
                    <a href="#logowanie" class="btn_landing">Logowanie</a>
                </div>
                <div>
                    <a href="#rejestracja" class="btn_landing">Rejestracja</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="showcase" id="logowanie">
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action='ajax/login.php' method="POST">
                    <span class="login100-form-logo"> <em class="zmdi zmdi-landscape"></em> </span> <span class="login100-form-title p-b-34 p-t-27"> Log in </span>
                    <div class="wrap-input100 validate-input" data-validate = "Enter username">
                        <input class="input100" type="text" name="username" placeholder="Username">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>

                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                        <label class="label-checkbox100" for="ckb1">
                            Remember me
                        </label>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                    <div class='text-center fs-18 m-t-25' style = "color: #ff0a0a; font-weight: bold;">
                        <?php
						if (!empty($_SESSION['error_message']))
						echo $_SESSION['error_message'];
						?>
                    </div>
                    <div class="login-footer p-t-25">
                        <div class='login-footer-box text-center'>

                        </div>
                        <div class='login-footer-box text-center'>
                            <span class='txt1'>Not registered?</span>
                            <a class="acount-create txt1" href="#rejestracja">
                                Create and account
                            </a>
                            <a href="#main">go back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
<section class="showcase" id="rejestracja">
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" action='ajax/register.php' method="POST">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

                <span class="login100-form-title p-b-34 p-t-27">
						Sign Up
					</span>

                <div class="wrap-input100 validate-input" data-validate = "Enter username">
                    <input class="input100" type="text" name="username" placeholder="Username">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Confirm password">
                    <input class="input100" type="password" name="confirm_password" placeholder="Confirm Password">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" name='submit' type='submit'>
                        Sign Up
                    </button>
                </div>
                <div class='text-center fs-18 m-t-25' style = "color: #ff0a0a; font-weight: bold;">

                    <?php
                    if (!empty($_SESSION['error_msg'])) {
                        echo $_SESSION['error_msg'];
                    }
                    ?>
                </div>
                <div class='text-center fs-18 m-t-25'>

                    <a href='#logowanie' class='head-to-login txt1' name='loginReddirect'>Already Signed Up?</a><br>
                    <a href="#main">go back</a>
                </div>
            </form>
        </div>
    </div>
</div>
</section>

<footer class="center bg-dark">
    <p>Grupa Lewa &copy; 2018</p>
</footer>


</body>
</html>