<h1>Generate Laporan</h1>
<div class="w3-container w3-card-4">
	<h3>Pilih Table</h3>
	<select class="w3-select w3-border w3-round" id="selection">
		<option value="" disabled selected>---</option>
		<option value="barang_print">Data Barang</option>
		<option value="pinjam_print">Peminjaman Barang</option>
		<option value="user_print">User</option>
	</select>
	<br></br>
	<button class="w3-button w3-black" onclick="printDocument()">Print</button>
	<br></br>
	<div style="display: none;">
		<?php 
			include 'documents/data_barang.php';
			include 'documents/pinjam_barang.php';
			include 'documents/user.php';
		?>
	</div>
</div>

<script>
function printDocument ()
{
	var sel = document.getElementById('selection');
	var printContents = document.getElementById(sel.value).innerHTML;
	var originalContents = document.body.innerHTML;

	document.body.innerHTML = printContents;
	window.print();
	document.body.innerHTML = originalContents;
}
</script>