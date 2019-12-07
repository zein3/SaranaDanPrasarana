<?php

session_start();
require('connection.php');

$name = mysqli_real_escape_string($con, $_POST['signup-name']);
$username = mysqli_real_escape_string($con, $_POST['signup-username']);
$password = mysqli_real_escape_string($con, $_POST['signup-password']);
$password_confirm = mysqli_real_escape_string($con, $_POST['signup-password-confirm']);
$level = "peminjam";

if ($password != $password_confirm)
{
	header("Location: index.php?error=passconfirm");
	return;
}

$checkQuery = "Select * From user Where username='$username' Or nama='$name'";
$check = mysqli_query($con, $checkQuery);

if (mysqli_num_rows($check) > 0)
{
	header("Location: index.php?error=exist");
	return;
}

$password = md5($password."ifebwe8b9fwh3");

$query = "Insert Into user (nama, username, password, level) Values ('$name', '$username', '$password', '$level')";

if (mysqli_query($con, $query))
{
	$_SESSION['level'] = "peminjam";
	$_SESSION['name'] = $name;
	header("Location: main.php?success=1");
}



?>