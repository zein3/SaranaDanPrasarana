<?php

require('connection.php');

if (isset($_POST['add']))
{
	$nama = mysqli_real_escape_string($con, $_POST['s_nama']);
	$alamat = mysqli_real_escape_string($con, $_POST['s_alamat']);
	$telp = mysqli_real_escape_string($con, $_POST['s_telp']);

	if ($nama == null || $alamat == null || $telp == null)
	{
		header('Location: main.php?s=s&err=true');
		return;
	}

	$query = "Insert Into supplier (nama_supplier, alamat_supplier, telp_supplier)
			  Values ('$nama', '$alamat', '$telp')";

	if (mysqli_query($con, $query))
	{
		header('Location: main.php?s=s');
	}
}

if (isset($_POSTp['edit']))
{
	$id = mysqli_real_escape_string($con, $_POST['s_id']);
	$nama = mysqli_real_escape_string($con, $_POST['s_nama']);
	$alamat = mysqli_real_escape_string($con, $_POST['s_alamat']);
	$telp = mysqli_real_escape_string($con, $_POST['s_telp']);

	if ($id == null || $nama == null || $alamat == null || $telp == null)
	{
		header('Location: main.php?s=s&err=true');
		return;
	}

	$query = "Update supplier
			  Set nama_supplier='$nama', alamat_supplier='$alamat', telp_supplier='$telp'
			  Where id_supplier='$id'";

	if (mysqli_query($con, $query))
	{
		header('Location.php?s=s');
	}
}

if (isset($_POST['delete']))
{
	$id = mysqli_real_escape_string($con, $_POST['s_id']);

	if ($id == null)
	{
		header('Location: main.php?s=s');
		return;
	}

	$query = "Delete From supplier Where id_supplier='$id'";

	if (mysqli_query($con, $query))
	{
		header('Location: main.php?s=s');
	}
}

?>