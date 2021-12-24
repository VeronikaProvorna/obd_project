<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>
<div class="container mlogin">
<div id="login">
	<h3 align="center">Список спеціальностей</h3>
<?php
$query="SELECT * FROM speciality";
if($result=$con2->query($query)){
	echo "<table><tr bgcolor='#D3EDF6'><th>Назва</th><th>Код спеціальності</th>
	<th>Бюджетних місць</th><th>Контрактних місць</th></tr>";
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
</div>
<p><a href="logout.php">Вийти</a> із системи</p>
</div>
<?php include("includes/footer.php"); ?>
?>	
