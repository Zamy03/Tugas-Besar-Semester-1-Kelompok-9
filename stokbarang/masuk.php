<?php
require 'function.php';
require 'cek.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Barang Masuk</title>
    <link href="https://fonts.googleapis.com/css2?family=Nova+Round&family=Poppins:wght@300;500&family=Ubuntu&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/1ef1772957.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark" style="background: linear-gradient(#e91e63, #2196f3)">
         <!-- Sidebar Toggle-->
         <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" style="padding-left: 10px;" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php"><h2 style="font-family:Nova Round;">ShoJo</h2></a>
        

    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <!-- sidebar -->
            <nav class="sb-sidenav accordion" style="background-color:#e91e63" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav" style="color: #fff;">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.php" style="color: #fff;">
                            <div class="sb-nav-link-icon" style="color: #fff;"><i class="fa-solid fa-warehouse"></i></i></div>
                            Stock Inventory
                        </a>
                        <a class="nav-link" href="masuk.php" style="color: #fff;">
                            <div class="sb-nav-link-icon"  style="color: #fff;"><i class="fa-solid fa-boxes-stacked"></i></div>
                            Stock In
                        </a>
                        <a class="nav-link" href="keluar.php"style="color: #fff;">
                            <div class="sb-nav-link-icon"  style="color: #fff;"><i class="fa-solid fa-truck-moving"></i></i></div>
                            Stock Out
                        </a>
                        <a class="nav-link" href="logout.php" style="color: #fff;">
                            Logout
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Stock In</h1>

                    <div class="card mb-4">
                        <div class="card-header">
                            <!-- To Open Modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                Add Items
                            </button>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Name of Items</th>
                                        <th>Amount</th>
                                        <th>Collector</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ambilsemuadatastock = mysqli_query($conn, "select * from masuk m, stock s where s.idbarang = m.idbarang");
                                    while ($data = mysqli_fetch_array($ambilsemuadatastock)) {
                                        $tanggal = $data['tanggal'];
                                        $namabarang = $data['namabarang'];
                                        $qty = $data['qty'];
                                        $keterangan = $data['keterangan'];

                                    ?>

                                        <tr>
                                            <td><?=$tanggal; ?></td>
                                            <td><?=$namabarang; ?></td>
                                            <td><?=$qty; ?></td>
                                            <td><?=$keterangan; ?></td>
                                        </tr>

                                    <?php
                                    };
                                    ?>

                                </tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Stock In</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <form method="post">
                <div class="modal-body">

                    <select name="barangnya" class="form-control">
                        <?php
                        $ambilsemuadatanya = mysqli_query($conn, "select * from stock");
                        while ($fetcharray = mysqli_fetch_array($ambilsemuadatanya)) {
                            $namabarang = $fetcharray['namabarang'];
                            $idbarang = $fetcharray['idbarang'];
                        ?>

                            <option value="<?= $idbarang; ?>"><?= $namabarang; ?></option>

                        <?php
                        }
                        ?>
                    </select>
                    <br>
                    <input type="text" name="penerima" class="form-control" placeholder="Penerima" required>
                    <br>
                    <input type="number" name="qty" class="form-control" placeholder="Quantity" required>
                    <br>
                    <button type="submit" class="btn btn-primary" name="barangmasuk">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>

</html>