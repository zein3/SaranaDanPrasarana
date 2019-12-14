<div class="w3-cell w3-card-4" id="keluar_print">
	<table class="w3-table-all w3-hoverable">
		<tr class="w3-red">
			<td>ID Barang</td>
			<td>Nama Barang</td>
			<td>Tanggal Keluar</td>
			<td>Jumlah Keluar</td>
			<td>Lokasi</td>
			<td>Penerima</td>
		</tr>
		<?php

		require('connection.php');
		$query = mysqli_query($con, "Select * From barang_keluar");
		while ($data = mysqli_fetch_array($query))
		{
			echo "<tr>";
			echo "<td>" . $data['id_barang'] . "</td>";
			echo "<td>" . $data['nama_barang'] . "</td>";
			echo "<td>" . $data['tgl_keluar'] . "</td>";
			echo "<td>" . $data['jml_keluar'] . "</td>";
			echo "<td>" . $data['lokasi'] . "</td>";
			echo "<td>" . $data['penerima'] . "</td>";
			echo "</tr>";
		}

		?>
	</table>
</div>