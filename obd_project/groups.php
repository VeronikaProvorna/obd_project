<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>
<div class="container mlogin">
<div id="login">
	<h2 align="center">Списки груп</h2>
	<?php
$query="SELECT `name_group`, `curator`, `group_lead` FROM `groups`;";
if($result=$con2->query($query)){
	echo "<table><tr bgcolor='#D3EDF6'><th>Назва групи</th><th>Куратор</th>
	<th>Староста</th></tr>";
	foreach ($result as $row) {
		?>
		<tr>
		<?php
         echo "<td align='left'>" . $row["name_group"]."</td>";
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
$query="SELECT `surname_stud`, `name_stud`, `is_budget` FROM `student`, `groups`
WHERE `gr_id`=`group_id` AND `name_group`='KI-201';";
if($result=$con2->query($query)){
	echo "<table><tr bgcolor='#D3EDF6'><th>Ім'я студента</th><th>Бюджет/Контракт</th></tr>";
	foreach ($result as $row) {
		?>
		<tr>
		<?php
         echo "<td align='left'>" . $row["surname_stud"]." ". $row["name_stud"] . "</td>";
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
$query="SELECT `surname_stud`, `name_stud`, `is_budget` FROM `student`, `groups`
WHERE `gr_id`=`group_id` AND `name_group`='ПІ-201';";
if($result=$con2->query($query)){
	echo "<table><tr bgcolor='#D3EDF6'><th>Ім'я студента</th><th>Бюджет/Контракт</th></tr>";
	foreach ($result as $row) {
		?>
		<tr>
		<?php
         echo "<td align='left'>" . $row["surname_stud"]." ". $row["name_stud"] . "</td>";
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
$query="SELECT `surname_stud`, `name_stud`, `is_budget` FROM `student`, `groups`
WHERE `gr_id`=`group_id` AND `name_group`='КБ-201';";
if($result=$con2->query($query)){
	echo "<table><tr bgcolor='#D3EDF6'><th>Ім'я студента</th><th>Бюджет/Контракт</th></tr>";
	foreach ($result as $row) {
		?>
		<tr>
		<?php
         echo "<td align='left'>" . $row["surname_stud"]." ". $row["name_stud"] . "</td>";
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
$query="SELECT `surname_stud`, `name_stud`, `is_budget` FROM `student`, `groups`
WHERE `gr_id`=`group_id` AND `name_group`='ПІ-213';";
if($result=$con2->query($query)){
	echo "<table><tr bgcolor='#D3EDF6'><th>Ім'я студента</th><th>Бюджет/Контракт</th></tr>";
	foreach ($result as $row) {
		?>
		<tr>
		<?php
         echo "<td align='left'>" . $row["surname_stud"]." ". $row["name_stud"] . "</td>";
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
<p><a href="logout.php">Вийти</a> із системи</p>
</div>
<?php include("includes/footer.php"); ?>
?>