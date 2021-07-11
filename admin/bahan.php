<?php require('../model/AdminStok.php');
$produk = [];

while ($datas = mysqli_fetch_assoc($getProduk)) {
    $produk[] = $datas; //assign whole values to array
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Data Bahan</title>

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
                            <ol class="breadcrumb float-sm-left" id="bahan">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Penambahan Bahan</li>
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
                                    <h3 class="card-title">Data Produk PT. Media Langit Persada</h3>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-tambahBahan" id="tambahBahan">
                                        Tambah Bahan
                                    </button>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped" style="width:140%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Supplier</th>
                                                <th>Produk</th>
                                                <th>Satuan</th>
                                                <th>Qty</th>
                                                <th>Harga</th>
                                                <th>Deskripsi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            while ($data = mysqli_fetch_assoc($getItem)) { ?>
                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td><?php echo $data['item_name']; ?></td>
                                                    <td><?php echo $data['supplier']; ?></td>
                                                    <td>
                                                        <?php
                                                        $result = [];

                                                        $result[] = getProdukWhere($conn, $data['item_id']);
                                                        foreach ($result as $datas) {
                                                            $c = 0;
                                                            $num = count($datas);   // ada brp data di dlmnya

                                                            foreach ($datas as $value) {
                                                                if (++$c == $num) { // kalau data trakhir, ga print koma
                                                                    echo $value['produk_name'];
                                                                } else { // kalau bukan trakhir print koma
                                                                    echo $value['produk_name'] . ', ';
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $data['item_type']; ?></td>
                                                    <td><?php echo $data['item_qty']; ?></td>
                                                    <td><?php echo 'Rp' . number_format($data['item_price']); ?></td>
                                                    <td><?php echo $data['item_desc']; ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-warning ubahBahan" data-toggle="modal" data-target="#modal-ubahBahan" id="<?php echo $data['item_id']; ?>">
                                                            Edit
                                                        </button>
                                                        <button type="button" class="btn btn-danger hapus" data-toggle="modal" data-target="#modal-hapus" id="<?php echo $data['item_id']; ?>">
                                                            Hapus
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

    <!-- modal tambah data -->
    <div class="modal fade" id="modal-tambahBahan">
        <div class="modal-dialog">
            <div class="modal-content col-12">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Bahan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align: center;">
                    <form action="../model/AdminStok.php" method="post">
                        <div class="input-group mb-3">
                            <div class="col-5 input-group-text">Nama Bahan : </div>
                            <input type="text" class="form-control" placeholder="Nama Bahan" name="name" required>
                            <div class="input-group-append">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="col-5 input-group-text">Supplier : </div>
                            <input type="text" class="form-control" placeholder="Nama Supplier" name="supplier" required>
                            <div class="input-group-append">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="col-5 input-group-text">Jumlah : </div>
                            <input type="number" class="form-control col-5" placeholder="Jumlah Bahan" name="qty" min="1" required>
                            <div class="input-group-append">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="col-5 input-group-text">Satuan : </div>
                            <select id="satuan" name="satuan" required>
                                <option value="METER">Meter</option>
                                <option value="PCS">PCS</option>
                            </select>
                            <div class="input-group-append">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="col-5 input-group-text">Kegunaan : </div>
                            <select id="desc" name="desc" required>
                                <option value="BAHAN">Bahan</option>
                                <option value="FINISHING">Finishing</option>
                                <option value="KAKI">Kaki</option>
                            </select>
                            <div class="input-group-append">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="col-5 input-group-text">Harga : </div>
                            <input type="number" class="form-control" placeholder="Harga Bahan" name="price" min="1" required>
                            <div class="input-group-append">
                            </div>
                        </div>
                        <div class="input-group mb-2">
                            <div class="col-12 input-group-text">Produk : </div>
                            <select id="produk" name="produk[]" class="form-control" multiple="multiple" required>
                                <?php foreach ($produk as $data) { ?>
                                    <option value=" <?php echo $data['produk_id']; ?> "><?php echo $data['produk_name']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="input-group-append">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-success" name="insertBahan" value="Tambah Bahan">
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal tambah data -->


    <!-- modal Edit data -->
    <div class="modal fade" id="modal-ubahBahan">
        <div class="modal-dialog">
            <div class="modal-content col-12">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Bahan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align: center;">
                    <form action="../model/AdminStok.php" method="post">
                        <input type='hidden' name='id' id='edt_id'>
                        <div class="input-group mb-3">
                            <div class="col-5 input-group-text">Nama Bahan : </div>
                            <input type="text" class="form-control" placeholder="Nama Bahan" name="name" id="edt_name">
                            <div class="input-group-append">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="col-5 input-group-text">Supplier : </div>
                            <input type="text" class="form-control" placeholder="Nama Supplier" name="supplier" id="edt_sup">
                            <div class="input-group-append">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="col-5 input-group-text">Satuan : </div>
                            <select id="edt_satuan" name="satuan">
                                <option class="satuan" value="PCS">PCS</option>
                                <option class="satuan" value="METER">Meter</option>
                            </select>
                            <div class="input-group-append">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="col-5 input-group-text">Jumlah : </div>
                            <input type="number" class="form-control col-5" placeholder="Jumlah Bahan" name="qty" min="1" id="edt_qty" readonly>
                            <div class="input-group-append">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="col-5 input-group-text">Kegunaan : </div>
                            <select id="edt_desc" name="desc">
                                <option class="desc" value="BAHAN">Bahan</option>
                                <option class="desc" value="FINISHING">Finishing</option>
                                <option class="desc" value="KAKI">Kaki</option>
                            </select>
                            <div class="input-group-append">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="col-5 input-group-text">Harga : </div>
                            <input type="number" class="form-control" placeholder="Harga Bahan" name="price" min="1" id="edt_price">
                            <div class="input-group-append">
                            </div>
                        </div>
                        <div class="input-group mb-2">
                            <div class="col-12 input-group-text">Produk : </div>
                            <select id="edt_produk" name="produk[]" class="form-control" multiple="multiple">
                                <?php foreach ($produk as $data) { ?>
                                    <option class="produk" value=" <?php echo $data['produk_id']; ?> "><?php echo $data['produk_name']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="input-group-append">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-success" name="editBahan" value="Ubah Bahan">
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal Edit data -->

    <!-- modal HAPUS Data -->
    <div class="modal fade" id="modal-hapus">
        <div class="modal-dialog">
            <div class="modal-content col-8">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Bahan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align: center;">
                    <form action="../model/AdminStok.php" method="post">
                        <input type='hidden' name='id_hapus' value="" id="id_hapus">
                        <p id="hapus"></p>
                        <input type="submit" class="btn btn-danger" name="delete_item" value="Hapus Bahan">
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal HAPUS data-->

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
                "scrollX": true
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        $(function() {
            $("#include-navbar").load("left-navbar.php");
        });


        $(document).ready(function() {
            $("#produk").select2({
                multiple: true,
                placeholder: "Silahkan Pilih",
                width: '100%'
            });

        });


        $('#edt_produk').select2().select2({
            multiple: true,
            placeholder: "Silahkan Pilih",
            width: '100%'
        })

        $(document).on("click", ".ubahBahan", function() {
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
                    $("select option.satuan").each(function() {
                        $(this).prop("selected", "false");
                    }); //kosongin selected setiap ganti item

                    $("select option.desc").each(function() {
                        $(this).prop("selected", "false");
                    }); //kosongin selected setiap ganti item

                    $('#edt_id').val(data[0].item_id);
                    $('#edt_name').val(data[0].item_name);
                    $('#edt_sup').val(data[0].supplier);
                    $("select option.satuan").each(function() {
                        if ($(this).val().replace(/ /g, '') == data[0].item_type) {
                            $(this).prop("selected", "true");
                        }
                    });

                    $('#edt_qty').val(data[0].item_qty);

                    $("select option.desc").each(function() {
                        if ($(this).val().replace(/ /g, '') == data[0].item_desc) {
                            $(this).prop("selected", "true");
                        }
                    });
                    $('#edt_price').val(data[0].item_price);

                    $("select option.produk").each(function() {
                        $(this).removeAttr("selected");
                    })

                    var i = 0;
                    $.each((data), function() {
                        $("select option.produk").each(function() {
                            if ($(this).val().replace(/ /g, '') == data[i].produk_id) {
                                $(this).attr("selected", "selected").change();
                            }
                        })
                        i++;
                    })

                }
            });
        });

        // konfirmasi hapus data disini
        $(document).on("click", ".hapus", function() {
            var itemId = $(this).attr('id');
            $.ajax({
                url: "../model/AdminStok.php", //the page containing php script
                type: "post", //request type,
                dataType: 'json',
                data: {
                    get_item: 1,
                    itemId: itemId
                },
                success: function(data) {
                    console.log(data);
                    $("#id_hapus").val(data[0].item_id);
                    $("#hapus").text('Anda yakin menghapus ' + data[0].item_name + ' ?');
                }
            });
        });
    </script>
</body>

</html>