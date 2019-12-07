<div class="w3-cell w3-card-4" id="user_print">
	<table class="w3-table-all w3-hoverable">
		<tr class="w3-red">
			<td>ID</td>
			<td>Nama</td>
			<td>Username</td>
			<!--<td>Password</td>-->
			<td>Level</td>
		</tr>
		<?php

		require('connection.php');
		$query = mysqli_query($con, 'Select * From user');
		while ($data = mysqli_fetch_array($query))
		{
			echo "<tr>";
			echo "<td>" . $data['id_user'] . "</td>";
			echo "<td>" . $data['nama'] . "</td>";
			echo "<td>" . $data['username'] . "</td>";
			//echo "<td>" . $data['password'] . "</td>";
			echo "<td>" . $data['level'] . "</td>";
			echo "</tr>";
		}

		?>
	</table>
</div>