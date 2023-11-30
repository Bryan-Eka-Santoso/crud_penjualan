<?php
require 'backend/connect.php';
require 'backend/function.php';

$i = 1;
$get = mysqli_query($con, "SELECT transaksi.*, barang.*, pembeli.*
FROM transaksi
LEFT JOIN barang ON transaksi.id_barang=barang.id_barang
LEFT JOIN pembeli ON transaksi.id_pembeli=pembeli.id_pembeli;");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
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
            <h1 class="fw-bold">Daftar Transaksi</h1>
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
                <th>Nomor Transaksi</th>
                <th>Nama Barang</th>
                <th>Nama Pembeli</th>
                <th>Tanggal</th>
                <th>Qty</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
    while($tr=mysqli_fetch_assoc($get)){
        $id_transaksi = $tr['id_transaksi'];
        $id_barang = $tr['id_barang'];
        $nama_barang = $tr['nama_barang'];
        $id_pembeli = $tr['id_pembeli'];
        $nama_pembeli = $tr['nama_pembeli'];
        $tanggal = $tr['tanggal'];
        $qty = $tr['qty'];
        $keterangan = $tr['keterangan'];
            ?>
            <tr>
                <td><?= $i++?></td>
                <td><?= $id_transaksi;?></td>
                <td><?= $nama_barang;?></td>
                <td><?= $nama_pembeli;?></td>
                <td><?= $tanggal;?></td>
                <td><?= $qty;?></td>
                <td><?= $keterangan;?></td>
                <td>
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#Edit<?=$id_transaksi;?>">
                        <i class="bi bi-pencil-square"></i>
                      </button>
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete<?=$id_transaksi;?>">
                        <i class="bi bi-trash3-fill"></i>
                </td>
            </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="Edit<?=$id_transaksi;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Transaksi</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post">
                          <div class="modal-body">
                          <label for="id_transaksi" class="form-label">Nomor Transaksi</label>
              <input type="text" class="form-control bg-light" name="id_transaksi" value="<?=$id_transaksi;?>" readonly />
                          <label for="id_barang" class="form-label mt-2">Barang</label>
              <input type="text" class="form-control bg-light" name="id_barang" value="<?=$id_barang;?>" readonly />
                          <label for="id_pembeli" class="form-label mt-2">Pembeli</label>
              <input type="text" class="form-control bg-light" name="id_pembeli" value="<?=$id_pembeli;?>" readonly />
            <label for="tanggal" class="form-label mt-2">Tanggal</label>
              <input type="date" class="form-control" name="tanggal" value="<?=$tanggal;?>" required/>
            <label for="qty" class="form-label mt-2">Qty</label>
              <input type="number" class="form-control" name="qty" placeholder="Qty" value="<?=$qty;?>" required/>
            <label for="keterangan" class="form-label mt-2">Keterangan</label>
            <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" value="<?=$keterangan;?>"/>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name="edit_transaksi">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="Delete<?=$id_transaksi;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">
                            Hapus
                            <?=$id_transaksi;?>
                          </h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post">
                          <div class="modal-body">
                            <p>Apakah anda yakin ingin menghapus transaksi ini?</p>
                            <input type="hidden" name="id_transaksi" value="<?=$id_transaksi;?>" />
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" name="delete_transaksi">Submit</button>
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
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Transaksi</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="post">
            <div class="modal-body">
            <label for="id_barang" class="form-label">Barang</label>
            <select class="form-select" name="id_barang">
                <?php
                $get = mysqli_query($con, 'select * from barang');

                while ($br = mysqli_fetch_array($get)) {
                    $id_barang = $br['id_barang'];
                    $nama_barang = $br['nama_barang'];
                    echo "<option value='$id_barang'>$nama_barang</option>";
                }
                ?>
              </select>
            <label for="id_pembeli" class="form-label mt-2">Pembeli</label>
            <select class="form-select" name="id_pembeli">
                <?php
                $get = mysqli_query($con, 'select * from pembeli');

                while ($pm = mysqli_fetch_array($get)) {
                    $id_pembeli = $pm['id_pembeli'];
                    $nama_pembeli = $pm['nama_pembeli'];
                    echo "<option value='$id_pembeli'>$nama_pembeli</option>";
                }
                ?>
              </select>
            <label for="tanggal" class="form-label mt-2">Tanggal</label>
              <input type="date" class="form-control" name="tanggal" required/>
            <label for="qty" class="form-label mt-2">Qty</label>
            <input type="number" class="form-control" name="qty" placeholder="Qty" required/>
            <label for="keterangan" class="form-label mt-2">Keterangan</label>
            <input type="text" class="form-control" name="keterangan" placeholder="Keterangan"/>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success" name="insert_transaksi">Submit</button>
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