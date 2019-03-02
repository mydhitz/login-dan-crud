<?php
session_start();
$username = $_POST['username'];
$password = md5 ($_POST['password']);

$dataValid="YA";
if(strlen(trim($username))==0){
	echo "Username Harus Diisi!!<br>";
	$dataValid="TIDAK";
}
if(strlen(trim($password))==0){
	echo "Password Harus Diisi!!<br>";
	$dataValid="TIDAK";
}
if($dataValid=="TIDAK"){
	echo "Masih ada kesalahan, silahkan perbaiki!<br>";
	echo "<input type='button' value='Kembali' onClick='self.history.back()'>";
	exit;
}

include "koneksi.php";
$sql = "select * from pengguna where
		username='".$username."' and password='".$password."' limit 1";

$hasil = mysqli_query($mysqli,$sql) or die ('Gagal Akses<br>');
$jumlah = mysqli_num_rows($hasil);
if($jumlah>0){
	$row = mysqli_fetch_assoc($hasil);
	$_SESSION["username"] = $row ["username"];
	$_SESSION["nama"] = $row ["nama"];
	
	header ("Location: halaman_awal.php");
}else{
	echo "User atau Password Salah!<br>";
	echo "<input type='button' value='Kembali' onClick='self.history.back()'>";
	exit;
}
?>