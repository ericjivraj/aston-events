<?php
include("dbconnect.php");
session_start();

if(!empty($_POST) AND (empty($_POST['username']) OR empty($_POST['password']))) {
header("Location: login.php");

exit; }

//$isadmin=$_POST['is_admin'];
$username=$_POST['username'];
$password=SHA1($_POST['password']);
$sql="SELECT org_id, username, password, is_admin, fname FROM organiser WHERE username LIKE '$username' AND password LIKE '$password'";
$check = mysqli_query($connect, $sql);
$result = mysqli_fetch_assoc($check);

$_SESSION['org_id'] = $result['org_id'];
$_SESSION['username'] = $result['username'];
$_SESSION['is_admin'] = $result['is_admin'];
$_SESSION['password'] = $result ['password'];
$_SESSION['fname'] = $result['fname'];


print_r($result);

if (mysqli_num_rows($check) != 1) {

	header("Location: login.php"); exit;

}

if($_SESSION['is_admin'] == 1) { //If you're an admin
	$_SESSION['org_id'] = $result['org_id'];
	$_SESSION['fname'] = $result['fname'];
	header("Location: index1.php");
	exit;
	}

	elseif($_SESSION['is_admin'] == 0) { //If you're an organiser
	$_SESSION['org_id'] = $result['org_id'];
	$_SESSION['fname'] = $result['fname'];
	header("Location: index0.php");
	exit; }

mysqli_free_result();
?>
