<?php

require('connection.php');

if (isset($_POST['add']))
{
	$peminjam = mysqli_real_escape_string($con, $_POST['p_peminjam']);
	$tgl_pinjam = date("d-m-Y", strtotime($_POST['p_tgl_pinjam']));
	$id_barang = mysqli_real_escape_string($con, $_POST['p_id_b']);
	$nama_barang = mysqli_real_escape_string($con, $_POST['p_nama_b']);
	$jml_barang = mysqli_real_escape_string($con, $_POST['p_jml_b']);
	$tgl_kembali = date("d-m-Y", strtotime($_POST['p_tgl_kembali']));
	$kondisi = mysqli_real_escape_string($con, $_POST['p_kondisi']);

	if ($peminjam == null || $tgl_pinjam == null || $id_barang == null || $nama_barang == null || $jml_barang == null || $tgl_kembali == null || $kondisi == null)
	{
		header('Location: main.php?s=d&err=true');
		return;
	}

	$query = "Insert Into pinjam_barang (peminjam, tgl_pinjam, id_barang, nama_barang, jml_barang, tgl_kembali, kondisi)
			 Values ('$peminjam', '$tgl_pinjam', '$id_barang', '$nama_barang', '$jml_barang', '$tgl_kembali', '$kondisi')";


	//echo $query;
	if (mysqli_query($con, $query))
	{
		header('Location: main.php?s=p');
	}
}

if (isset($_POST['edit']))
{
	$id = mysqli_real_escape_string($con, $_POST['p_id']);
	$peminjam = mysqli_real_escape_string($con, $_POST['p_peminjam']);
	$tgl_pinjam = date("d-m-Y", strtotime($_POST['p_tgl_pinjam']));
	$id_barang = mysqli_real_escape_string($con, $_POST['p_id_b']);
	$nama_barang = mysqli_real_escape_string($con, $_POST['p_nama_b']);
	$jml_barang = mysqli_real_escape_string($con, $_POST['p_jml_b']);
	$tgl_kembali = date("d-m-Y", strtotime($_POST['p_tgl_kembali']));
	$kondisi = mysqli_real_escape_string($con, $_POST['p_kondisi']);

	if ($peminjam == null || $tgl_pinjam == null || $id_barang == null || $nama_barang == null || $jml_barang == null || $tgl_kembali == null || $kondisi == null)
	{
		header('Location: main.php?s=d&err=true');
		return;
	}

	$query = "Update pinjam_barang 
			  Set peminjam='$peminjam', tgl_pinjam='$tgl_pinjam', id_barang='$id_barang', nama_barang='$nama_barang', jml_barang='$jml_barang', tgl_kembali='$tgl_kembali', kondisi='$kondisi' 
			  Where id_pinjam='$id'";

	if (mysqli_query($con, $query))
	{
		header('Location: main.php?s=p');
	}
}

if (isset($_POST['delete']))
{
	$id = mysqli_real_escape_string($con, $_POST['p_id']);

	if ($id == null)
	{
		header('Location: main.php?s=p');
		return;
	}

	$query = "Delete From pinjam_barang Where id_pinjam='$id'";

	if (mysqli_query($con, $query))
	{
		header('Location: main.php?s=p');
	}
}

?>