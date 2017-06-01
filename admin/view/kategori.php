
<fieldset>
    <legend>Data kategori</legend>
    <table id="tbl_kategori" style="display: none;"></table>

    <div id="add_model" class="modal fade">       
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <form id="frm_kategori">
                    <div class="modal-body">
                        <input type="hidden" value="" name="action" id="action">
                        <input type="hidden" value="0" name="edit_id" id="edit_id">
                        <div class="form-group">
                            <label for="kode" class="control-label">Kode:</label>
                            <input type="text" class="form-control input-sm" id="kode" name="kode"/>
                        </div>  
                        <div class="form-group">
                            <label for="kategori" class="control-label">Kategori:</label>
                            <input type="text" class="form-control input-sm" id="kategori" name="kategori"/>
                        </div>                                                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btn_cancel" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="btn_add" class="btn btn-sm btn-primary">Save...</button>
                    </div>                
                </form>
            </div>
        </div>        
    </div>
</fieldset>

<script src="application/kategori/script.js"></script>
