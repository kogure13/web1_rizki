$(document).ready(function () {
    $('#btn_cancel').click(function () {
        $('#frm_kamuspenyakit').trigger('reset');
    });
    
    $('#tb_kamuspenyakit').flexigrid({
        url: 'application/kamus_penyakit/data_kamuspenyakit.php',
        dataType: 'json',
        method: 'post',
        colModel: [
            {
                display: 'ID',
                name: 'id',
                width: 40
            }, {
                display: 'Kode',
                name: 'kode_penyakit',
                width: 70

            }, {
                display: 'Nama Penyakit',
                name: 'nama_penyakit',
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
        title: 'Data Kamus Penyakit',
        singleSelect: true,
        striped: true,
        width: 500,
        height: 'auto'
    });
});

$(function(){
    $('#frm_kamuspenyakit').validate({
        rules: {
            kode: {
                required: true
            },
            nama_penyakit: {
                required: true
            }            
        },
        messages: {
            kode: {
                required: 'field cannot empty'
            },
            nama_penyakit: {
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
        $('.modal-title').html('Add Kamus Penyakit');
        $('#action').val('add');
    }else if(com == 'Edit'){
        if($('.trSelected', grid).length > 0){
            $('#add_model').modal('show');
            $('#action').val('edit');
            $('.modal-title').html('Edit Kamus Penyakit');
            $.each($('.trSelected', grid), function(key, value){
               $('#edit_id').val(value.children[0].innerText);
               $('#kode').val(value.children[1].innerText);
               $('#nama_penyakit').val(value.children[2].innerText);
            });
        } else {
            alert("No row selected First select row, then click edit button");
            return;
        }        
    }
}

function ajaxAction(action) {
    data = $('#frm_kamuspenyakit').serializeArray();
    
    $.ajax({
       url: 'application/kamus_penyakit/data_kamuspenyakit.php',
       dataType: 'json',
       type: 'post',
       data: data,
       success: function(response){
           $('#add_model').modal('hide');
           $('#tb_kamuspenyakit').flexReload();
       }
    });
}