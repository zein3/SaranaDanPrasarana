<div class="w3-cell w3-card-4" id="stok_print">
	<table class="w3-table-all w3-hoverable">
		<tr class="w3-red">
			<td>ID Barang</td>
			<td>Nama Barang</td>
			<td>Jumlah Masuk</td>
			<td>Jumlah Keluar</td>
			<td>Total Barang</td>
		</tr>
		<?php

		require('connection.php');
		$query = mysqli_query($con, "Select * From stok");
		while ($data = mysqli_fetch_array($query))
		{
			echo "<tr>";
			echo "<td>" . $data['id_barang'] . "</td>";
			echo "<td>" . $data['nama_barang'] . "</td>";
			echo "<td>" . $data['jml_masuk'] . "</td>";
			echo "<td>" . $data['jml_keluar'] . "</td>";
			echo "<td>" . $data['total_barang'] . "</td>";
			echo "</tr>";
		}

		?>
	</table>
</div>