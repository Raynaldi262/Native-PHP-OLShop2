<?php
require('../connect/conn.php');
?>
<style>
    table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 50%;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
    }

    td {
        font-size: 12px;
    }

    th {
        text-align: center;
        background-color: gray;
        padding: 4px;
        color: white;
        font-size: 12px;
    }
</style>
<div style="text-align:center">
    <!-- <img width="100" src="images/home/logo.png"/> -->
    <table id="example1" class="table table-bordered table-striped" align="center">
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
            if ($_GET['start'] == null) {

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
            } else {
                $start = $_GET['start'];
                $end = $_GET['end'];

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
    <br>
</div>
<?php
$html = ob_get_contents();
ob_end_clean();

require __DIR__ . '../../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf('P', 'A4', 'en');
$html2pdf->writeHTML($html);
$html2pdf->output('laporan_stok.pdf', 'D');
?>