<?php

session_start();

if(!isset($_SESSION["session_username"])):
header("location:login.php");
else:
?>
	
<?php include("includes/header.php"); ?>
<div id="welcome">
<h2>Ласкаво просимо, адміністратор <span><?php echo $_SESSION['session_username'];?>! </span></h2>
  <div> 
	<h3>Оберіть параметр: </h3>
	<ul>
		<li><a href="show.php">Огляд</a></li>
		<li><a href="manage.php">Керування</a></li>
	</ul>
   </div>
   <p><a href="logout.php">Вийти</a> із системи</p>
</div>
	
<?php include("includes/footer.php"); ?>
	
<?php endif; ?>