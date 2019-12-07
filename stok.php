<?php

function updateStok ($id)
{
	require('connection.php');

	// Lakukan untuk semua data distok
	while ($stok = mysqli_fetch_array(mysqli_query($con, "Select * From stok")))
	{
		// Deklarasi Variable
		$old_jmlKeluar = $stok['jml_keluar'];
		$old_jmlMasuk = $stok['jml_masuk'];
		$old_totalBarang = $stok['total_barang'];

		// Ambil data berapa banyak barang yg dipinjam
		$total_dipinjam = 0;
		while ($pinjam = mysqli_fetch_array(mysqli_query($con, "Select * From pinjam_barang Where id_barang='$id'")))
		{
			$total_dipinjam += intval($pinjam['jml_barang']);
		}

		// Update jml barang keluar
		mysqli_query($con, "Update stok Set jml_keluar='$total_dipinjam' Where id_barang='$id'");
	}
}
?>