<?php

session_start();

if ($_SESSION['level'] == null || $_SESSION['name'] == null)
{
	header("Location: index.php");
}

if (isset($_GET['success']))
{
	if ($_GET['success'] == 1)
	{
		echo "<script type='text/javascript'>alert('akun telah terdaftar');</script>";
	}
}

if (isset($_GET['err']))
{
	if ($_GET['err'] == 'true')
	{
		include 'main_error.php';
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sarana dan Prasarana SMK YAJ</title>

	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="css/w3-flat.css">
</head>
<body>
<div class="w3-sidebar w3-flat-wet-asphalt w3-bar-block w3-animate-left" style="display: none;" id="sidebar">
	<button class="w3-bar-item w3-button w3-large w3-hover-blue" onclick="closeNav()">Close &times;</button>

    <!--<h3 class="w3-bar-item">Menu</h3>-->
    <!--<button class="w3-bar-item w3-button" onclick="openTab('peminjaman')">Peminjaman Barang</button>
    <button class="w3-bar-item w3-button" onclick="openTab('data')">Data Barang</button>
    <button class="w3-bar-item w3-button">Generate laporan</button>-->

    <?php

    if ($_SESSION['level'] == "admin" || $_SESSION['level'] == "peminjam")
    {
    	echo '<button id="peminjam_btn" class="w3-bar-item w3-button w3-hover-blue tablink" onclick="' . "openTab(event, 'peminjaman')" . '">Peminjaman Barang</button>';
    }
    if ($_SESSION['level'] == "peminjam")
    {
    	echo '<button class="w3-bar-item w3-button w3-hover-blue tablink" onclick="' . "openTab(event, 'my_barang')" . '">Barang yg dipinjam</button>';
    }
    if ($_SESSION['level'] == "admin" || $_SESSION['level'] == "manajemen")
    {
    	echo '<button id="data_btn" class="w3-bar-item w3-button w3-hover-blue tablink" onclick="' . "openTab(event, 'data')" . '">Data Barang</button>';
    }
    if ($_SESSION['level'] == "manajemen")
    {
    	echo '<button class="w3-bar-item w3-button w3-hover-blue tablink" onclick="' . "openTab(event, 'laporan')" . '">Generate laporan</button>';
    }
    if ($_SESSION['level'] == "manajemen" || $_SESSION['level'] == "admin")
    {
    	echo '<button id="supplier_btn" class="w3-bar-item w3-button w3-hover-blue tablink" onclick="' . "openTab(event, 'supplier')" . '">Data Supplier</button>';
    }

    ?>

  
    <a class="w3-bar-item w3-button w3-hover-blue tablink" href="logout.php">Log out</a>
</div>

<div id="main">
	<!-- Header -->
	<div class="w3-cell-row">
		<div class="w3-container w3-flat-midnight-blue w3-cell">
			<button id="openNav" class="w3-button w3-large w3-hover-blue" onclick="openNav()">&#9776;</button>
		</div>
	
		<div class="w3-container w3-flat-midnight-blue w3-cell w3-right-align">
			<h1>Sarana dan Prasarana SMK YAJ</h1>
			<h3>Selamat datang, <?php echo $_SESSION['name']; ?></h3>
		</div>
	</div>

	<!--<div class="w3-panel w3-green">
		<span onclick="this.parentElement.style.display='none'" class="w3-button w3-large w3-display-topright">&times;</span>
		<h3>Selamat datang, <?php //echo $_SESSION['name']; ?></h3>
	</div>-->

	<div id="peminjaman" class="w3-container tab w3-animate-opacity" style="display: none">
		<?php 
			if ($_SESSION['level'] == "admin")
			{
				include 'peminjaman_admin.php'; 
			}
			else if ($_SESSION['level'] == "peminjam")
			{
				include 'peminjaman.php';
			}
		?>
	</div>

	<div id="data" class="w3-container tab w3-animate-opacity" style="display: none">
		<?php
			if ($_SESSION['level'] == "admin" || $_SESSION['level'] == "manajemen")
			{
				include 'data_barang.php'; 
			}
		?>
	</div>

	<div id="laporan" class="w3-container tab w3-animate-opacity" style="display: none">
		<?php
			if ($_SESSION['level'] == "manajemen")
			{
				include 'laporan.php';
			}
		?>
	</div>

	<div id="my_barang" class="w3-container tab w3-animate-opacity" style="display: none;">
		<?php
			if ($_SESSION['level'] == "peminjam")
			{
				include 'my_barang.php';
			}
		?>
	</div> 

	<div id="supplier" class="w3-container tab w3-animate-opacity" style="display: none;">
		<?php
			if ($_SESSION['level'] == "admin" || $_SESSION['level'] == "manajemen")
			{
				include 'supplier.php';
			}
		?>
	</div>

</div>

<script type="text/javascript">
	function openTab(evt, tabName)
	{
		var i;
		var x = document.getElementsByClassName("tab");
		for (i = 0; i < x.length; i++)
		{
			x[i].style.display = "none";
		}
		document.getElementById(tabName).style.display = "block";

		var tablinks = document.getElementsByClassName("tablink");
		for (i = 0; i < tablinks.length; i++)
		{
			tablinks[i].className = tablinks[i].className.replace(" w3-flat-alizarin", "");
			tablinks[i].className = tablinks[i].className.replace(" w3-hover-blue", "");
			tablinks[i].className = tablinks[i].className.replace(" w3-hover-red", "");
			tablinks[i].className = tablinks[i].className.replace(" w3-hover-none", "");
			tablinks[i].classList.add('w3-hover-blue');
			//tablinks[i].classname += " w3-hover-blue";
		}
		evt.currentTarget.className = evt.currentTarget.className.replace(" w3-hover-blue", "");
		evt.currentTarget.className += " w3-flat-alizarin";
		evt.currentTarget.className += " w3-hover-red";
	}

	function openNav()
	{
		//document.getElementById("main").style.marginLeft = "25%";
		document.getElementById("sidebar").style.width = "25%";
  		document.getElementById("sidebar").style.display = "block";
  		document.getElementById("openNav").style.display = 'none';
	}

	function closeNav()
	{
		//document.getElementById("main").style.marginLeft = "0%";
		document.getElementById("sidebar").style.display = "none";
		document.getElementById("openNav").style.display = "inline-block";
	}
</script>

<?php

if (isset($_GET['s']))
{
	$s = $_GET['s'];
	if ($s == 'd')
	{
		echo "<script> openTab('data_btn', 'data'); </script>";
	}
	if ($s == 'p')
	{
		echo "<script> openTab('peminjaman_btn', 'peminjaman'); </script>";
		echo "<script>alert('Berhasil meminjam barang');</script>";
	}
}

?>

</body>
</html>