<?php
include_once("koneksi.php"); 
//memanggil file koneksi.php agar dapat terhubung antara database dan file 

$hasil = mysqli_query($mysqli, "SELECT * FROM tabel_user ORDER BY id DESC");
//hasil merupakan nama variabel yang memiliki nilai yaitu mysqli_query dimana mysqli query 
//akan mengeksekusi perintah sql yaitu "SELECT * FROM user ORDER BY id DESC" user merupakan 
//nama table yang ada di database.
?>
<html>
<head>    
    <title>Daftar Tamu</title>
</head>
<body>

<a href="login.php"><input type="button" value="LOGIN"></a> atau <a href="daftar_user.php">Tambah User Baru</a><br/><br/>
    <table width='80%' border=1>
    <tr>
        <th>Foto</th> <th>Nama</th> <th>Mobile</th> <th>Email</th> <th>Alamat</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($hasil)) {   
	//while merupakan perulangan yang akan mengulang nama variable dari user_data dimana memiliki nilai yaitu variable hasil.
        echo "<tr>";
        echo "<td align='center'><img src='gambar/".$user_data['foto']."' width='80' height='80'></td>";
		
		echo "<td align='center'>".$user_data['nama']."</td>"; 	
					//user_data merupakan variable yang akan memanggil nama kolom yang ada didatabase yaitu nama
        echo "<td align='center'>".$user_data['mobile']."</td>"; 	
					//user_data merupakan variable yang akan memanggil nama kolom yang ada didatabase yaitu mobile
        echo "<td align='center'>".$user_data['email']."</td>";    
					//user_data merupakan variable yang akan memanggil nama kolom yang ada didatabase yaitu email
		echo "<td align='center'>".$user_data['alamat']."</td>"; 
					//user_data merupakan variable yang akan memanggil nama kolom yang ada didatabase yaitu email
}
    ?>
    </table>
</body>
</html>