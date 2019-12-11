<h1 class="w3-center">Data Supplier</h1>
<div class="w3-cell-row">
	<div class="w3-cell w3-card-4" <?php if ($_SESSION['level'] == "manajemen") { echo "style='display: none;'"; /* Menghilangkan bagian input jika login sebagai manajer */ } ?>>
		<form class="w3-container" action="supplier_aksi.php" method="post">
			<p>
				<label><b>ID Supplier:</b></label>
				<input class="w3-input w3-border w3-round" name="s_id" id="s_id" type="text" readonly>
			</p>
			<p>
				<label><b>Nama Supplier:</b></label>
				<input class="w3-input w3-border w3-round" name="s_nama" id="s_id" type="text">
			</p>
			<p>
				<label><b>Alamat Supplier:</b></label>
				<input class="w3-input w3-border w3-round" name="s_alamat" id="s_alamat">
			</p>
			<p>
				<label><b>Telepon Supplier:</b></label>
				<input class="w3-input w3-border w3-round" name="s_telp" id="s_telp">
			</p>

			<div class="bar">
				<button class="w3-bar-item w3-button w3-black" name="add">Tambah</button>
				<button class="w3-bar-item w3-button w3-teal" name="edit">Ubah</button>
				<button class="w3-bar-item w3-button w3-red" name="delete">Hapus</button>
			</div>

			<br/>
		</form>
	</div>
	<div class="w3-cell w3-card-4">
		<table class="w3-table-all w3-hoverable" id="s_table">
			<tr class="w3-red">
				<th>ID Supplier</th>
				<th>Nama Supplier</th>
				<th>Alamat Supplier</th>
				<th>Telepon Supplier</th>
			</tr>
			<?php

				require('connection.php'); // Memanggil Database
				$query = mysqli_query($con, "Select * From supplier"); // Mengambil data supplier
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
</div>

<script type="text/javascript">
	var s_table = document.getElementById('s_table');

	for (var i = 0; i < s_table.rows.length; i++) 
	{
		s_table.rows[i].onclick = function() // Menambahkan fungsi untuk setiap row/baris
		{
			// fungsi = menambahkan data dalam baris tersebut kedalam form
			document.getElementById('s_id').value = this.cells[0].innerHTML;
			document.getElementById('s_nama').value = this.cells[1].innerHTML;
			document.getElementById('s_alamat').value = this.cells[2].innerHTML;
			document.getElementById('s_telp').value = this.cells[3].innerHTML;
		}
	}
</script>