<?php
//memanggil file koneksi.php agar dapat terhubung antara database dan file 
include_once("verifikasi.php");
include_once("koneksi.php");
// mengecek jika form telah terkirim untuk user update, kemudian ngeredirect ke halaman index.php setelah di update
if(isset($_POST['update'])){   
    //inisialisasi variabel
	$id = $_POST['id']; 		//variabel id yang ada di php yang memiliki nilai id di database
    $nama = $_POST['nama'];		//variabel nama yang ada di php yang memiliki nilai nama di database
    $email = $_POST['email'];	//variabel email yang ada di php yang memiliki nilai email di database
	$mobile = $_POST['mobile']; //variabel mobile yang ada di php yang memiliki nilai mobile di database    
	$alamat = $_POST['alamat']; //variabel alamat yang ada di php yang memiliki nilai alamat di database
	
	$foto = $_FILES['foto']['name'];
	$tmp_name   =   $_FILES['foto']['tmp_name'];
	$folderFoto= "gambar";   //$folderfoto merupakan nama variabel yang memiliki nilai gambar

	$fileTujuanFoto = $folderFoto."/".$foto;

    
	if($foto=="" || empty($foto)) {
		mysqli_query($mysqli, "UPDATE tabel_user SET nama ='$nama',
													 mobile	='$mobile',
													 email	='$email',
													 alamat	='$alamat',
													 foto	='$foto' 
													 WHERE id='$id'");
		}else {
            //move_uploaded_file($tmp_name, "assets/img/foto/".$file_name);
            move_uploaded_file ($_FILES['foto']['tmp_name'], $fileTujuanFoto);
			mysqli_query($mysqli, "UPDATE tabel_user SET 	nama	='$nama',
															mobile	='$mobile',
															email	='$email',
															alamat	='$alamat',
															foto	='$foto' 
															WHERE id='$id'");
		
		}
	   
    // menampilkan jika data ser telah ditambahkan
	// menampilkan halaman index.php ketika update telah berhasil
     header("Location: index.php");
	
}
?>
<?php
// menampilkan data user di database 
// membuat variabel id yang memiliki nilai id dari database,
$id = $_GET['id'];

// variabel result memiliki nilai yaitu akan memilih dari tabel_user sesuai dengan id yang dipilih
$result = mysqli_query($mysqli, "SELECT * FROM tabel_user WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
    $nama = $user_data['nama'];
    $email = $user_data['email'];
    $mobile = $user_data['mobile'];
	$alamat = $user_data['alamat'];
	$foto = $user_data['foto'];
}
?>
<html>
<head>  
    <title>Edit User Data</title>
</head>

<body>
    <a href="halaman_awal.php">Home</a>
    <br/><br/>

    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama" value=<?php echo $nama;?>></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email" value=<?php echo $email;?>></td>
            </tr>
            <tr> 
                <td>Mobile</td>
                <td><input type="text" name="mobile" value=<?php echo $mobile;?>></td>
            </tr>
			<tr> 
                <td>Alamat</td>
                <td><input type="text" name="alamat" value=<?php echo $alamat;?>></td>
            </tr>
			<tr> 
                <td>Foto</td>
				<td>
				<input type="hidden" name="foto" value=<?php echo $foto;?>>
				<img src="<?php echo "gambar/".$foto; ?>" width='180' height='180'></br>
				<input type="file" name="foto"/></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>