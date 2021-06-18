<?php require('../model/Pesanan.php');
$pesanan = [];

while ($datas = mysqli_fetch_assoc($getPesanan)) {
  $pesanan[] = $datas; //assign whole values to array
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Pesanan</title>

  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" rel="stylesheet" crossorigin="anonymous">

</head>
<style>
  img {
    width: 100px;
    height: 100px;
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
              <h1>Pesanan</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right" id="pesanan">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Pesanan</li>
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
                  <h3 class="card-title">Data Pesanan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped" style="width: 150%">
                    <thead>
                      <tr>
                        <th>Tgl</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Pesanan</th>
                        <th>Total Harga</th>
                        <th>Bukti Transfer</th>
                        <th>Pengiriman</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($pesanan as $data) { ?>
                        <tr>
                          <td><?php echo $data['create_date']; ?></td>
                          <td><?php echo $data['status_id']; ?></td>
                          <td><?php echo $data['cust_name']; ?></td>
                          <td><?php echo $data['cust_address']; ?> <br> (<?php echo $data['cust_phone']; ?>) <br> (<?php echo $data['cust_email']; ?>)</td>
                          <td> <button type="button" class="btn btn-primary detailPesanan" data-toggle="modal" data-target="#modal-detailPesanan" id="<?php echo $data['status_id']; ?>">
                              Detail
                            </button></td>
                          <td>Rp <?php echo number_format($data['harga']); ?></td>
                          <td> <a href='../mlp_printing/images/bayar/<?php echo $data['bukti_bayar']; ?>' data-toggle="lightbox" data-gallery="gallery">
                              <img src="../mlp_printing/images/bayar/<?php echo $data['bukti_bayar']; ?> " alt=""></a></td>

                          <td><?php echo $data['antar']; ?></td>
                          <td><?php echo $data['status']; ?></td>
                          <td>
                            <form action="../model/Pesanan.php" method="post">
                              <input type='hidden' name='pesan_id' value="<?php echo $data['status_id']; ?>">
                              <?php if ($data['status'] == 'Menunggu Konfirmasi') { ?>
                                <input type="submit" class="btn btn-success" name="acc_item" value="Terima">
                                <input type="submit" class="btn btn-danger" name="dec_item" value="Tolak">
                              <?php } ?>
                              <?php if ($data['status'] == 'Di Proses' && $data['antar'] == 'Antar') { ?>
                                <input type="submit" class="btn btn-success" name="deliver_item" value="Kirim">
                              <?php } ?>
                              <?php if ($data['status'] == 'Dalam Pengiriman') { ?>
                                <input type="submit" class="btn btn-primary" name="finish_item" value="Selesai">
                              <?php } ?>
                              <?php if ($data['status'] == 'Di Proses' && $data['antar'] == 'Ambil Sendiri') { ?>
                                <input type="submit" class="btn btn-primary" name="finish_item" value="Selesai">
                              <?php } ?>
                            </form>
                          </td>
                        </tr>
                      <?php
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

  <!-- modal DETAIL Data -->
  <div class="modal fade" id="modal-detailPesanan">
    <div class="modal-dialog">
      <div class="modal-content col-12">
        <div class="modal-header">
          <h4 class="modal-title">Detail Pesanan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="text-align: center;">
          <div class="modal-body lampiran" style="text-align: center;">
          </div>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal DETAIL data-->

  <!-- modal Kirim Data -->
  <div class="modal fade" id="modal-kirim">
    <div class="modal-dialog">
      <div class="modal-content col-10">
        <div class="modal-header">
          <h4 class="modal-title">Kirim Barang</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="text-align: center;">
          <form action="../model/dataPesanan.php" method="post">
            <input type='hidden' name='id_pesanan' value="" id="id_pesanan">
            <div class="input-group mb-3">
              <div class="col-4 input-group-text">No Resi : </div>
              <input type="text" class="col-12 form-control" placeholder="Nomor Resi" name="resi" id="resi" required>
              <div class="input-group-append">
              </div>
            </div>
            <input type="submit" class="btn btn-success" name="kirim_pesanan" value="Kirim">
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal HAPUS data-->

  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- lightbox -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js" crossorigin="anonymous"></script>
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
  <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
  <script>
    $(function() {
      $("#example1").DataTable({
        // "responsive": true,
        "autoWidth": true,
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        "scrollX": true
      })
    });

    $(function() {
      $("#include-navbar").load("left-navbar.php");
    });

    // Detail pesanan
    $(document).on("click", ".detailPesanan", function() {
      var pesananID = $(this).attr('id');
      $.ajax({
        url: "../model/Pesanan.php", //the page containing php script
        type: "post", //request type,
        dataType: 'json',
        data: {
          get_pesanan: 1,
          pesananID: pesananID
        },
        success: function(data) {
          console.log(data);
          $('.lampiran').empty();
          var pesanan = 0;
          var ongkir = 0;
          var total = 0;

          data.forEach(function(datas) {
            var kalimat = '<b>Produk: </b>' + datas.produk_name + ', <b>GDrive:</b> <a href=' + datas.upload_name + '>Link</a>' + '<br> <b>Bahan:</b> ' + datas.bahan + ', <b>Finishing:</b> ' + datas.finishing + ', <b>Sisi:</b> ' + datas.sisi +
              ', <b>Ukuran:</b> ' + datas.ukuran + ', <b>Jumlah:</b> ' + datas.qty + ', <b>Catatan:</b> ' + datas.deskripsi;
            $(".lampiran").append("<span class='label label-important'>" + kalimat + '</span> <br><br>')
          });
        }
      });
    });

    // lighbox
    $(document).on("click", '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox();
    });
  </script>
</body>

</html>