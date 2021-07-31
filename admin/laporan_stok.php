<?php
require('../connect/conn.php');
require('../session/session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Laporan Stok</title>

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
                            <ol class="breadcrumb float-sm-left" id="laporan_stok">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Laporan Stok</li>
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
                                    <h3 class="card-title">Data stok PT. Media Langit Persada</h3>
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
                                                <td><input type="submit" value="Cari" class="btn-info" id="cari" name="search"></td>
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
                                                <th>Nama</th>
                                                <th>Stok</th>
                                                <th>Total Bahan <br>Masuk</th>
                                                <th>Total Bahan <br>Keluar by sistem</th>
                                                <th>Total Bahan <br>Keluar Manual</th>
                                                <th>Total Stok</th>
                                            </tr>
                                        </thead>
                                        <tbody align="center">
                                            <?php $i = 1;
                                            if (isset($_POST['search'])) {
                                                $start = $_POST['start'];
                                                $end = $_POST['end'];

                                                $sql = "select a.item_Type , a.item_name, (ifnull(total_qty,0)+ifnull(stock_out,0)+ifnull(stock_out_manual,0)-ifnull(stock_in,0)) as stok  ,ifnull(stock_in,0) as stock_in, ifnull(stock_out,0) as stock_out, ifnull(stock_out_manual,0) as stock_out_manual, ifnull(total_qty,0) as total_qty
                                                        from tbl_item a 
                                                        left join (select item_id, sum(stok_qty) as stock_in, stok_desc 
                                                            from tbl_stockinout where stok_desc = 'STOCK IN' and create_date >= '" . $start . " 00:00:00' and create_date <= '" . $end . " 23:59:59'
                                                            GROUP by item_id) b
                                                            on a.item_id = b.item_id
                                                        left join (select item_id, sum(stok_qty) as stock_out, stok_desc 
                                                            from tbl_stockinout 
                                                            where stok_desc = 'STOCK OUT' and create_date >= '" . $start . " 00:00:00' and create_date <= '" . $end . " 23:59:59'
                                                            group by  item_id) c
                                                            on a.item_id = c.item_id
                                                        left join (select item_id, sum(stok_qty) as stock_out_manual, stok_desc 
                                                            from tbl_stockinout where stok_desc = 'STOCK OUT MANUAL' and create_date >= '" . $start . " 00:00:00' and create_date <= '" . $end . " 23:59:59'
                                                            group by  item_id) d
                                                            on a.item_id = d.item_id
                                                        left join (select item_id, total_qty from (select item_id, total_qty, row_number() over (partition by item_id order by create_date desc) as no_urut 
                                                            from tbl_stockinout
                                                            where create_date >= '" . $start . " 00:00:00' and create_date <= '" . $end . " 23:59:59') as abc where no_urut = 1) e
                                                            on a.item_id = e.item_id
                                                        where item_status = 'ACTIVE' and  stock_in is not null or stock_out is not null or stock_out_manual is not null";

                                                $getStok = mysqli_query($conn, $sql);
                                            } else {
                                                $sql = "select a.item_Type ,a.item_name, (ifnull(total_qty,0)+ifnull(stock_out,0)+ifnull(stock_out_manual,0)-ifnull(stock_in,0)) as stok  ,ifnull(stock_in,0) as stock_in, ifnull(stock_out,0) as stock_out, ifnull(stock_out_manual,0) as stock_out_manual, ifnull(total_qty,0) as total_qty
                                                    from tbl_item a 
                                                    left join (select item_id, sum(stok_qty) as stock_in, stok_desc 
                                                        from tbl_stockinout where stok_desc = 'STOCK IN' GROUP by item_id) b
                                                        on a.item_id = b.item_id
                                                    left join (select item_id, sum(stok_qty) as stock_out, stok_desc 
                                                        from tbl_stockinout 
                                                        where stok_desc = 'STOCK OUT' group by  item_id) c
                                                        on a.item_id = c.item_id
                                                    left join (select item_id, sum(stok_qty) as stock_out_manual, stok_desc 
                                                        from tbl_stockinout where stok_desc = 'STOCK OUT MANUAL' group by  item_id) d
                                                        on a.item_id = d.item_id
                                                    left join (select item_id, total_qty from (select item_id, total_qty, row_number() over (partition by item_id order by create_date desc) as no_urut 
                                                        from tbl_stockinout) as abc where no_urut = 1) e
                                                        on a.item_id = e.item_id
                                                    where item_status = 'ACTIVE'";

                                                $getStok = mysqli_query($conn, $sql);
                                            }
                                            while ($data = mysqli_fetch_array($getStok)) { ?>
                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td><?php echo $data['item_name']; ?></td>
                                                    <td><?php echo $data['stok']; ?></td>
                                                    <td><?php echo $data['stock_in']; ?></td>
                                                    <td><?php echo $data['stock_out']; ?></td>
                                                    <td><?php echo $data['stock_out_manual']; ?></td>
                                                    <td><?php echo $data['total_qty'] . ' (' . $data['item_Type'] . ')'; ?></td>
                                                </tr>
                                            <?php $i++;
                                            } ?>
                                        </tbody>
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
                            columns: [0, 1, 2, 3, 4, 5, 6],
                            modifier: {
                                page: "current"
                            }
                        }
                    }, {
                        text: 'PDF',
                        action: function(e, dt, node, config) {
                            var start = $('#ins_start').val();
                            var end = $('#ins_end').val();
                            window.location.href = 'laporan_stok_pdf.php?start=' + start + '&end=' + end + '&user=<?php echo $_SESSION['admin_id'] ?>';
                        }
                    },
                    //  {
                    //     extend: "pdf",
                    //     messageTop: judul,
                    //     exportOptions: {
                    //         columns: [0, 1, 2, 3, 4, 5, 6],
                    //         modifier: {
                    //             page: "current"
                    //         }
                    //     },
                    //     customize: function(doc) {
                    //         doc.pageMargins = [20, 10, 10, 20];
                    //         doc.defaultStyle.fontSize = 10;
                    //         doc.styles.tableHeader.fontSize = 10;
                    //         doc.styles.title.fontSize = 12;
                    //         doc.defaultStyle.alignment = 'center'; 
                    //     }
                    // },
                    "colvis"
                ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        $(function() {
            $("#include-navbar").load("left-navbar.php");
        });

        $('#start').change(function() {
            var a = $(this).val();
            $('#end').attr('min', a);
            $('#end').val('');
        })
    </script>
</body>

</html>