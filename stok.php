<?php

/*function updateStok ($id)
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
}*/

function updateStok ($id)
{
	require('connection.php');

	$jml_masuk = 0;
	$jml_keluar = 0;

	$query = "Select Sum(jml_masuk) As total_masuk From barang_masuk Where id_barang='$id'";
	echo $query;

	$brg_masuk = mysqli_fetch_assoc(mysqli_query($con, $query));
	$jml_masuk = $brg_masuk['total_masuk'];

	print_r($brg_masuk);
	echo "<br/>";
	echo $jml_masuk;

	$query = "Select Sum(jml_barang) As total_keluar From pinjam_barang Where id_barang='$id'";
	echo $query;

	$brg_keluar = mysqli_fetch_assoc(mysqli_query($con, $query));
	$jml_keluar = $brg_keluar['total_keluar'];

	if ($jml_keluar == null)
	{
		$jml_keluar = 0;
	}

	print_r($brg_keluar);
	echo "<br/>";
	echo $jml_keluar;

	$total_barang = $jml_masuk - $jml_keluar;

	echo "<br/>";
	echo $total_barang;


	$query = "Update stok Set jml_masuk='$jml_masuk', jml_keluar='$jml_keluar', total_barang='$total_barang'
			  Where id_barang='$id'";

	if (!mysqli_query($con, $query))
	{
		return;
	}
}

?>