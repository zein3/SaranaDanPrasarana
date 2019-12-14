<div class="w3-cell w3-card-4" id="supplier_print">
	<table class="w3-table-all w3-hoverable">
		<tr class="w3-red">
			<td>ID Supplier</td>
			<td>Nama Supplier</td>
			<td>Alamat Supplier</td>
			<td>Nomor Telepon Supplier</td>
		</tr>
		<?php

		require('connection.php');
		$query = mysqli_query($con, "Select * From supplier");
		while ($data = mysqli_fetch_array($query))
		{
			echo "<tr>";
			echo "<td>" . $data['id_supplier'] . "</td>";
			echo "<td>" . $data['nama_supplier'] . "</td>";
			echo "<td>" . $data['alamat_supplier'] . "</td>";
			echo "<td>" . $data['telp_supplier'] . "</td>";
			echo "</tr>";
		}

		?>
	</table>
</div>