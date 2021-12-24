<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>
<div class="container mlogin">
<div id="login">
	<h3 align="center">Список літератури</h3>
<?php
$query="SELECT * FROM literature";
if($result=$con2->query($query)){
	echo "<table><tr bgcolor='#D3EDF6'><th>Id книги</th><th>Назва книги </th><th>Автор</th>
	<th>Дата публікації</th></tr>";
	foreach ($result as $row) {
		?>
		<tr>
		<?php
		echo "<td align='center'>" . $row["literature_id"] . "</td>";
         echo "<td>" . $row["name_book"] . "</td>";
         echo "<td>" . $row["author"] . "</td>";
         echo "<td>" . $row["date_of_publish"] . "</td>";
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
<h3 align="center">Список предметів</h3>
<?php
$query="SELECT * FROM subjects";
if($result=$con2->query($query)){
	echo "<table><tr bgcolor='#D3EDF6'><th>Id предмета</th><th>Назва</th><th>Кількість кредитів</th></tr>";
	foreach ($result as $row) {
		?>
		<tr>
		<?php
		echo "<td align='center'>" . $row["sublect_id"] . "</td>";
         echo "<td>" . $row["name_subject"] . "</td>";
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
	
	if(!empty($_POST['name']) && !empty($_POST['author']) && !empty($_POST['date']) && !empty($_POST['subj']) ) {
  $name= htmlspecialchars($_POST['name']);
	$author=htmlspecialchars($_POST['author']);
 $date=htmlspecialchars($_POST['date']);
 $subj=htmlspecialchars($_POST['subj']);
 $sqlg="SELECT sublect_id FROM subjects WHERE name_subject='$subj'";
if($result=$con2->query($sqlg)){
	foreach ($result as $row) {
		$sb= $row["sublect_id"];
//$gr=mysqli_query($con2,$sqlg);
}
}
	$sql="INSERT INTO literature
  (name_book, author, date_of_publish, subject_id)
	VALUES('$name','$author', '$date', '$sb')";
  $result=mysqli_query($con2,$sql);
 if($result){
	$message = "Book was added!";
} else {
 $message = "Failed to insert data information!";
  }
	} else {
	$message = "All fields are required!";
	}
	header("Refresh:0");
	}
	?>
	<?php if (!empty($message)) 
	{echo "<p class='label'>". $message . "</p>";
    }; 
    ?>
	<h4>Додавання літератури:</h4>
<form action="manageBook.php" id="registerform" method="post"name="registerform">
 <p><label for="name">Назва книги<br>
 <input class="input" id="name" name="name"size="32"  type="text" value=""></label></p>
<p><label for="writter">Автор<br>
<input class="input" id="author" name="author" size="32"type="text" value=""></label></p>
<p><label for="date">Дата випуску<br>
<input class="input" id="date" name="date"size="20" type="date" value=""></label></p>
<p><label for="subject_id">Виберіть предмет<br>
</label></p>
<?php
$sql = "SELECT * FROM subjects";
$result_select = mysqli_query($con2,$sql);
/*Выпадающий список*/?>
<select class="input" id="subj" name = "subj">
<option> </option>
<?php
while($object = mysqli_fetch_object($result_select)){
echo "<option value = '$object->name_subject' > $object->name_subject </option>";
}
?></select>
<p class="submit"><input class="button" id="register" name= "register" type="submit" value="Додати"></p>
 </form>
	</div>
<p><a href="logout.php">Вийти</a> із системи</p>
</div>
<?php include("includes/footer.php"); ?>
?>	