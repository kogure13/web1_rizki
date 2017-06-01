tinymce.init({
    selector: 'textarea',
    height: 150,
    theme: 'modern',
    plugins: [
        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
    ],
    toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ],
    content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css'
    ]
});

$(document).ready(function () {
    $('#tbl_artikel').flexigrid({
        url: 'application/artikel/data_artikel.php',
        dataType: 'json',
        method: 'post',
        colModel: [
            {
                display: 'ID',
                name: 'id',
                width: 40
            }, {
                display: 'Judul',
                name: 'judul_artikel',
                width: 120

            }, {
                display: 'kategori',
                name: 'kategori',
                width: 100
            }, {
                display: 'Penulis',
                name: 'penulis_artikel',
                width: 100
            }, {
                display: 'Tanggal Artikel',
                name: 'tgl_artikel',
                align: 'center',
                width: 100
            }
        ],
        buttons: [
            {
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
        singleSelect: true,
        striped: true,
        width: 'auto',
        height: 'auto'
    });
    
    $('#tgl_artikel').datepicker({
        dateFormat: 'YY-M-DD'
    });
    
    var items = '';
    $.ajax({
        url: "application/kategori/option_kategori.php",
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
            
            $('#frm_artikel').trigger('reset');
        }
    });    
});

function gridAction(com, grid){
    if(com == 'Add'){        
        $('#action').val('add');
    }else if(com == 'Edit'){
        if($('.trSelected', grid).length > 0){
            $('#add_model').modal('show');
            $('#action').val('edit');
            $('.modal-title').html('Edit Kamus Penyakit');
            $.each($('.trSelected', grid), function(key, value){
               $('#edit_id').val(value.children[0].innerText);
               
            });
        } else {
            alert("No row selected First select row, then click edit button");
            return;
        }        
    }
}

function ajaxAction(action) {
    data = $('#frm_artikel').serializeArray();
    
    $.ajax({
       url: 'application/artikel/data_artikel.php',
       dataType: 'json',
       type: 'post',
       data: data,
       success: function(response){           
           $('#tbl_artikel').flexReload();
       }
    });
}