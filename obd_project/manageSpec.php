<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>
<div class="container mlogin">
<div id="login">
	<h3 align="center">Список спеціальностей</h3>
<?php
$query="SELECT * FROM speciality";
if($result=$con2->query($query)){
	echo "<table><tr bgcolor='#D3EDF6'><th>Назва</th><th>Код спеціальності</th>
	<th>Бюджет</th><th>Контракт</th></tr>";
	foreach ($result as $row) {
		?>
		<tr>
		<?php
         echo "<td align='center'>" . $row["name_spec"] . "</td>";
         echo "<td>" . $row["code_of_spec"] . "</td>";
         echo "<td>" . $row["budget_places"] . "</td>";
         echo "<td>" . $row["contract_places"] . "</td>";
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
if (isset($_POST["change"])){
		$num1 =$_POST['namedel'];
		?> <form action="manageSpec.php" method="post">
			<input  type="hidden" name="num1" value="<?=$num1?>">
			<?php
				$upd = mysqli_query($con2,  "SELECT * FROM `speciality` WHERE name_spec = '$num1'");
				$upd = mysqli_fetch_all($upd);
				foreach ($upd as $upd) { 	
					?> 
					<input disabled type="text" name="change0" placeholder="Id = [<?=  $upd[0] ?>]"> 
					<p><label for="change1">Назва<br>
					<input  type="text" name="change1" value="<?=  $upd[1] ?>"> 
					<p><label for="change2">Код спеціальності<br> 
					<input  type="text" name="change2" value="<?= $upd[2] ?>">  
					<p><label for="change3">Кількість бюджетних місць<br>
					<input  type="text" name="change3" value="<?=  $upd[3] ?>">
					<p><label for="change4">Кількість контрактних місць<br>
					<input  type="text" name="change4" value="<?=  $upd[4] ?>">  
					<span class="submit"><input class="button" id="save" name= "save" type="submit" value="Зберегти"></span>
					<?php
				}
			}
			?></form><?php
		    if (isset($_POST["save"])) {
			$num1 =$_POST['num1'];
			    $id=$_POST["change0"];
				$name =$_POST["change1"];
				$code =$_POST["change2"];
				$budg =$_POST["change3"];
				$cont =$_POST["change4"];
				mysqli_query($con2, "UPDATE `speciality` SET `name_spec` = '$name', `code_of_spec` = '$code', `budget_places` = '$budg',
				`contract_places`='$cont' WHERE name_spec = '$num1'");
				header("Refresh:0");
		}


    ?>
	<h4>Редагування інформації про спеціальності:</h4>
<form action="manageSpec.php" id="registerformm" method="post"name="registerform">
	<p><label for="id">Виберіть спеціальность, яку хочете змінити<br>
<?php
$sql = "SELECT * FROM speciality";
$result_select = mysqli_query($con2,$sql);
/*Выпадающий список*/?>
<select class="input" id="namedel" name = "namedel">
<option> </option>
<?php
while($object = mysqli_fetch_object($result_select)){
echo "<option value = '$object->name_spec' > $object->name_spec </option>";
}
?></select>
	<p class="submit"><input class="button" id="change" name= "change" type="submit" value="Змінити"></p><br>
 </form>
	</div>
<p><a href="logout.php">Вийти</a> із системи</p>
</div>
<?php include("includes/footer.php"); ?>
?>	