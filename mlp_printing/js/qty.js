src = "https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"
function changeQty(id, itemid) {
    var ukuran = $(id + ' > .input-group > #ukuran > option:selected').val();
    var idbahan = $(id + ' > .input-group > #bahan').val();
    var idfinishing = $(id + ' > .input-group > #finishing').val();
    var kaki = $(id + ' > .input-group > #kaki').val();
    var qty = $(id + ' > .input-group > #qty').val();

    if (itemid == 6 || itemid == 5) {  // kalau id sekian ukurannya diubah jadi meter 
        ukuran = searchSize(ukuran);
    } else if (itemid == 4 || itemid == 8) {    // ini kalau ukuran custom 
        var ukuran1 = $(id + ' > .input-group > #ukuran1').val();
        var ukuran2 = $(id + ' > .input-group > #ukuran2').val();

        var ukuran = ukuran1 + 'x' + ukuran2 + 'cm';
        $(".ringkasan > .ukuran > p").text(ukuran);
        ukuran = searchSize(ukuran);

    }

    $(".ringkasan > .qty > p").text(qty);
    harga = totalPrice(itemid, ukuran, idbahan, idfinishing, kaki, qty);
    harga = numeral(harga).format('0,0');
    $(".ringkasan > .harga > p").text(harga);
}