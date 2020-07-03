<?php error_reporting(E_ERROR | E_WARNING | E_PARSE); ?>

<?php
session_start();

if(isset( $_POST['login'])) {
    require('./config/db.php');

    $userEmail = filter_var( $_POST["userEmail"], FILTER_SANITIZE_EMAIL );
    $password = filter_var( $_POST["password"], FILTER_SANITIZE_STRING );
    
    $stmt = $pdo -> prepare('SELECT * FROM users WHERE email = ?');
    $stmt -> execute([$userEmail]);
    $user = $stmt -> fetch();

    if( isset($user) ) {
        if( password_verify($password, $user -> password )) {
            $_SESSION['userId'] = $user -> id;
            //header('Location: http://www.noahbaltensperger.com/projects/pixelpeople/profile.php');
            echo "<script type='text/javascript'> document.location = 'http://www.noahbaltensperger.com/projects/pixelpeople/profile.php'; </script>";
        } else {
            $wrongLogin = "The Email/Login used is incorrect";
            
           
        }
    }
}
?>

<?php require('./inc/header.html'); ?>

<div class="homeQuoteContainer">
<p class="homeQuote"><span><i class="fa fa-quote-left" aria-hidden="true"></i>
</span>PHOTOGRAPHY IS THE STORY<br /> I FAIL TO PUT INTO WORDS.</p>
<p class="homeQuoteAuther">-Destin Sparks</p>
</div>

<div class="containerOne">
		<div class="login-content">
			<form class="formProfile" action="login.php" method="POST">
				<i class="fa fa-camera cameraIcon" aria-hidden="true"></i>
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
                      </div>
                      
           		   <div class="div">
           		   		<h5>User Email</h5>
           		   		<input type="email" name="userEmail" class="input" required autocomplete="off">
                      </div>
                   </div>
                   
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>User Password</h5>
           		    	<input name="password" type="password" class="input" autocomplete="off">
            	   </div>
                </div>
                
            	<a class="aProfile" href="#">Forgot Password?</a>
                <input name="login" type="submit" class="btnProfile" value="Sign In">
                <br />
                    <?php if(isset($wrongLogin)) { ?>
                    <p class="errorMessage"><?php echo $wrongLogin ?></p>
                    <?php } ?>
            </form>
        </div>
    </div>
    
<?php require('./inc/footer.html'); ?>
