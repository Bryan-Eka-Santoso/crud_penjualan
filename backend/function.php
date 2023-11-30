<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "penjualan";

$con = mysqli_connect($servername, $username, $password, $db_name);

// Insert barang
if(isset($_POST['insert_barang'])){
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $id_suplier = $_POST['id_suplier'];

    $insert = mysqli_query($con,"insert into barang (nama_barang,harga,stok,id_suplier) values ('$nama_barang','$harga','$stok','$id_suplier')");

    if ($insert) {
        echo '
        <script>alert("Berhasil Menambahkan Barang");
        window.location.href = "barang.php";
        </script>
        ';
    } else {
        echo '
        <script>alert("Gagal Menambahkan Barang");
        window.location.href = "barang.php";
        </script>
        ';
    }    
};

// Edit Barang
if(isset($_POST['edit_barang'])){
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $id_suplier = $_POST['id_suplier'];
    $id_barang = $_POST['id_barang'];

    $query = mysqli_query($con,"update barang set nama_barang='$nama_barang', harga='$harga', stok='$stok', id_suplier='$id_suplier' where id_barang='$id_barang'");

    if($query){
        echo '
        <script>alert("Berhasil Mengubah Barang");
        window.location.href = "barang.php";
        </script>
        ';
    } else {
        echo '
        <script>alert("Gagal Mengubah Barang");
        window.location.href = "barang.php";
        </script>
        ';
    }
}

// Delete Barang
if(isset($_POST['delete_barang'])){
    $id_barang = $_POST['id_barang'];

    $query = mysqli_query($con,"delete from barang where id_barang='$id_barang'");
    if($query){
        echo '
        <script>alert("Berhasil Menghapus Barang");
        window.location.href = "barang.php";
        </script>
        ';
    } else {
        echo '
        <script>alert("Gagal Menghapus Barang");
        window.location.href = "barang.php";
        </script>
        ';
    }
}

