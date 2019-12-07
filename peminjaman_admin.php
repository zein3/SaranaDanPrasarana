<?php require('connection.php'); ?>
<h1 class="w3-center">Peminjaman Barang</h1>
<div class="w3-cell-row">
	<div class="w3-cell w3-card-4">
		<form class="w3-container" action="peminjaman_admin_aksi.php" method="post">
			<p>
				<label><b>ID Peminjam:</b></label>
				<input class="w3-input w3-border w3-round" name="p_id" id="p_id" type="text" readonly>
			</p>
			<p>
				<label><b>Nama Peminjam:</b></label>
				<select class="w3-select w3-border w3-round" name="p_peminjam" id="p_peminjam">
					<?php

					$query = mysqli_query($con, "Select nama From user Where level='peminjam'");
					while ($data = mysqli_fetch_array($query))
					{
						echo '<option value="' . $data['nama'] . '">' . $data['nama'] . '</option>';
					}

					?>
				</select>
				<!--<input class="w3-input w3-border w3-round" name="p_peminjam" id="p_peminjam" type="text">-->
			</p>
			<p>
				<label><b>Tanggal Pinjam:</b></label>
				<input class="w3-input w3-border w3-round" name="p_tgl_pinjam" id="p_tgl_pinjam" type="date">
			</p>
			<p>
				<label><b>ID Barang:</b></label>
				<select class="w3-select w3-border w3-round" name="p_id_b" id="p_id_b">
					<?php

					$query = mysqli_query($con, "Select id_barang From barang");
					while ($data = mysqli_fetch_array($query))
					{
						echo '<option value="' . $data['id_barang'] . '">' . $data['id_barang'] . '</option>';
					}

					?>
				</select>
			</p>
			<p>
				<label><b>Nama Barang:</b></label>
				<input class="w3-input w3-border w3-round" name="p_nama_b" id="p_nama_b" type="text" readonly>
				<?php

				$query = mysqli_query($con, "Select * From barang");
				while ($data = mysqli_fetch_array($query))
				{
					echo "<p style='display: none;' id='p_id_barang_" . $data['id_barang'] . "'>" . $data['nama_barang'] . "</p>";
				}

				?>
			</p>
			<p>
				<label><b>Jumlah Barang:</b></label>
				<input class="w3-input w3-border w3-round" name="p_jml_b" id="p_jml_b" type="text">
			</p>
			<p>
				<label><b>Tanggal Kembali:</b></label>
				<input class="w3-input w3-border w3-round" name="p_tgl_kembali" id="p_tgl_kembali" type="date">
			</p>
			<p>
				<label><b>Kondisi:</b></label>
				<input class="w3-input w3-border w3-round" name="p_kondisi" id="p_kondisi" type="text" readonly>
				<?php

				$query = mysqli_query($con, "Select * From barang");
				while ($data = mysqli_fetch_array($query))
				{
					echo "<p style='display: none;' id='p_id_kondisi_" . $data['id_barang'] . "'>" . $data['kondisi'] . "</p>";
				}

				?>
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
		<table class="w3-table-all w3-hoverable" id="p_table">
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

			//require('connection.php');
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
</div>

<script type="text/javascript">
	var p_table = document.getElementById('p_table');

	for (var i = 1; i < p_table.rows.length; i++)
	{
		p_table.rows[i].onclick = function()
		{
			//pIndex = this.rowIndex;
			var tgl_pinjam_array = this.cells[2].innerHTML.split('-');
			var tgl_kembali_array = this.cells[6].innerHTML.split('-');

			var tgl_pinjam = new Date(tgl_pinjam_array[2], tgl_pinjam_array[1] - 1, tgl_pinjam_array[0]);
			var tgl_kembali = new Date(tgl_kembali_array[2], tgl_kembali_array[1] - 1, tgl_kembali_array[0]);

			console.log(tgl_pinjam.toDateString());
			console.log(tgl_kembali.toDateString());

			document.getElementById("p_id").value = this.cells[0].innerHTML;
			document.getElementById("p_peminjam").value = this.cells[1].innerHTML;
			//document.getElementById("p_tgl_pinjam").value = tgl_pinjam;
			document.getElementById("p_id_b").value = this.cells[3].innerHTML;
			document.getElementById("p_nama_b").value = this.cells[4].innerHTML;
			document.getElementById("p_jml_b").value = this.cells[5].innerHTML;
			//document.getElementById("p_tgl_kembali").value = tgl_kembali;
			document.getElementById("p_kondisi").value = this.cells[7].innerHTML;
		}
	}

	document.getElementById("p_id_b").addEventListener("input", function(evt)
	{
		var id = document.getElementById("p_id_b").value.toString();
		document.getElementById("p_nama_b").value = document.getElementById("p_id_barang_" + id).innerHTML;
		document.getElementById("p_kondisi").value = document.getElementById("p_id_kondisi_" + id).innerHTML;
	}, false);
</script>