
<!--Halaman ini untuk menambah user baru dari segi client/pengunjung tanpa harus login dahulu-->
<html>
<head>
    <title>Add Users</title>
</head>

<body>
    <a href="index.php">Go to Home</a>
    <br/><br/>

    <form action="daftar_user.php" method="post" name="form1" enctype="multipart/form-data">
        <table width="25%" border="0">
            <tr> 
                <td>Nama Lengkap</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr> 
                <td>Mobile</td>
                <td><input type="text" name="mobile"></td>
            </tr>
			<tr> 
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
			<tr> 
                <td>Foto</td>
                <td><input type="file" name="foto"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="kirim" value="Tambah"></td>
            </tr>
        </table>
    </form>

    <?php
	
    // mengecek saat data dikirim dengan nama variabel dan nama yang ada di database
    if(isset($_POST['kirim'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
		$alamat = $_POST['alamat'];
		
		$foto = $_FILES['foto']['name']; //variabel $foto yang memiliki nilai foto dan nama foto untuk menyimpan file foto dan nama foto
		$tmp_name   =   $_FILES['foto']['tmp_name'];
		
		$folderFoto= "gambar";   //$folderfoto merupakan nama variabel yang memiliki nilai yaitu gambar
		if(!is_dir($folderFoto)) //jiki dalam variabel $folderfoto adalah bukan direktori/folder yang bernama gambar, maka :
			mkdir($folderFoto);  //mkdir = make dir / make direktori membuat folder baru atau direktori baru yang bernama gambar
		$fileTujuanFoto = $folderFoto."/".$foto; //penyimpanan gambar dapat dibaca sebagai gambar/file.jpg = gambar(nama folder yg dibuat sebelumnya yaitu menggukanan $folderFoto), dan file.jpg diambil ari variabel $foto
		//Cek File
        if (strlen($foto)>0) {
            //upload Photo
            if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
				move_uploaded_file ($_FILES['foto']['tmp_name'], $fileTujuanFoto);
			}
        }
        
        $dataValid="YA";
        if(strlen(trim($nama))==0){
	        echo "Nama Harus Diisi!!<br>";
	        $dataValid="TIDAK";
        }

        $dataValid="YA";
        if(strlen(trim($email))==0){
	        echo "Email Harus Diisi!!<br>";
	        $dataValid="TIDAK";
        }
        if(strlen(trim($mobile))==0){
	        echo "Mobile Harus Diisi!!<br>";
	        $dataValid="TIDAK";
        }
        if(strlen(trim($alamat))==0){
	        echo "Alamat Harus Diisi!!<br>";
	        $dataValid="TIDAK";
        }

        if($dataValid=="TIDAK"){
	        echo "Masih ada kesalahan, silahkan perbaiki!<br>";
	        echo "<input type='button' value='Kembali' onClick='self.history.back()'>";
	    exit;
        }


        //memanggil file koneksi.php agar dapat terhubung antara database dan file 
        include_once("koneksi.php");

        // menambah user data ke database yaitu tabel_user dengan perintah sql
        $result = mysqli_query($mysqli, "INSERT INTO tabel_user
											(nama,email,mobile,alamat,foto) 
										 VALUES
											('$nama','$email','$mobile','$alamat','$foto')");

        echo "Biodata user telah ditambahkan, Terimakasih. <a href='index.php'>Lihat Data User</a>";
    }
    ?>
</body>
</html>