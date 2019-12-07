<h1 class="w3-center">Data Barang</h1>
<div class="w3-cell-row">
	<!-- form -->
	<div class="w3-cell w3-card-4">
		<form class="w3-container" action="data_barang_aksi.php" method="post">
			<p>
				<label><b>ID Barang:</b></label>
				<input class="w3-input w3-border w3-round" name="d_id" id="d_id" type="text" readonly>
			</p>
			<p>
				<label><b>Nama Barang:</b></label>
				<input class="w3-input w3-border w3-round" name="d_nama" id="d_nama" type="text">
			</p>
			<p>
				<label><b>Spesifikasi Barang:</b></label>
				<input class="w3-input w3-border w3-round" name="d_spek" id="d_spek" type="text">
			</p>
			<p>
				<label><b>Lokasi Barang:</b></label>
				<input class="w3-input w3-border w3-round" name="d_lokasi" id="d_lokasi" type="text">
			</p>
			<p>
				<label><b>Kondisi Barang:</b></label>
				<input class="w3-input w3-border w3-round" name="d_kondisi" id="d_kondisi" type="text">
			</p>
			<p>
				<label><b>Jumlah Barang:</b></label>
				<input class="w3-input w3-border w3-round" name="d_jumlah" id="d_jumlah" type="number">
			</p>
			<p>
				<label><b>Sumber Dana:</b></label>
				<input class="w3-input w3-border w3-round" name="d_sumberdana" id="d_sumberdana" type="text">
			</p>

			<div class="bar">
				<button class="w3-bar-item w3-button w3-black" name="add">Tambah</button>
				<button class="w3-bar-item w3-button w3-teal" name="edit">Ubah</button>
				<button class="w3-bar-item w3-button w3-red" name="delete">Hapus</button>
				<!--<button onclick="printTable('toPrint')" class="w3-bar-item w3-button w3-blue" name="print">Print</button>
				<?php
				/*if ($_SESSION['level'] == "manajemen")
				{
					echo '<button onclick="printTable(' . '"toPrint"' . ')" class="w3-bar-item w3-button w3-blue" name="print">Print</button>';
				}*/
				?>-->
			</div>

			<br/>
		</form>
	</div>

	<!-- Table data -->
	<div class="w3-cell w3-card-4">
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
</div>

<script type="text/javascript">
	var d_table = document.getElementById('d_table');

	for (var i = 1; i < d_table.rows.length; i++)
	{
		d_table.rows[i].onclick = function()
		{
			document.getElementById("d_id").value = this.cells[0].innerHTML;
			document.getElementById("d_nama").value = this.cells[1].innerHTML;
			document.getElementById("d_spek").value = this.cells[2].innerHTML;
			document.getElementById("d_lokasi").value = this.cells[3].innerHTML;
			document.getElementById("d_kondisi").value = this.cells[4].innerHTML;
			document.getElementById("d_jumlah").value = this.cells[5].innerHTML;
			document.getElementById("d_sumberdana").value = this.cells[6].innerHTML;
		}
	}

	/*function printTable (divName)
	{
		var printContents = document.getElementById(divName).innerHTML;
		var originalContents = document.body.innerHTML;

		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
	}*/
</script>