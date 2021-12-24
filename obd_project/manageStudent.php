<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>
<div class="container mlogin">
<div id="login">
	<h2 align="center">Списки груп</h2>
	<?php
$query="SELECT `group_id`,`name_group`, `curator`, `group_lead` FROM `groups`;";
if($result=$con2->query($query)){
	echo "<table><tr bgcolor='#D3EDF6'><th>Id групи</th><th>Назва групи</th><th>Куратор</th>
	<th>Староста</th></tr>";
	foreach ($result as $row) {
		?>
		<tr>
		<?php
		 echo "<td align='left'>" . $row["group_id"]."</td>";
         echo "<td>".$row["name_group"]."</td>";
         echo "<td>". $row["curator"] . "</td>";
         echo "<td>" . $row["group_lead"] . "</td>";
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
	<h4 align="center">КІ-201</h2>
<?php
$query="SELECT `student_id`, `surname_stud`, `name_stud`, `is_budget` FROM `student`, `groups`
WHERE `gr_id`=`group_id` AND `name_group`='KI-201';";
if($result=$con2->query($query)){
	echo "<table><tr bgcolor='#D3EDF6'><th>Id студента</th><th>Ім'я студента</th><th>Бюджет/Контракт</th></tr>";
	foreach ($result as $row) {
		?>
		<tr>
		<?php
		 echo "<td align='left'>" . $row["student_id"]. "</td>";
         echo "<td>" . $row["surname_stud"]." ". $row["name_stud"] . "</td>";
         echo "<td>" . $row["is_budget"] . "</td>";
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
<h4 align="center">ПІ-201</h2>
<?php
$query="SELECT `student_id`,`surname_stud`, `name_stud`, `is_budget` FROM `student`, `groups`
WHERE `gr_id`=`group_id` AND `name_group`='ПІ-201';";
if($result=$con2->query($query)){
	echo "<table><tr bgcolor='#D3EDF6'><th>Id студента</th><th>Ім'я студента</th><th>Бюджет/Контракт</th></tr>";
	foreach ($result as $row) {
		?>
		<tr>
		<?php
         echo "<td align='left'>" . $row["student_id"]. "</td>";
         echo "<td>" . $row["surname_stud"]." ". $row["name_stud"] . "</td>";
         echo "<td>" . $row["is_budget"] . "</td>";
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
<h4 align="center">КБ-201</h2>
<?php
$query="SELECT `student_id`,`surname_stud`, `name_stud`, `is_budget` FROM `student`, `groups`
WHERE `gr_id`=`group_id` AND `name_group`='КБ-201';";
if($result=$con2->query($query)){
	echo "<table><tr bgcolor='#D3EDF6'><th>Id студента</th><th>Ім'я студента</th><th>Бюджет/Контракт</th></tr>";
	foreach ($result as $row) {
		?>
		<tr>
		<?php
         echo "<td align='left'>" . $row["student_id"]. "</td>";
         echo "<td>" . $row["surname_stud"]." ". $row["name_stud"] . "</td>";
         echo "<td>" . $row["is_budget"] . "</td>";
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
<h4 align="center">ПІ-213</h2>
<?php
$query="SELECT `student_id`,`surname_stud`, `name_stud`, `is_budget` FROM `student`, `groups`
WHERE `gr_id`=`group_id` AND `name_group`='ПІ-213';";
if($result=$con2->query($query)){
	echo "<table><tr bgcolor='#D3EDF6'><th>Id студента</th><th>Ім'я студента</th><th>Бюджет/Контракт</th></tr>";
	foreach ($result as $row) {
		?>
		<tr>
		<?php
         echo "<td align='left'>" . $row["student_id"]. "</td>";
         echo "<td>" . $row["surname_stud"]." ". $row["name_stud"] . "</td>";
         echo "<td>" . $row["is_budget"] . "</td>";
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
</div>
<?php

if(isset($_POST["register"])){

	if(!empty($_POST['stud_name']) && !empty($_POST['stud_surname']) && !empty($_POST['date']) && !empty($_POST['group']) 
		&& !empty($_POST['form_study']) && !empty($_POST['budget'])) {
  $name= htmlspecialchars($_POST['stud_name']);
	$surname=htmlspecialchars($_POST['stud_surname']);
 $date=htmlspecialchars($_POST['date']);
 $group=htmlspecialchars($_POST['group']);
 $formStudy=htmlspecialchars($_POST['form_study']);
 if(htmlspecialchars($_POST['budget'])=="Контракт"){
 $budg=0;
}else{
	$budg=1;
}
$sqlg="SELECT group_id FROM groups WHERE name_group='$group'";
if($result=$con2->query($sqlg)){
	foreach ($result as $row) {
		$gr= $row["group_id"];
//$gr=mysqli_query($con2,$sqlg);
}
}
	$sql="INSERT INTO student
  (name_stud, surname_stud, date_of_birth, gr_id, form_of_study,is_budget)
	VALUES('$name','$surname', '$date', '$gr','$formStudy','$budg')";
  $result=mysqli_query($con2,$sql);
 if($result){
	$message = "Student was added!";
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
  $studId= htmlspecialchars($_POST['namedel']);
	$sql2="DELETE FROM student WHERE surname_stud='$studId'";
  $result=mysqli_query($con2,$sql2);
 if($result){
	$message = "Student was deleted!";
} 
	} else {
	$message = "The student id is required!";
	}
	header("Refresh:0");
	}
	?>
	<?php if (!empty($message)) 
	{echo "<p class='label'>". $message . "</p>";
    }; 
    ?>
 <h4>Додавання студента:</h4>
<form action="manageStudent.php" id="registerform" method="post"name="registerform">
 <p><label for="name">Ім'я<br>
 <input class="input" id="stud_name" name="stud_name"size="32"  type="text" value=""></label></p>
<p><label for="surname">Прізвище<br>
<input class="input" id="stud_surname" name="stud_surname" size="32"type="text" value=""></label></p>
<p><label for="date">Дата народження<br>
<input class="input" id="date" name="date"size="20" type="date" value=""></label></p>
<p><label for="budget">Фінансування<br>

<select class="input" id="budget" name = "budget">
<option value="Бюджет">Бюджет</option>
<option value="Контракт">Контракт</option>
</select>
</label></p>
<p><label for="group_id">Група<br>
</label></p>
<?php
$sql = "SELECT * FROM groups";
$result_select = mysqli_query($con2,$sql);
/*Выпадающий список*/?>
<select class="input" id="group" name = "group">
<option> </option>
<?php
while($object = mysqli_fetch_object($result_select)){
echo "<option value = '$object->name_group' > $object->name_group </option>";
}
?></select>
<p><label for="form_study">Форма навчання<br>

<select class="input" id="form_study" name = "form_study">
	<option value="Денна"> Денна</option>
<option value="Заочна"> Заочна</option>
<option value="Дистанційна"> Дистанційна</option>
</select>
</label></p>
<p class="submit"><input class="button" id="register" name= "register" type="submit" value="Додати"></p>
 </form>
 <h4>Видалення студента:</h4>
<form action="manageStudent.php" id="registerform" method="post"name="registerform">
 <p><label for="student_id">Виберіть студента<br>
 </label></p>
 <?php
$sql = "SELECT * FROM student";
$result_select = mysqli_query($con2,$sql);
/*Выпадающий список*/?>
<select class="input" id="namedel" name = "namedel">
<option> </option>
<?php
while($object = mysqli_fetch_object($result_select)){
echo "<option value = '$object->surname_stud' > $object->surname_stud</option>";
}
?></select>
 <p class="submit"><input class="button" id="del" name= "del" type="submit" value="Видалити"></p>
<p><a href="logout.php">Вийти</a> із системи</p>
</div>
</div>

<?php include("includes/footer.php"); ?>
?>