<?php

session_start();
require('connection.php');

// variable dari form
$id = mysqli_real_escape_string($con, $_POST['id']);
$jumlah = mysqli_real_escape_string($con, $_POST['jumlah']);
$tgl_kembali = date("d-m-Y", strtotime($_POST['kembali']));
$peminjam = $_SESSION['name'];
$tgl_pinjam = date("d-m-Y");

// mengambil data barang
$data_barang = mysqli_query($con, "Select * From barang Where id_barang='$id'");
$data = mysqli_fetch_assoc($data_barang);

// variable dari data barang
$nama_barang = $data['nama_barang'];
$kondisi = $data['kondisi'];
$lokasi = $data['lokasi'];

// Mengecek isi form apakah bisa diterima database atau tidak
$date_now = date("Y-m-d");
$date_form = date("Y-m-d", strtotime($_POST['kembali']));
if ($jumlah == null || $date_now > $date_form)
{
	header('Location: main.php?s=p&err=true');
	return;
}

$query = "Insert Into pinjam_barang (peminjam, tgl_pinjam, id_barang, nama_barang, jml_barang, tgl_kembali, kondisi)
		  Values ('$peminjam', '$tgl_pinjam', $id, '$nama_barang', '$jumlah', '$tgl_kembali', '$kondisi')";
		  
//echo $query;
if (mysqli_query($con, $query))
{
	//header('Location: main.php?s=p');

	$query = "Insert Into barang_keluar (id_barang, nama_barang, tgl_keluar, jml_keluar, lokasi, penerima)
			  Value ($id, '$nama_barang', '$tgl_pinjam', '$jumlah', '$lokasi', '$peminjam')";

	if (mysqli_query($con, $query))
	{
		include 'stok.php';
		//updateStok($id);
		header('Location: main.php?s=p');

		/*
		// Mengambil Data stok
		$data_stok = mysqli_query($con, "Select * From stok Where id_barang='$id'");

		// Simpan data dari stok ke Variable
		$stok_totalBarang = $data_stok['total_barang'];
		$stok_jmlMasuk = $data_stok['jml_masuk'];
		$stok_jmlKeluar = $data_stok['jml_keluar'];

		// Kalkulasi data stok yang baru
		$newStok_totalBarang = $stok_totalBarang - $jumlah; */
	}
}

?>