
<div class="container mlogin">
<div id="login">
	<?php
	session_start();
	?>

	<?php require_once("includes/connection.php"); ?>
	<?php include("includes/header.php"); ?>	 
	<?php
	
	if(isset($_SESSION["session_username"])){
	// вывод "Session is set"; // в целях проверки
	header("Location: intro.php");
	}

	if(isset($_POST["username"])){
	if(!empty($_POST['username']) && !empty($_POST['password'])) {
	$login=htmlspecialchars($_POST['username']);
	$password=htmlspecialchars($_POST['password']);
	$query =mysqli_query($con,"SELECT * FROM users WHERE login='".$login."' AND password='".$password."'");
	$numrows=mysqli_num_rows($query);
	/*echo $numrows;*/
	if($numrows!=0)
 {
while($row=mysqli_fetch_assoc($query))
 {
	$dbusername=$row['login'];
  $dbpassword=$row['password'];
  $role=$row['role'];
 }
  if($login == $dbusername && $password == $dbpassword && $role==1)
 {
	 $_SESSION['session_username']=$login;	 
 /* Перенаправление браузера */
   header("Location: intro.php");
	}
	if($login == $dbusername && $password == $dbpassword && $role==2)
 {
	 $_SESSION['session_username']=$login;	 
 /* Перенаправление браузера */
   header("Location: admin.php");
	}
	}else {
	echo  'Invalid login or password!';
 }
	} else {
    echo 'All fields are required!';
	}
	}
	?>

<h1>Вхід</h1>
<form action="" id="loginform" method="post"name="loginform">
<p><label for="user_login">Им'я' користувача<br>
<input class="input" id="username" name="username"size="20"
type="text" value=""></label></p>
<p><label for="user_pass">Пароль<br>
<input class="input" id="password" name="password"size="20"
type="password" value=""></label></p> 
<p class="submit"><input class="button" name="login"type= "submit" value="Log In"></p>
<p class="regtext">ще не зареєстровані?<a href= "register.php">Реєтрація</a>!</p>
</form>
</div>
</div>
<?php include("includes/footer.php"); ?>
