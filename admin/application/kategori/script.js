$(document).ready(function () {
    $('#btn_cancel').click(function () {
        $('#frm_kategori').trigger('reset');
    });
    
    $('#tbl_kategori').flexigrid({
        url: 'application/kategori/data_kategori.php',
        dataType: 'json',
        method: 'post',
        colModel: [
            {
                display: 'ID',
                name: 'id',
                width: 40
            }, {
                display: 'Kode',
                name: 'kode_kategori',
                width: 70

            }, {
                display: 'Kategori',
                name: 'nama_kategori',
                width: 100
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
        sortname: 'id',
        sortorder: 'asc',
        usepager: true,
        useRp: true,
        rp: 10,
        title: 'Data Kategori',
        singleSelect: true,
        striped: true,
        width: 500,
        height: 'auto'
    });
});

$(function(){
    $('#frm_kategori').validate({
        rules: {
            kode: {
                required: true
            },
            kategori: {
                required: true
            }            
        },
        messages: {
            kode: {
                required: 'field cannot empty'
            },
            kategori: {
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
            
            $('#frm_kategori').trigger('reset');
        }
    });    
});

function gridAction(com, grid){
    if(com == 'Add'){
        $('#add_model').modal('show');        
        $('.modal-title').html('Add Kategori');
        $('#action').val('add');
    }else if(com == 'Edit'){
        if($('.trSelected', grid).length > 0){
            $('#add_model').modal('show');
            $('#action').val('edit');
            $('.modal-title').html('Edit kategori');
            $.each($('.trSelected', grid), function(key, value){
               $('#edit_id').val(value.children[0].innerText);
               $('#kode').val(value.children[1].innerText);
               $('#kategori').val(value.children[2].innerText);
            });
        } else {
            alert("No row selected First select row, then click edit button");
            return;
        }        
    }
}

function ajaxAction(action) {
    data = $('#frm_kategori').serializeArray();
    
    $.ajax({
       url: 'application/kategori/data_kategori.php',
       dataType: 'json',
       type: 'post',
       data: data,
       success: function(response){
           $('#add_model').modal('hide');
           $('#tbl_kategori').flexReload();
       }
    });
}