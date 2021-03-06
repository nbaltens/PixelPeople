<?php

if(isset( $_POST['register'])) {
    require('./config/db.php');

    $userName = filter_var( $_POST["userName"], FILTER_SANITIZE_STRING );
    $userEmail = filter_var( $_POST["userEmail"], FILTER_SANITIZE_EMAIL );
    $password = filter_var( $_POST["password"], FILTER_SANITIZE_STRING );
    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

    if( filter_var($userEmail, FILTER_VALIDATE_EMAIL) ) {
        $stmt = $pdo -> prepare('SELECT * from users WHERE email = ?');
        $stmt -> execute([$userEmail]);
        $totalUsers = $stmt -> rowCount();

        if( $totalUsers > 0 ) {
            $emailTaken = "The email chosen is already in use, please sign in";
        } else {
            $stmt = $pdo -> prepare('INSERT into users(name, email, password) VALUES( ?, ?, ?)');
            $stmt -> execute([$userName, $userEmail, $passwordHashed]);
            header('Location: http://localhost/loginphp/login.php');
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
			<form class="formProfile" action="register.php" method="POST">
				<i class="fa fa-camera cameraIcon" aria-hidden="true"></i>
                <h2 class="title">Welcome</h2>
                

                <div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
                      </div>
           		   <div class="div">
           		   		<h5>User Name</h5>
           		   		<input type="text" name="userName" class="input" required autocomplete="off">
                      </div>
                   </div>


           		<div class="input-div one">
           		   <div class="i">
                      <i class="fa fa-envelope" aria-hidden="true"></i>

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
                
                <input name="register" type="submit" class="btnProfile" value="Sign Up">
                <br />
                    <?php if(isset($emailTaken)) { ?>
                    <p class="errorMessage"><?php echo $emailTaken ?></p>
                    <?php } ?>
            </form>
        </div>
    </div>

<?php require('./inc/footer.html'); ?>





