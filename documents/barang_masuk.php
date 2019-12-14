<div class="w3-cell w3-card-4" id="masuk_print">
	<table class="w3-table-all w3-hoverable">
		<tr class="w3-red">
			<td>ID Barang</td>
			<td>Nama Barang</td>
			<td>Tanggal Masuk</td>
			<td>Jumlah Masuk</td>
			<td>ID Supplier</td>
		</tr>
		<?php

		require('connection.php');
		$query = mysqli_query($con, "Select * From barang_masuk");
		while ($data = mysqli_fetch_array($query))
		{
			echo "<tr>";
			echo "<td>" . $data['id_barang'] . "</td>";
			echo "<td>" . $data['nama_barang'] . "</td>";
			echo "<td>" . $data['tgl_masuk'] . "</td>";
			echo "<td>" . $data['jml_masuk'] . "</td>";
			echo "<td>" . $data['id_supplier'] . "</td>";
			echo "</tr>";
		}

		?>
	</table>
</div>