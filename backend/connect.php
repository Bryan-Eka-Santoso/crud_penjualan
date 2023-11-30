<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "penjualan";

$con = mysqli_connect($servername, $username, $password, $db_name);

if($con -> connect_error){
    echo "Gagal Terhubung";
    exit();
} else {
    echo "";
}
?>