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
</div>
<p><a href="logout.php">Вийти</a> із системи</p>
</div>
<?php include("includes/footer.php"); ?>
?>	
