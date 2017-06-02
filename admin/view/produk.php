
<fieldset>
    <legend>Data Produk</legend>
    <table id="tbl_produk" style="display: none;"></table>

    <div id="add_model" class="modal fade">       
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <form id="frm_produk" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" value="" name="action" id="action">
                        <input type="hidden" value="0" name="edit_id" id="edit_id">
                        <div class="form-group">
                            <label for="kode" class="control-label">Kode:</label>
                            <input type="text" class="form-control input-sm" id="kode" name="kode"/>
                        </div>  
                        <div class="form-group">
                            <label for="kategori" class="control-label">Kategori:</label>
                            <select name="kategori" id="kategori" class="input-sm form-control">
                                <option value="">...</option>
                            </select>
                        </div>                                                
                        <div class="form-group">
                            <label for="produk" class="control-label">Produk:</label>
                            <input type="text" class="form-control input-sm" id="produk" name="produk"/>
                        </div>
                        <div class="form-group">
                            <label for="harga_produk" class="control-label">Harga Produk:</label>
                            <input type="text" class="form-control input-sm" id="harga_produk" name="harga_produk"/>
                        </div>
                        <div class="form-group">
                            <label for="link_gambar" class="control-label">Link Gambar Produk:</label>
                            <input type="text" class="form-control input-sm" id="link_gambar" name="link_gambar"/>
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

<script src="application/produk/script.js"></script>
