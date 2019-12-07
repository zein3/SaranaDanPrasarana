<div class="w3-cell w3-card-4" id="pinjam_print">
	<table class="w3-table-all w3-hoverable">
		<tr class="w3-red">
			<td>ID</td>
			<td>Peminjam</td>
			<td>Tanggal Pinjam</td>
			<td>ID Barang</td>
			<td>Nama Barang</td>
			<td>Jumlah Barang</td>
			<td>Tanggal Kembali</td>
			<td>Kondisi</td>
		</tr>
		<?php

		require('connection.php');
		$query = mysqli_query($con, "Select * From pinjam_barang");
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
			echo "</tr>";
		}

		?>
	</table>
</div>