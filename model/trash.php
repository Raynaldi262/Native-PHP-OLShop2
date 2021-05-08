<script>
    // foreach($results as $datas) {
    //     $result1 = 0;

    //     if ($datas['produk_id'] == 1) //kalau kartu nama
    //     { // kalau stok kurang nilainya 1
    //         $sql1 = "select 1 from tbl_item
    //         where item_id = '" . $datas['
    //         bahan_id '] . "'
    //         and item_qty < " . $datas['qty'] . " * 3 "; // echo $sql1; // echo " < br > " ; // $result1=mysqli_query($conn, $sql1); // $result1=mysqli_num_rows($result1); // } else if ($datas['produk_id']==2 or $datas['produk_id']==3) { //dokumen hvs && poster // $sql1="
    //         select 1 from tbl_item
    //         where item_id = '" . $datas['
    //         bahan_id '] . "'
    //         and item_qty < " . $datas['qty'] . "
    //         " ; // echo $sql1; // echo " < br > " ; // $result1=mysqli_query($conn, $sql1); // $result1=mysqli_num_rows($result1); // } else if ($datas['produk_id']==4 or $datas['produk_id']==8) { //Banner standart && Sticker // $sql1="
    //         select 1 from tbl_item
    //         where(item_id = '" . $datas['
    //             bahan_id '] . "'
    //             and item_qty < (" . $datas['hasil_meter'] . " / 10000) * " . $datas['qty'] . ")
    //         or(item_id = '" . $datas['
    //             finishing_id '] . "'
    //             and item_qty < (" . $datas['hasil_meter'] . " / 10000) * " . $datas['qty'] . ")
    //         " ; // echo $sql1; // echo " < br > " ; // $result1=mysqli_query($conn, $sql1); // $result1=mysqli_num_rows($result1); // } else if ($datas['produk_id']==5 or $datas['produk_id']==6) { // x standart & roll up // $sql1="
    //         select 1 from tbl_item
    //         where(item_id = '" . $datas['
    //             bahan_id '] . "'
    //             and item_qty < (" . $datas['hasil_meter'] . " / 10000) * " . $datas['qty'] . ") or(item_id = '" . $datas['
    //             finishing_id '] . "'
    //             and item_qty < (" . $datas['hasil_meter'] . " / 10000) * " . $datas['qty'] . ") or(item_id = '" . $datas['
    //             kaki_id '] . "'
    //             and item_qty < " . $datas['qty'] . ")
    //         " ; // echo $sql1; // echo " < br > " ; // $result1=mysqli_query($conn, $sql1); // $result1=mysqli_num_rows($result1); // } else if ($datas['produk_id']==7) { // Brosur // if ($datas['hasil_meter']=='A3+' ) { // $$ukuran=500; // } else if ($datas['hasil_meter']=='A4' ) { // $ukuran=250; // } else if ($datas['hasil_meter']=='A5' ) { // $ukuran=125; // } // $sql1="
    //         select 1 from tbl_item
    //         where item_id = '" . $datas['
    //         bahan_id '] . "'
    //         and item_qty < " . $datas['qty'] . " * " . $ukuran . "
    //         " ; // echo $sql1; // echo " < br > " ; // $result1=mysqli_query($conn, $sql1); // $result1=mysqli_num_rows($result1); // } // if ($result1) { // kalau stok kurang masuk sini // $count=['nilai'=> 1, 'id' => $datas['produk_id']];
    //         break;
    //     }
    // }

    // return $count;
</script>