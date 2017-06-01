<fieldset>
    <legend>
        Data Artikel
    </legend>
    <div class="well">
        <form name="frm_artikel" id="frm_artikel">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="judul" class="control-label">Judul</label>
                        <input type="text" name="judul" id="judul" class="input-sm form-control">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="publish" class="control-label">Publish</label>
                        <select name="publish" id="publish" class="input-sm form-control">                            
                            <option value="1">Publish</option>
                            <option value="0" selected="selected">Unpublish</option>
                        </select>
                    </div>                    
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <input type="hidden" id="tgl_artikel">
                        <span id="tgl_artikel"></span>
                    </div>                    
                </div>
            </div>
            <div class="form-group">
                <textarea name="isi_artikel" id="isi_artikel"></textarea>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="kategori" class="control-label">Kategori</label>
                        <select name="kategori" id="kategori" class="input-sm form-control">                            
                            <option value="">...</option>                           
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="kamus_penyakit" class="control-label">Kamus Penyakit</label>
                        <select name="kamus_penyakit" id="kamus_penyakit" class="input-sm form-control">                            
                            <option value="">...</option>                           
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="penulis" class="control-label">Penulis</label>
                        <input type="text" name="penulis" id="penulis" class="input-sm form-control" readonly="readonly">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-sm btn-primary">Save..</button>
            </div>
        </form>
    </div>
    <table id="tbl_artikel" style="display: none"></table>

    <script src="application/artikel/script.js"></script>
</fieldset>