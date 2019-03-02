<?php
/**
 * using mysqli_connect for database connection
 */

$database_Host = "localhost";   //nama server 
$database_Name = "crud_db";		//nama database
$database_Table = "tabel_user";	//nama tabel
$database_Username = "root";	//username database
$database_Password = "";		// password database

$mysqli = mysqli_connect($database_Host, 
	$database_Username, 
	$database_Password, 
	$database_Name);
if (!$mysqli)
	die("Gagal Koneksi");

echo "Koneksi ke Database Berhasil"; 
echo "<br> Nama Host : ".$database_Host;
echo "<br> Nama Database : ".$database_Name;
echo "<br> Nama Tabel : ".$database_Table;
echo "<br>";

?>