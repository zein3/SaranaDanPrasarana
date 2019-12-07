<div id="error-modal" class="w3-modal" style="display: block">
	<div class="w3-modal-content w3-animate-opacity w3-card-4">
		<div class="w3-container w3-red">
			<span onclick="document.getElementById('error-modal').style.display='none'" class="w3-button w3-display-topright w3-hover-none">&times;</span>

			<h2>ERROR!</h2>

		</div>
		<div class="w3-container">

			<?php

			if ($error == "passconfirm")
			{
				echo '<h3>Password yang dimasukkan tidak sama</h3>';
			}
			else if ($error == "exist")
			{
				echo '<h3>Username atau nama telah dipakai</h3>';
			}
			else if ($error == "gagal")
			{
				echo '<h3>Username atau Password salah</h3>';
			}

			?>
		</div>
	</div>
</div>