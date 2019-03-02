<?php
session_start();
session_destroy();
echo "Anda Sudah Logout<br>";
echo "<a href='index.php'>Login Kembali</a>";
?>