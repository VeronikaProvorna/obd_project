<?php

session_start();

if(!isset($_SESSION["session_username"])):
header("location:login.php");
else:
?>
	
<?php include("includes/header.php"); ?>
<div id="welcome">
<h2>Ласкаво просимо, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
<p></p>
  <div> 
	<h3>Подивитись списки: </h3>
	<ul>
		<li><a href="spec.php">Спеціальностей</a></li>
		<li><a href="subjects.php">Предметів</a></li>
		<li><a href="books.php">Літератури</a></li>
		<li><a href="teachers.php">Викладачів</a></li>
	</ul>
   </div>
  <p><a href="logout.php">Вийти</a> із системи</p>
</div>
	
<?php include("includes/footer.php"); ?>
	
<?php endif; ?>
