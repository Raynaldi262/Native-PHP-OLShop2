<?php
require('../connect/conn.php');
require('../session/session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Laporan Pesanan</title>

    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <div class="" id="include-navbar"></div>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-left" id="laporan_pesanan">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Laporan Pesanan</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Pesanan PT. Media Langit Persada</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form method="POST">
                                        <table align="center" border="0" bordercolor="black">
                                            <tr>
                                                <td><b>Dari Tanggal</b></td>
                                                <td>
                                                    <input type="date" id="start" name="start" required>
                                                </td>
                                                <td><b>Sampai Tanggal</b></td>
                                                <td><input type="date" id="end" name="end" required></td>
                                                <td><input type="submit" value="Cari" class="btn-info" name="search"></td>
                                            </tr>
                                        </table>
                                    </form>
                                    <br>
                                    <?php
                                    if (isset($_POST['search'])) {
                                        $start = date("d-m-Y", strtotime($_POST['start']));
                                        $end = date("d-m-Y", strtotime($_POST['end']));
                                    ?> <p align="center" class="title"><?php
                                                                        echo 'Data tanggal ' . $start . ' sampai tanggal ' . $end;  ?>
                                        </p><?php ?>
                                        <form action="">
                                            <input type='hidden' name='ins_start' id='ins_start' value='<?php echo $_POST['start']; ?>'>
                                            <input type='hidden' name='ins_end' id='ins_end' value='<?php echo $_POST['end']; ?>'>
                                        </form>
                                    <?php
                                    } else {
                                    ?>
                                        <form action="">
                                            <input type='hidden' name='ins_start' id='ins_start' value=''>
                                            <input type='hidden' name='ins_end' id='ins_end' value=''>
                                        </form>
                                    <?php
                                    }
                                    ?>
                                    <br>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr align="center">
                                                <th>No</th>
                                                <th>Kode</th>
                                                <th>Nama Customer</th>
                                                <th>No Invoice</th>
                                                <th>Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            if (isset($_POST['search'])) {
                                                $start = $_POST['start'];
                                                $end = $_POST['end'];

                                                // ini buat isi tabel pesanan
                                                $sql = "select * from tbl_order a
                                                        join (select cust_id, cust_name from tbl_customer )b on a.cust_id = b.cust_id
                                                         where create_date >= '" . $start . " 00:00:00' and create_date <= '" . $end . " 23:59:59'";
                                                $getPesanan = mysqli_query($conn, $sql);

                                                // ini buat itung omset
                                                $sql2 = "Select sum(total_price) total from tbl_order
                                                        where create_date >= '" . $start . " 00:00:00' and create_date <= '" . $end . " 23:59:59'";
                                                $getTotal = mysqli_query($conn, $sql2);
                                                $total = mysqli_fetch_assoc($getTotal);
                                            } else {
                                                // ini buat isi tabel pesanan
                                                $sql = "select * from tbl_order a
                                                        join (select cust_id, cust_name from tbl_customer )b on a.cust_id = b.cust_id";

                                                $getPesanan = mysqli_query($conn, $sql);

                                                // ini buat itung omset
                                                $sql2 = "Select sum(total_price) total from tbl_order";
                                                $getTotal = mysqli_query($conn, $sql2);
                                                $total = mysqli_fetch_assoc($getTotal);
                                            }
                                            while ($data = mysqli_fetch_array($getPesanan)) { ?>
                                                <tr align="center">
                                                    <td><?php echo $i ?></td>
                                                    <td><?php echo $data['status_id']; ?></td>
                                                    <td><?php echo $data['cust_name']; ?></td>
                                                    <td>
                                                        <a href='../mlp_printing/invoice.php?id=<?php echo $data['status_id']; ?>&idu=<?php echo $data['cust_id']; ?>'><?php echo $data['invoice']; ?></a>
                                                    </td>
                                                    <td align="right"><?php echo 'Rp ' . number_format($data['total_price']); ?></td>
                                                </tr>
                                            <?php $i++;
                                            } ?>
                                        </tbody>

                                        <tfoot>
                                            <tr align="center">
                                                <th></th>
                                                <th>Total Omset:</th>
                                                <th></th>
                                                <th></th>
                                                <th align="center"><?php echo 'Rp ' . number_format($total['total']); ?></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>2021 PT MEDIA LANGIT PERSADA</a></strong>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            var judul = $('.title').text();
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "scrollX": true,
                "buttons": [{
                        extend: "csv",
                        messageTop: judul,
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4],
                            modifier: {
                                page: "current"
                            }
                        }
                    }, {
                        text: 'PDF',
                        action: function(e, dt, node, config) {
                            var start = $('#ins_start').val();
                            var end = $('#ins_end').val();
                            window.location.href = 'laporan_pesanan_pdf.php?start=' + start + '&end=' + end + '&user=<?php echo $_SESSION['admin_id'] ?>'
                        }
                    },
                    // {
                    //     extend: "pdf",
                    //     messageTop: judul,
                    //     exportOptions: {
                    //         columns: [0, 1, 2, 3, 4],
                    //         modifier: {
                    //             page: "current"
                    //         }
                    //     }
                    // }, 
                    "colvis"
                ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        $(function() {
            $("#include-navbar").load("left-navbar.php");
        });
    </script>
</body>

</html>