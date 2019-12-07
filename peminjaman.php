<h1 class="w3-center">Peminjaman Barang</h1>
<div class="w3-container">
	<table class="w3-table-all w3-hoverable" id="p_table">
		<tr class="w3-blue">
			<th>ID</th>
			<th>Nama</th>
			<th>Spesifikasi</th>
			<th>Lokasi</th>
			<th>Kondisi</th>
			<th>Jumlah</th>
			<th>Sumber dana</th>
			<th></th>
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
			echo "<td><button class='w3-button w3-blue w3-hover-red' onclick='pinjam(" . $data['id_barang'] . ")'>Pinjam</button>" . "</td>";
			echo "</tr>";
		}

		?>
	</table>
</div>

<div id="pinjamModal" class="w3-modal">
	<div class="w3-modal-content w3-animate-opacity w3-card-4">
		<div class="w3-container w3-blue">
			<span onclick="document.getElementById('pinjamModal').style.display='none'" class="w3-button w3-display-topright w3-hover-red">&times;</span>
			<h3>Pinjam Barang</h3>
		</div>
		<div class="w3-container">
			<form action="pinjam_barang.php" method="post">
				<p>
					<label><b>ID Barang:</b></label>
					<input class="w3-input w3-border w3-round" id="p_id_b" name="id" type="text" readonly>
				</p>
				<p>
					<label><b>Jumlah Barang:</b></label>
					<input class="w3-input w3-border w3-round" name="jumlah" type="number">
				</p>
				<p>
					<label><b>Tanggal Kembali</b></label>
					<input class="w3-input w3-border w3-round" name="kembali" type="date">
				</p>

				<button class="w3-button w3-blue w3-hover-green w3-center">Pinjam</button>

				<p></p>
				<p></p>
				<p></p>
			</form>
		</div>
	</div>
</div>

<script>
function pinjam(id, jumlah_barang)
{
	document.getElementById('pinjamModal').style.display='block';
	document.getElementById('p_id_b').value = id;
}
</script>