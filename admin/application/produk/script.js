$(document).ready(function () {
    $('#btn_cancel').click(function () {
        $('#frm_produk').trigger('reset');
    });
    
    $('#tbl_produk').flexigrid({
        url: 'application/produk/data_produk.php',
        dataType: 'json',
        method: 'post',
        colModel: [
            {
                display: 'ID',
                name: 'id',
                width: 40
            }, {
                display: 'Kategori',
                name: 'nama_kategori',
                width: 100

            }, {
                display: 'Kode Produk',
                name: 'kode_produk',
                width: 80
            }, {
                display: 'Nama Produk',
                name: 'nama_produk',
                width: 230
            }, {
                display: 'Harga Produk',
                name: 'harga_produk',
                align: 'right',
                width: 130
            }
        ],
        buttons: [
            {
                name: 'Add',
                bclass: 'add',
                onpress: gridAction
            }, {
                name: 'Edit',
                bclass: 'edit',
                onpress: gridAction
            }
        ],
        sortname: 'kode_produk',
        sortorder: 'asc',
        usepager: true,
        useRp: true,
        rp: 10,
        title: 'Data Produk',
        singleSelect: true,
        striped: true,
        width: 'auto',
        height: 'auto'
    });
    
    var items = '';
    $.ajax({
        url: "application/produk/option_produk.php",
        dataType: 'JSON',
        success: function (data) {
            $.each(data, function (key, value) {
                items += "<option value='" + value.id + "'>" + value.nama_kategori + "</option>";
            });
            $('#kategori').append(items);
        }
    });
});

$(function(){
    $('#frm_produk').validate({
        rules: {
            kode: {
                required: true
            },
            kategori: {
                required: true
            },
            produk: {
                required: true
            }
        },
        messages: {
            kode: {
                required: 'field cannot empty'
            },
            kategori: {
                required: 'field cannot empty'
            },
            produk: {
                required: 'field cannot empty'
            }
        },
        submitHandler: function(form){
            var com_action =$('#action').val();
            if(com_action == 'add'){
                ajaxAction('add');
            }else if(com_action == 'edit'){
                ajaxAction('edit');
            }
            
            $('#frm_produk').trigger('reset');
        }
    });    
});

function gridAction(com, grid){
    if(com == 'Add'){
        $('#add_model').modal('show');        
        $('.modal-title').html('Add Produk');
        $('#action').val('add');
    }else if(com == 'Edit'){
        var id = 0;
        if($('.trSelected', grid).length > 0){
            $('#add_model').modal('show');
            $('#action').val('edit');
            $('.modal-title').html('Edit Produk');
            $.each($('.trSelected', grid), function(key, value){
               $('#edit_id').val(value.children[0].innerText);
               id = $('#edit_id').val();
               $.ajax({
                  url: 'application/produk/edit_produk.php?id='+id,
                  type: 'POST',
                  dataType: 'JSON',
                  success: function(data) {
                      $('#kategori').val(data.id_kategori);
                      $('#kode').val(data.kode_produk);                      
                      $('#produk').val(data.nama_produk);
                      $('#harga_produk').val(data.harga_produk);
                      $('#link_gambar').val(data.link_gambar);
                  }
               });               
            });
        } else {
            alert("No row selected First select row, then click edit button");
            return;
        }        
    }
}

function ajaxAction(action) {
    data = $('#frm_produk').serializeArray();
    
    $.ajax({
       url: 'application/produk/data_produk.php',
       dataType: 'json',
       type: 'post',
       data: data,
       success: function(response){
           $('#add_model').modal('hide');
           $('#tbl_produk').flexReload();
       }
    });
}