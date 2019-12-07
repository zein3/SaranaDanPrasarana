<?php

session_start();
require('connection.php');

$username = mysqli_real_escape_string($con, $_POST['login-username']);
$password = mysqli_real_escape_string($con, $_POST['login-password']);

$password = md5($password."ifebwe8b9fwh3");

$login_query = mysqli_query($con, "Select * From user Where username='$username' And password='$password'");

if (mysqli_num_rows($login_query) > 0)
{
	$data = mysqli_fetch_assoc($login_query);

	if ($data['level'] == "admin")
	{
		$_SESSION['level'] = "admin";
	}
	else if ($data['level'] == "manajemen")
	{
		$_SESSION['level'] = "manajemen";
	}
	else if ($data['level'] == "peminjam")
	{
		$_SESSION['level'] = "peminjam";
	}

	$_SESSION['name'] = $data['nama'];
	header("Location: main.php");
}
else
{
	header("Location: index.php?error=gagal");
}

?>