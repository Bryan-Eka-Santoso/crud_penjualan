<?php
require 'backend/connect.php';
require 'backend/function.php';

$i = 1;
$get = mysqli_query($con, "SELECT * FROM pembeli");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembeli</title>
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
            <h1 class="fw-bold">Daftar Pembeli</h1>
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
                <th>Nama Pembeli</th>
                <th>JK</th>
                <th>No Telp</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php

    while($pmbl=mysqli_fetch_assoc($get)){
        $id_pembeli = $pmbl['id_pembeli'];
        $nama_pembeli = $pmbl['nama_pembeli'];
        $jk = $pmbl['jk'];
        $no_telp = $pmbl['no_telp'];
        $alamat = $pmbl['alamat'];
            ?>
            <tr>
                <td><?= $i++?></td>
                <td><?= $nama_pembeli;?></td>
                <td><?= $jk;?></td>
                <td><?= $no_telp;?></td>
                <td><?= $alamat;?></td>
                <td>
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#Edit<?=$id_pembeli;?>">
                        <i class="bi bi-pencil-square"></i>
                      </button>
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete<?=$id_pembeli;?>">
                        <i class="bi bi-trash3-fill"></i>
                </td>
            </tr>
                        <!-- Modal Edit -->
                        <div class="modal fade" id="Edit<?=$id_pembeli;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Pembeli</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post">
                          <div class="modal-body">
                          <label for="nama_barang" class="form-label">Nama Pembeli</label>
              <input type="text" class="form-control" placeholder="Nama Pembeli" name="nama_pembeli" autocomplete="off" value="<?=$nama_pembeli;?>" required />
            <label for="jk" class="form-label mt-2">Jenis Kelamin</label>
            <select name="jk" class="form-select" value="<?=$jk;?>">
                <option value="L" <?php if ($jk === 'L') echo 'selected'; ?>>L</option>
                <option value="P" <?php if ($jk === 'P') echo 'selected'; ?>>P</option>
            </select>
            <label for="no_telp" class="form-label mt-2">No Telp</label>
              <input type="number" class="form-control" placeholder="No Telp" name="no_telp" autocomplete="off" value="<?=$no_telp;?>" required/>
            <label for="alamat" class="form-label mt-2">Alamat</label>
              <input type="text" class="form-control" placeholder="Alamat" name="alamat" autocomplete="off" value="<?=$alamat;?>" required/>
                            <input type="hidden" name="id_pembeli" value="<?=$id_pembeli;?>" />
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name="edit_pembeli">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="Delete<?=$id_pembeli;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">
                            Hapus
                            <?=$nama_pembeli;?>
                          </h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post">
                          <div class="modal-body">
                            <p>Apakah anda yakin ingin menghapus pembeli ini?</p>
                            <input type="hidden" name="id_pembeli" value="<?=$id_pembeli;?>" />
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" name="delete_pembeli">Submit</button>
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
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pembeli</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="post">
            <div class="modal-body">
            <label for="nama_pembeli" class="form-label">Nama Pembeli</label>
              <input type="text" class="form-control" placeholder="Nama Pembeli" name="nama_pembeli" autocomplete="off" required />
            <label for="jk" class="form-label mt-2">Jenis Kelamin</label>
            <select name="jk" class="form-select">
                <option value="L">L</option>
                <option value="P">P</option>
            </select>
            <label for="no_telp" class="form-label mt-2">No Telp</label>
              <input type="number" class="form-control" placeholder="No Telp" name="no_telp" autocomplete="off" required/>
            <label for="alamat" class="form-label mt-2">Alamat</label>
              <input type="text" class="form-control" placeholder="Alamat" name="alamat" autocomplete="off" required/>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success" name="insert_pembeli">Submit</button>
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