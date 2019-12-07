<h1 class="w3-center">Barang yang dipinjam</h1>
<div class="w3-container">
	<table class="w3-table-all w3-hoverable">
		<tr class="w3-blue">
			<td>ID</td>
			<td>Peminjam</td>
			<td>Tanggal Pinjam</td>
			<td>ID Barang</td>
			<td>Nama Barang</td>
			<td>Jumlah Barang</td>
			<td>Tanggal Kembali</td>
			<td>Kondisi</td>
			<td></td>
		</tr>
		<?php

		require('connection.php');
		$nama_user = $_SESSION['name'];
		$query = mysqli_query($con, "Select * From pinjam_barang Where peminjam='$nama_user'");
		while ($data = mysqli_fetch_array($query))
		{
			echo "<tr>";
			echo "<td>" . $data['id_pinjam'] . "</td>";
			echo "<td>" . $data['peminjam'] . "</td>";
			echo "<td>" . $data['tgl_pinjam'] . "</td>";
			echo "<td>" . $data['id_barang'] . "</td>";
			echo "<td>" . $data['nama_barang'] . "</td>";
			echo "<td>" . $data['jml_barang'] . "</td>";
			echo "<td>" . $data['tgl_kembali'] . "</td>";
			echo "<td>" . $data['kondisi'] . "</td>";
			echo "<td><a class='w3-button w3-blue' href='kembalikan.php?id=" . $data['id_pinjam'] . "'>Kembalikan Barang</a></td>";
			echo "</tr>";
		}

		?>
	</table>
	<?php
	if (mysqli_num_rows($query) <= 0)
	{
		echo "<h3 class='w3-center'>Anda belum meminjam barang</h3>";
	}
	?>
</div>