<fieldset>
    <legend>Pembelian</legend>
    <div class="well" id="detailPembelian">
        <form name="frm_pembelian" id="frm_pembelian">
            <input type="hidden" name="edit_id" id="edit_id" value="<?= $_GET['id'] ?>">
            <table class="table-condensed table-responsive">
                <tr>
                    <td rowspan="4">
                        <img id="imgProduk" src="">
                    </td>
                    <td><span id="namaProduk"></span></td>
                </tr>
                <tr>
                    <td><span id="hargaProduk"></span></td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label class="control-label" for="jumlah">Jumlah pembelian</label>
                            <input type="number" class="input-sm form-control" id="jumlah" name="jumlah" min="1">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="lanjutBayar" id="lanjutBayar" class="btn btn-sm btn-primary">Lanjut Bayar</button>
                    </td>
                </tr>
            </table>
        </form>        
    </div>
</fieldset>

<script src="application/pembelian/script.js"></script>