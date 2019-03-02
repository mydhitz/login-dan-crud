<?php
session_start();
if(!isset ($_SESSION["username"])){
	echo "Harap Login Terlebih Dahulu Untuk Mengakses Halaman ini<br>
	<a href='index.php'>LOGIN LAGI</a>";;
	exit;
}
echo "SELAMAT DATANG ".$_SESSION["nama"]."<br>".date('l, d-m-Y');
?>
<div id="menu">
<a href="logout.php">LOGOUT</a><br>
<hr>
</div>