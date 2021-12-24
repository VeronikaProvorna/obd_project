<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>
<div class="container mlogin">
<div id="login">
	<h3 align="center">Список літератури</h3>
<?php
$query="SELECT * FROM literature";
if($result=$con2->query($query)){
	echo "<table><tr bgcolor='#D3EDF6'><th>Назва книги </th><th>Автор</th>
	<th>Дата публікації</th></tr>";
	foreach ($result as $row) {
		?>
		<tr>
		<?php
         echo "<td align='center'>" . $row["name_book"] . "</td>";
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
</div>
<p><a href="logout.php">Вийти</a> із системи</p>
</div>
<?php include("includes/footer.php"); ?>
?>	
