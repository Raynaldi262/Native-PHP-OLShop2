<?php require('../model/AdminStok.php');
// $produk = [];

// while ($datas = mysqli_fetch_assoc($getProduk)) {
//     $produk[] = $datas; //assign whole values to array
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Stok</title>

    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<style>
    #tambahBahan {
        margin-left: 60%;
    }

    .select2-selection__choice__display {
        color: black !important;
    }
</style>

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
                            <ol class="breadcrumb float-sm-left" id="stok">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Stock</li>
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
                                    <h3 class="card-title">Data Stok PT. Media Langit Persada</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped" style="width:100%">
                                        <thead>
                                            <tr align="center">
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Stok</th>
                                                <th>Pemakaian <br> (By Sistem)</th>
                                                <th>Pemakaian <br>(Manual Edit)</th>
                                                <th>Sisa</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody align="center">
                                            <?php $i = 1;
                                            while ($data = mysqli_fetch_assoc($getItemStok)) { ?>
                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td><?php echo $data['item_name']; ?></td>
                                                    <td><?php echo $data['stok']; ?></td>
                                                    <td><?php echo $data['stock_out']; ?></td>
                                                    <td><?php echo $data['stock_out_manual']; ?></td>
                                                    <td><?php echo $data['item_qty'] . ' (' . $data['item_type'] . ')'; ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-success tambah" data-toggle="modal" data-target="#modal-tambah" id="<?php echo $data['item_id']; ?>">
                                                            <i class="nav-icon fas fa-plus"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-danger kurang" data-toggle="modal" data-target="#modal-kurang" id="<?php echo $data['item_id']; ?>">
                                                            <i class="nav-icon fas fa-minus"></i>
                                                        </button>
                                                    </td>
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

    </div>
    <!-- ./wrapper -->

    <!-- modal Tambah Stok -->
    <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog">
            <div class="modal-content col-10">
                <div class="modal-header">
                    <h4 class="modal-title">Penambahan Stok</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align: center;">
                    <form action="../model/AdminStok.php" method="post">
                        <input type="hidden" name="stok_id" id="stok_id">
                        <div class="input-group mb-3">
                            <div class="col-4 input-group-text">Nama Bahan : </div>
                            <input type="text" class="form-control" name="stok_name" id="stok_name" readonly>
                            <div class="input-group-append">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="col-4 input-group-text">Stok Tersedia : </div>
                            <input type="number" class="form-control" name="stok_old" id="stok_old" readonly>
                            <div class="input-group-append">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="col-4 input-group-text">Penambahan: </div>
                            <input type="number" class="form-control" placeholder="Banyak" name="stok" min="1" required>
                            <div class="input-group-append">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-success" name="add_stok" value="Tambahkan Stok">
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal Tambah Stok-->


    <div class="modal fade" id="modal-kurang">
        <div class="modal-dialog">
            <div class="modal-content col-10">
                <div class="modal-header">
                    <h4 class="modal-title">Pengurangan Stok</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align: center;">
                    <form action="../model/AdminStok.php" method="post">
                        <input type="hidden" name="stok_id2" id="stok_id2">
                        <div class="input-group mb-3">
                            <div class="col-4 input-group-text">Nama Bahan : </div>
                            <input type="text" class="form-control" name="stok_name2" id="stok_name2" readonly>
                            <div class="input-group-append">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="col-4 input-group-text">Stok Tersedia : </div>
                            <input type="number" class="form-control" name="stok_old2" id="stok_old2" readonly>
                            <div class="input-group-append">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="col-4 input-group-text">Pengurangan: </div>
                            <input type="number" class="form-control" placeholder="Banyak" name="stok2" min="1" required>
                            <div class="input-group-append">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-danger" name="dec_stok" value="Kurangkan Stok">
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal Kurangkan Stok-->

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
    <script src="../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
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
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5],
                        modifier: {
                            page: "current"
                        }
                    }
                }, {
                    extend: "pdf",
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5],
                        modifier: {
                            page: "current"
                        }
                    },
                    customize: function(doc) {
                        doc.pageMargins = [20, 10, 10, 20];
                        doc.defaultStyle.fontSize = 10;
                        doc.styles.tableHeader.fontSize = 10;
                        doc.styles.title.fontSize = 12;
                        doc.defaultStyle.alignment = 'center';
                        // Remove spaces around page title
                        // doc.content[0].text = doc.content[0].text.trim();
                    }
                }, "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        $(function() {
            $("#include-navbar").load("left-navbar.php");
        });

        // Tambah stok disini
        $(document).on("click", ".tambah", function() {
            var itemId = $(this).attr('id');
            $.ajax({
                url: "../model/AdminStok.php", //the page containing php script
                type: "post", //request type,
                dataType: 'json',
                data: {
                    stok_item: 1,
                    itemId: itemId
                },
                success: function(data) {
                    $('#stok_id').val(data[0].item_id);
                    $('#stok_name').val(data[0].item_name);
                    $("#stok_old").val(data[0].item_qty);
                    // $("#hapus").text('Anda yakin menghapus ' + data.item_name + ' ?');
                }
            });
        });

        // Kurangkan stok disini
        $(document).on("click", ".kurang", function() {
            var itemId = $(this).attr('id');
            $.ajax({
                url: "../model/AdminStok.php", //the page containing php script
                type: "post", //request type,
                dataType: 'json',
                data: {
                    stok_item: 1,
                    itemId: itemId
                },
                success: function(data) {
                    console.log(data);
                    $('#stok_id2').val(data[0].item_id);
                    $('#stok_name2').val(data[0].item_name);
                    $("#stok_old2").val(data[0].item_qty);
                    // $("#hapus").text('Anda yakin menghapus ' + data.item_name + ' ?');
                }
            });
        });
    </script>
</body>

</html>