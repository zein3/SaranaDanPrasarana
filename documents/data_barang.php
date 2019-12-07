<!--<button class="w3-button w3-black">Print</button>-->
<div class="w3-cell w3-card-4" id="barang_print">
	<table class="w3-table-all w3-hoverable" id="d_table">
		<tr class="w3-red">
			<th>ID</th>
			<th>Nama</th>
			<th>Spesifikasi</th>
			<th>Lokasi</th>
			<th>Kondisi</th>
			<th>Jumlah</th>
			<th>Sumber dana</th>
		</tr>
		<?php

		require('connection.php');
		$query = mysqli_query($con, "Select * From barang");
		while ($data = mysqli_fetch_array($query))
		{
			echo "<tr>";
			echo "<td>" . $data['id_barang'] . "</td>";
			echo "<td>" . $data['nama_barang'] . "</td>";
			echo "<td>" . $data['spesifikasi'] . "</td>";
			echo "<td>" . $data['lokasi'] . "</td>";
			echo "<td>" . $data['kondisi'] . "</td>";
			echo "<td>" . $data['jumlah_barang'] . "</td>";
			echo "<td>" . $data['sumber_dana'] . "</td>";
			echo "</tr>";
		}

		?>
	</table>
</div>