// Insert pembeli
if(isset($_POST['insert_pembeli'])){
    $nama_pembeli = $_POST['nama_pembeli'];
    $jk = $_POST['jk'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    $insert = mysqli_query($con,"insert into pembeli (nama_pembeli,jk,no_telp,alamat) values ('$nama_pembeli','$jk','$no_telp','$alamat')");

    if ($insert) {
        echo '
        <script>alert("Berhasil Menambahkan Pembeli");
        window.location.href = "pembeli.php";
        </script>
        ';
    } else {
        echo '
        <script>alert("Gagal Menambahkan Pembeli");
        window.location.href = "pembeli.php";
        </script>
        ';
    }    
};

// Edit Pembeli
if(isset($_POST['edit_pembeli'])){
    $nama_pembeli = $_POST['nama_pembeli'];
    $jk = $_POST['jk'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $id_pembeli = $_POST['id_pembeli'];

    $query = mysqli_query($con,"update pembeli set nama_pembeli='$nama_pembeli', jk='$jk', no_telp='$no_telp', alamat='$alamat' where id_pembeli='$id_pembeli'");

    if($query){
        echo '
        <script>alert("Berhasil Mengubah Pembeli");
        window.location.href = "pembeli.php";
        </script>
        ';
    } else {
        echo '
        <script>alert("Gagal Mengubah Pembeli");
        window.location.href = "pembeli.php";
        </script>
        ';
    }
}

// Delete Pembeli
if(isset($_POST['delete_pembeli'])){
    $id_pembeli = $_POST['id_pembeli'];

    $query = mysqli_query($con,"delete from pembeli where id_pembeli='$id_pembeli'");
    if($query){
        echo '
        <script>alert("Berhasil Menghapus Pembeli");
        window.location.href = "pembeli.php";
        </script>
        ';
    } else {
        echo '
        <script>alert("Gagal Menghapus Pembeli");
        window.location.href = "pembeli.php";
        </script>
        ';
    }
}

// Insert supplier
if(isset($_POST['insert_supplier'])){
    $nama_supplier = $_POST['nama_supplier'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    $insert = mysqli_query($con,"insert into supplier (nama_supplier,no_telp,alamat) values ('$nama_supplier','$no_telp','$alamat')");

    if ($insert) {
        echo '
        <script>alert("Berhasil Menambahkan Supplier");
        window.location.href = "supplier.php";
        </script>
        ';
    } else {
        echo '
        <script>alert("Gagal Menambahkan Supplier");
        window.location.href = "supplier.php";
        </script>
        ';
    }    
};

// Edit supplier
if(isset($_POST['edit_supplier'])){
    $nama_supplier = $_POST['nama_supplier'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $id_supplier = $_POST['id_supplier'];

    $query = mysqli_query($con,"update supplier set nama_supplier='$nama_supplier', no_telp='$no_telp', alamat='$alamat' where id_supplier='$id_supplier'");

    if($query){
        echo '
        <script>alert("Berhasil Mengubah Supplier");
        window.location.href = "supplier.php";
        </script>
        ';
    } else {
        echo '
        <script>alert("Gagal Mengubah Supplier");
        window.location.href = "supplier.php";
        </script>
        ';
    }
}

// Delete supplier
if(isset($_POST['delete_supplier'])){
    $id_supplier = $_POST['id_supplier'];

    $query = mysqli_query($con,"delete from supplier where id_supplier='$id_supplier'");
    if($query){
        echo '
        <script>alert("Berhasil Menghapus Supplier");
        window.location.href = "supplier.php";
        </script>
        ';
    } else {
        echo '
        <script>alert("Gagal Menghapus Supplier");
        window.location.href = "supplier.php";
        </script>
        ';
    }
}

// Insert pembayaran
if(isset($_POST['insert_pembayaran'])){
    $tgl_bayar = $_POST['tgl_bayar'];
    $total_bayar = $_POST['total_bayar'];
    $id_transaksi = $_POST['id_transaksi'];

    $insert = mysqli_query($con,"insert into pembayaran (tgl_bayar,total_bayar,id_transaksi) values ('$tgl_bayar','$total_bayar','$id_transaksi')");

    if ($insert) {
        echo '
        <script>alert("Berhasil Menambahkan Pembayaran");
        window.location.href = "pembayaran.php";
        </script>
        ';
    } else {
        echo '
        <script>alert("Gagal Menambahkan Pembayaran");
        window.location.href = "pembayaran.php";
        </script>
        ';
    }    
};

// Edit pembayaran
if(isset($_POST['edit_pembayaran'])){
    $tgl_bayar = $_POST['tgl_bayar'];
    $total_bayar = $_POST['total_bayar'];
    $id_transaksi = $_POST['id_transaksi'];
    $id_pembayaran = $_POST['id_pembayaran'];

    $query = mysqli_query($con,"update pembayaran set tgl_bayar='$tgl_bayar', total_bayar='$total_bayar', id_transaksi='$id_transaksi' where id_pembayaran='$id_pembayaran'");

    if($query){
        echo '
        <script>alert("Berhasil Mengubah Pembayaran");
        window.location.href = "pembayaran.php";
        </script>
        ';
    } else {
        echo '
        <script>alert("Gagal Mengubah Pembayaran");
        window.location.href = "pembayaran.php";
        </script>
        ';
    }
}

// Delete pembayaran
if(isset($_POST['delete_pembayaran'])){
    $id_pembayaran = $_POST['id_pembayaran'];

    $query = mysqli_query($con,"delete from pembayaran where id_pembayaran='$id_pembayaran'");
    if($query){
        echo '
        <script>alert("Berhasil Menghapus Pembayaran");
        window.location.href = "pembayaran.php";
        </script>
        ';
    } else {
        echo '
        <script>alert("Gagal Menghapus Pembayaran");
        window.location.href = "pembayaran.php";
        </script>
        ';
    }
}

// Insert transaksi
if(isset($_POST['insert_transaksi'])){
    $id_barang = $_POST['id_barang'];
    $id_pembeli = $_POST['id_pembeli'];
    $tanggal = $_POST['tanggal'];
    $qty = $_POST['qty'];
    $keterangan = $_POST['keterangan'];

    $insert = mysqli_query($con,"insert into transaksi (id_barang,id_pembeli,tanggal,qty,keterangan) values ('$id_barang','$id_pembeli','$tanggal','$qty','$keterangan')");

    if ($insert) {
        echo '
        <script>alert("Berhasil Menambahkan Transaksi");
        window.location.href = "transaksi.php";
        </script>
        ';
    } else {
        echo '
        <script>alert("Gagal Menambahkan Transaksi");
        window.location.href = "transaksi.php";
        </script>
        ';
    }    
};

// Edit transaksi
if(isset($_POST['edit_transaksi'])){
    $id_barang = $_POST['id_barang'];
    $id_pembeli = $_POST['id_pembeli'];
    $tanggal = $_POST['tanggal'];
    $qty = $_POST['qty'];
    $keterangan = $_POST['keterangan'];
    $id_transaksi = $_POST['id_transaksi'];

    $query = mysqli_query($con,"update transaksi set id_barang='$id_barang', id_pembeli='$id_pembeli', tanggal='$tanggal', qty='$qty', keterangan='$keterangan' where id_transaksi='$id_transaksi'");

    if($query){
        echo '
        <script>alert("Berhasil Mengubah Transaksi");
        window.location.href = "transaksi.php";
        </script>
        ';
    } else {
        echo '
        <script>alert("Gagal Mengubah Transaksi");
        window.location.href = "transaksi.php";
        </script>
        ';
    }
}

// Delete transaksi
if(isset($_POST['delete_transaksi'])){
    $id_transaksi = $_POST['id_transaksi'];

    $query = mysqli_query($con,"delete from transaksi where id_transaksi='$id_transaksi'");
    if($query){
        echo '
        <script>alert("Berhasil Menghapus Transaksi");
        window.location.href = "transaksi.php";
        </script>
        ';
    } else {
        echo '
        <script>alert("Gagal Menghapus Transaksi");
        window.location.href = "transaksi.php";
        </script>
        ';
    }
}
?>