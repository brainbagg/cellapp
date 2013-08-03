<?php
echo $fna = $_POST['fna'].'<br />';
echo $lna = $_POST['lna'].'<br />';
echo $email = $_POST['email'].'<br />';
echo $gender = $_POST['gender'].'<br />';
echo $day = $_POST['day'].'<br />';
echo $month = $_POST['month'].'<br />';
echo $year = $_POST['year'].'<br />';
echo $user = $_POST['user'].'<br />';
echo $pass = $_POST['pass'].'<br />';

$databirth = $_POST['day'].'/'.$_POST['month'].'/'.$_POST['year'];

$date = gmdate("D M Y");


$con = mysql_connect("mysql9.000webhost.com","a3200738_brain","Brain4us@") or die (mysql_error());
mysql_select_db("a3200738_cellapp",$con) or die (mysql_error());

$upd = mysql_query("INSERT INTO cell (firstname, lastname, email, gender, datebirth, username, password, date)
VALUES('$_POST[fna]', '$_POST[lna]', '$_POST[email]', '$_POST[gender]', '$databirth', '$_POST[user]', '$_POST[pass]', '$date')");
/*
$sql = mysql_query("SELECT * FROM cell WHERE username = 'rich'");
$row = mysql_fetch_array($sql);
echo $fna = $row['firstname'].'<br />';
echo $lna = $row['lastname'].'<br />';
echo $email = $row['email'].'<br />';
echo $user = $row['username'].'<br />';
*/


?>
