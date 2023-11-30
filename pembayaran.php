<?php
require 'backend/connect.php';  
require 'backend/function.php';

$i = 1;
$get = mysqli_query($con, "SELECT * FROM pembayaran");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
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
            <h1 class="fw-bold">Daftar Pembayaran</h1>
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
                <th>Tanggal Bayar</th>
                <th>Total Bayar</th>
                <th>ID Transaksi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php

    while($pmb=mysqli_fetch_assoc($get)){
        $id_pembayaran = $pmb['id_pembayaran'];
        $tgl_bayar = $pmb['tgl_bayar'];
        $total_bayar = $pmb['total_bayar'];
        $id_transaksi = $pmb['id_transaksi'];
            ?>
            <tr>
                <td><?= $i++?></td>
                <td><?= $tgl_bayar;?></td>
                <td><?= $total_bayar;?></td>
                <td><?= $id_transaksi;?></td>
                <td>
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#Edit<?=$id_pembayaran;?>">
                        <i class="bi bi-pencil-square"></i>
                      </button>
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete<?=$id_pembayaran;?>">
                        <i class="bi bi-trash3-fill"></i>
                </td>
            </tr>
            <!-- Modal Edit -->
            <div class="modal fade" id="Edit<?=$id_pembayaran;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Pembayaran</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post">
                          <div class="modal-body">
                          <label for="tgl_bayar" class="form-label">Tanggal Bayar</label>
              <input type="date" class="form-control" name="tgl_bayar" value="<?=$tgl_bayar;?>" required />
            <label for="total_bayar" class="form-label mt-2">Total Bayar</label>
              <input type="number" class="form-control" placeholder="Total Bayar" name="total_bayar" autocomplete="off" value="<?=$total_bayar;?>" required/>
            <label for="id_transaksi" class="form-label mt-2">Nomor Transaksi</label>
            <select name="id_transaksi" class="form-select">
                <option value="<?=$id_transaksi;?>"><?=$id_transaksi;?></option>
            </select>
                            <input type="hidden" name="id_pembayaran" value="<?=$id_pembayaran;?>" />
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name="edit_pembayaran">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="Delete<?=$id_pembayaran;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">
                            Hapus
                            <?=$id_pembayaran;?>
                          </h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post">
                          <div class="modal-body">
                            <p>Apakah anda yakin ingin menghapus pembayaran ini?</p>
                            <input type="hidden" name="id_pembayaran" value="<?=$id_pembayaran;?>" />
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" name="delete_pembayaran">Submit</button>
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
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pembayaran</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="post">
            <div class="modal-body">
            <label for="tgl_bayar" class="form-label">Tanggal Bayar</label>
              <input type="date" class="form-control" name="tgl_bayar" required />
            <label for="total_bayar" class="form-label mt-2">Total Bayar</label>
              <input type="number" class="form-control" placeholder="Total Bayar" name="total_bayar" autocomplete="off" required/>
            <label for="id_transaksi" class="form-label mt-2">Nomor Transaksi</label>
            <select class="form-select" name="id_transaksi">
                <?php
                $get = mysqli_query($con, 'select * from transaksi');

                while ($pm = mysqli_fetch_array($get)) {
                    $id_transaksi = $pm['id_transaksi'];
                    echo "<option value='$id_transaksi'>$id_transaksi</option>";
                }
                ?>
              </select>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success" name="insert_pembayaran">Submit</button>
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