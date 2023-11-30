<?php
require 'backend/connect.php';  
require 'backend/function.php';

$result = mysqli_query($con, "SELECT COUNT(*) AS total_transaksi FROM transaksi");
$row = mysqli_fetch_assoc($result);
$total_transaksi = $row['total_transaksi'];

$result = mysqli_query($con, "SELECT COUNT(*) AS total_barang FROM barang");
$row = mysqli_fetch_assoc($result);
$total_barang = $row['total_barang'];

$result = mysqli_query($con, "SELECT COUNT(*) AS total_pembeli FROM pembeli");
$row = mysqli_fetch_assoc($result);
$total_pembeli = $row['total_pembeli'];

$result = mysqli_query($con, "SELECT COUNT(*) AS total_supplier FROM supplier");
$row = mysqli_fetch_assoc($result);
$total_supplier = $row['total_supplier'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
</head>
<body class="p-5">
    <?php
    include 'nav.php';
    ?>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
            <h1 class="fw-bold">Dashboard</h1>
    <hr>
            <div class="row justify-content-center">
<div class="col-md-3">
    <div class="card shadow m-1">
        <div class="card-header">
Total Transaksi
        </div>
        <div class="card-body fw-bold">
        <?= $total_transaksi;?>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="card shadow m-1">
        <div class="card-header">
        Total Barang
        </div>
        <div class="card-body fw-bold">
        <?= $total_barang;?>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="card shadow m-1">
        <div class="card-header">
        Total Pembeli
        </div>
        <div class="card-body fw-bold">
        <?= $total_pembeli;?>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="card shadow m-1">
        <div class="card-header">
        Total Supplier
        </div>
        <div class="card-body fw-bold">
        <?= $total_supplier;?>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>
</body>
</html>