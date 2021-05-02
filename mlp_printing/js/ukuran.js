src = "https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"

function changeSize(id, itemid) {
    var ukuran = $(id + ' > .input-group > #ukuran > option:selected').val();
    var idbahan = $(id + ' > .input-group > #bahan').val();
    var idfinishing = $(id + ' > .input-group > #finishing').val();
    var kaki = $(id + ' > .input-group > #kaki').val();
    var qty = $(id + ' > .input-group > #qty').val();

    if (itemid == 2) {  // kalau id 2 rubah bahan samain dengan ilai ukuran
        $.each($(id + ' > .input-group > #bahan > option'), function (key, value) {
            $(this).prop("selected", "false");
        })

        $.each($(id + ' > .input-group > #bahan > option'), function (key, value) {
            var result = $(this).text().match(ukuran);
            if (result) {
                bahan = $(this).text()
                idbahan = $(this).val();
                $(this).prop("selected", "true");
            }
            $(".ringkasan > .bahan > p").text(bahan);
        })
    }

    $(".ringkasan > .ukuran > p").text(ukuran);

    if (itemid == 6 || itemid == 5) {  // kalau id sekian ukurannya diubah jadi meter 
        ukuran = searchSize(ukuran);
    } else if (itemid == 4 || itemid == 8) {    // ini kalau ukuran custom 
        var ukuran1 = $(id + ' > .input-group > #ukuran1').val();
        var ukuran2 = $(id + ' > .input-group > #ukuran2').val();

        var ukuran = ukuran1 + 'x' + ukuran2 + 'cm';
        $(".ringkasan > .ukuran > p").text(ukuran);
        ukuran = searchSize(ukuran);

    }

    harga = totalPrice(itemid, ukuran, idbahan, idfinishing, kaki, qty);
    harga = numeral(harga).format('0,0');
    $(".ringkasan > .harga > p").text(harga);
}