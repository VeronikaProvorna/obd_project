<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>
<div class="container mlogin">
<div id="login">
	<h3 align="center">Список викладачів</h3>
<?php
$query="SELECT name_teacher, position, name_subject FROM teachers, subjects, teacher_subject 
WHERE teacher_subject.teacher_id=teachers.teacher_id
AND teacher_subject.subject_id=subjects.sublect_id;";
if($result=$con2->query($query)){
	echo "<table><tr bgcolor='#D3EDF6'><th>Ім'я' </th><th>Посада</th>
	<th>Предмет, який викладає</th></tr>";
	foreach ($result as $row) {
		?>
		<tr>
		<?php
         echo "<td align='center'>" . $row["name_teacher"] . "</td>";
         echo "<td>" . $row["position"] . "</td>";
         echo "<td>" . $row["name_subject"] . "</td>";
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