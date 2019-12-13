<?php

require('connection.php');
include 'stok.php';
if (isset($_GET['id']))
{
	$id_pinjam = $_GET['id'];

	$data = mysqli_fetch_array(mysqli_query($con, "Select * From pinjam_barang Where id_pinjam='$id_pinjam'"));
	$penerima = $data['peminjam'];
	$jml_keluar = $data['jml_barang'];
	$nama_barang = $data['nama_barang'];
	$id = $data['id_barang'];

	$query_hapusBrgKeluar = "Delete From barang_keluar 
							 Where penerima='$penerima' And jml_keluar='$jml_keluar' And nama_barang='$nama_barang' 
							 Limit 1";
	mysqli_query($con, $query_hapusBrgKeluar);

	$query = "Delete From pinjam_barang Where id_pinjam='$id_pinjam'";

	if (mysqli_query($con, $query))
	{
		updateStok($id);
		header('Location: main.php');
	}
}

?>