$(document).ready(function () {
    var id = "<?php echo $_GET['id']; ?>";
    url = 'application/list_produk.php?id=' + id;
    console.log(url)
    
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,            
        success: function (data) {
            $('#edit_id').val(data.id);
            alert(data.harga_produk);
        }
    });    
});

