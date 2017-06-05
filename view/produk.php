<?php
if (!isset($_GET['kategori'])) {
    $title = "Semua Produk";
} else {
    $titleClass = new Kategori();
    $title = "Obat ".$titleClass->getkategori($_GET['kategori']);
}
?>

<fieldset>
    <legend>Produk Herbal's</legend>
    <div class="title">
        <h4>
            <?= $title ?>
        </h4>        
    </div>
    <div class="row" id="listProduk">
    </div>
</fieldset>

<script>
    var items = '';
    var kategori = '<?php echo $kategori = (isset($_GET['kategori'])) ? $_GET['kategori'] : ''; ?>';
    $.ajax({
        url: "application/list_produk.php?kategori=" + kategori,
        dataType: 'JSON',
        success: function (data) {
            $.each(data, function (key, value) {
                items += "<div class='col-sm-3 com-md-4'>\n\
                <div class='thumbnail'>\n\
                <img src='" + value.link_gambar + "'>" + value.nama_produk + " \n\
                <p class='text-muted'>" + formatCurrency(value.harga_produk) + "</p>\n\
                <a href='?page=beli&id=" + value.id + "' class='btn btn-sm btn-primary'>Beli</a></div></div>";
            });
            $('#listProduk').append(items);
        }
    });
</script>