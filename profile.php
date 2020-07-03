<?php
    session_start();

    if(isset($_SESSION['userId'])) {
        require('./config/db.php');

        $userId = $_SESSION['userId'];

        $stmt = $pdo -> prepare('SELECT * FROM users WHERE id = ? ');
        $stmt -> execute([ $userId]);

        $user = $stmt -> fetch();
    }   
?>

<?php require('./inc/dashboardHeader.html'); ?>

<div class="dashboardTopNav">
<input id="userSearch" type="text" name="search" class="searchBar" placeholder="Search">
</div>

<header id="menu">
<i class="cameraMobileIcon fas fa-camera"></i><span id="mobileLogoText">PixelPeople</span>
<div class="logo">
	<i class="fas fa-user"></i>
	<h4>Hello <?php echo $user->name ?></h4>
</div>
<nav>
 <ul class="side">
  <li><a href="#" class="active">HOME</a></li>
  <li><a href="#">MyProfile</a></li>  
  <li><a href="#">Folders</a></li>
  <li><a href="#">Activity</a></li>
  <li><a href="logout.php">LOGOUT</a></li>
 </ul>
</nav>
</header>

<div id="main"><div id="menubar">
<div id="menu-icon" class="">
<span class="first"></span><span class="second"></span><span class="third"></span>
<h2 class="mobileName">PixelPeople</h2>
</div>
<input id="userSearchMobile" type="text" name="search" class="searchBar mobileSearchBar" placeholder="Search">
</div>  

<section id="content" class="mainDashContent">
<div class="galleryHeading">
<h2>GALLERY</h2>
</div>
<div class="grid">
</div>
</section>
</div>

<?php require('./inc/footer.html'); ?>