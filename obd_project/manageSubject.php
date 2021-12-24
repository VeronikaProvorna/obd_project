<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>
<div class="container mlogin">
<div id="login">
	<h3 align="center">Список предметів</h3>
<?php
$query="SELECT * FROM subjects";
if($result=$con2->query($query)){
	echo "<table><tr bgcolor='#D3EDF6'><th>Назва</th><th>Кількість кредитів</th></tr>";
	foreach ($result as $row) {
		?>
		<tr>
		<?php
         echo "<td align='center'>" . $row["name_subject"] . "</td>";
         echo "<td>" . $row["count_of_credits"] . "</td>";
		?>
        </tr>
        <?php 
    }
    echo "</table>";
    $result->free();
}else {
	echo "Помилка підключення:".$con2->error;
}
?>
<?php
if(isset($_POST["register"])){
	
	if(!empty($_POST['name']) && !empty($_POST['credit'])) {
  $name= htmlspecialchars($_POST['name']);
	$credit=htmlspecialchars($_POST['credit']);
	$sql="INSERT INTO subjects
  (name_subject, count_of_credits)
	VALUES('$name','$credit')";
  $result=mysqli_query($con2,$sql);
 if($result){
	$message = "Subject was added!";
} else {
 $message = "Failed to insert data information!";
  }
	} else {
	$message = "All fields are required!";
	}
	header("Refresh:0");
	}
	?>
    <?php
    if(isset($_POST["del"])){
	
	if(!empty($_POST['namedel'])) {
  $subjId= $_POST['namedel'];
  echo $subjId;
	$sql2="DELETE FROM subjects WHERE name_subject='$subjId'";
  $result=mysqli_query($con2,$sql2);
  echo "do_tut";
 if($result){
 	echo "tut";
	$message = "Subject was deleted!";
} 
	} else {
	$message = "The subjct id is required!";
	}
    header("Refresh:0");
	}?>
	
	<?php if (!empty($message)) 
	{echo "<p class='label'>". $message . "</p>";
    }; 

    ?>
 <h4>Додавання предмета:</h4>
<form action="manageSubject.php" id="registerform" method="post"name="registerform">
 <p><label for="name">Назва предмета<br>
 <input class="input" id="name" name="name"size="32"  type="text" value=""></label></p>
<p><label for="count_of_credits">Кількість кредитів<br>
<input class="input" id="credit" name="credit" size="32"type="text" value=""></label></p>
<p class="submit"><input class="button" id="register" name= "register" type="submit" value="Додати"></p>
 </form>
 <h4>Видалення предмета:</h4>
<form action="manageSubject.php" id="registerform" method="post"name="registerform">
 <p><label for="subject_id">Виберіть предмет<br>
 <?php
$sql = "SELECT * FROM subjects";
$result_select = mysqli_query($con2,$sql);
/*Выпадающий список*/?>
<select class="input" id="namedel" name = "namedel">
<option> </option>
<?php
while($object = mysqli_fetch_object($result_select)){
echo "<option value = '$object->name_subject' > $object->name_subject </option>";
}
?></select>
 <p class="submit"><input class="button" id="del" name= "del" type="submit" value="Видалити"></p>
</div>

<p><a href="logout.php">Вийти</a> із системи</p>
</div>
<?php include("includes/footer.php"); ?>
?>	