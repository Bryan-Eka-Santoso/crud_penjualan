<?php
require 'backend/connect.php';  
require 'backend/function.php';

$i = 1;
$get = mysqli_query($con, "SELECT barang.*, supplier.*
FROM barang
LEFT JOIN supplier ON barang.id_suplier=supplier.id_supplier;");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>
<body class="p-5">
    <?php
    include 'nav.php';
    ?>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-6">
            <h1 class="fw-bold">Daftar Barang</h1>
            </div>
            <div class="col-6">
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#Insert">
            <i class="bi bi-plus-lg"></i>
                  </button>
            </div>
        </div>
    </div>
    <hr>
    <table id="example" border="1" width="100%" class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Nama Supplier</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php

    while($b=mysqli_fetch_assoc($get)){
        $id_barang = $b['id_barang'];
        $nama_barang = $b['nama_barang'];
        $harga = $b['harga'];
        $stok = $b['stok'];
        $id_suplier = $b['id_suplier'];
        $nama_supplier = $b['nama_supplier'];
            ?>
            <tr>
                <td><?= $i++?></td>
                <td><?= $nama_barang;?></td>
                <td><?= $harga;?></td>
                <td><?= $stok;?></td>
                <td><?= $nama_supplier;?></td>
                <td>
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#Edit<?=$id_barang;?>">
                        <i class="bi bi-pencil-square"></i>
                      </button>
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete<?=$id_barang;?>">
                        <i class="bi bi-trash3-fill"></i>
                </td>
            </tr>
            <!-- Modal Edit -->
            <div class="modal fade" id="Edit<?=$id_barang;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Barang</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post">
                          <div class="modal-body">
                          <label for="nama_barang" class="form-label mt-2">Nama Barang</label>
              <input type="text" class="form-control" placeholder="Nama Barang" name="nama_barang" autocomplete="off" value="<?=$nama_barang;?>" required />
            <label for="harga" class="form-label mt-2">Harga</label>
              <input type="number" class="form-control" placeholder="Harga" name="harga" autocomplete="off" value="<?=$harga;?>" required/>
            <label for="stok" class="form-label mt-2">Stok</label>
              <input type="number" class="form-control" placeholder="Stok" name="stok" autocomplete="off" value="<?=$stok;?>" required/>
            <label for="suplier" class="form-label mt-2">ID Suplier</label>
              <input type="text" class="form-control bg-light" name="id_suplier" value="<?=$id_suplier;?>" readonly />
                            <input type="hidden" name="id_barang" value="<?=$id_barang;?>" />
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name="edit_barang">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="Delete<?=$id_barang;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">
                            Hapus
                            <?=$nama_barang;?>
                          </h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post">
                          <div class="modal-body">
                            <p>Apakah anda yakin ingin menghapus barang ini?</p>
                            <input type="hidden" name="id_barang" value="<?=$id_barang;?>" />
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" name="delete_barang">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
            <?php }; ?>
        </tbody>
    </table>

    <!-- Modal Insert -->
    <div class="modal fade" id="Insert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="post">
            <div class="modal-body">
            <label for="nama_barang" class="form-label mt-2">Nama Barang</label>
              <input type="text" class="form-control" placeholder="Nama Barang" name="nama_barang" autocomplete="off" required />
            <label for="harga" class="form-label mt-2">Harga</label>
              <input type="number" class="form-control" placeholder="Harga" name="harga" autocomplete="off" required/>
            <label for="stok" class="form-label mt-2">Stok</label>
              <input type="number" class="form-control" placeholder="Stok" name="stok" autocomplete="off" required/>
            <label for="suplier" class="form-label mt-2">ID Suplier</label>
            <select class="form-select" name="id_suplier">
                <?php
                $get = mysqli_query($con, 'select * from supplier');

                while ($pm = mysqli_fetch_array($get)) {
                    $id_supplier = $pm['id_supplier'];
                    $nama_supplier = $pm['nama_supplier'];
                    echo "<option value='$id_supplier'>$nama_supplier</option>";
                }
                ?>
              </select>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success" name="insert_barang">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script>
      $(document).ready(function () {
        $("#example").DataTable({
          scrollX: true,
        });
      });
    </script>
</body>
</html>