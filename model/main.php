<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <?php
        $main = new Main();
        $main->getHeader();
        ?>
    </head>
    <body>
        <?php $main->getMenu(); ?>        
        <div class="content">
            <div class="top">
                <div class="container">
                    <h2 class="titletop">
                        Online Shop<br />
                        <span>Obat Herbal</span>
                    </h2>
                </div>                
            </div>
            <div class="container">
                <br style="clear: both;" />
                <div class="row">
                    <div class="col-md-9">
                        <div class="right-box">
                            <?= $main->getPage(); ?>

                        </div>                        
                    </div>
                    <div class="col-md-3"> 
                        <div class="form-group">
                            <form name="pencarian" id="pencarian">
                                <div class="input-group add-on">
                                    <input type="text" class="form-control input-sm" placeholder="Search...">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-search fa-fw"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                Herbal's Kategori
                            </div>
                            <div class="panel-body">
                                <ul class="list-group" id="itemKategori">                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>                    
            </div>            
            <br style="clear: both;" />
        </div>
        <footer>
            <div class="footer">
                <div class="container">
                    <p style="display: inline-block;">
                        Copyright © 2017 - Rizki Afriansyah
                    </p>
                </div>
            </div>
        </footer>
        <script>
            var itemsKategori = '';            
            $.ajax({
                url: "application/list_kategori.php",
                dataType: 'JSON',
                success: function (data) {
                    $.each(data, function (key, value) {
                        itemsKategori += "<li class='list-group-item'>\n\
                <a href=?page=produk&kategori="+value.id+">"+value.nama_kategori+"</a></li>";
                    });
                    $('#itemKategori').append(itemsKategori);
                }
            });
        </script>
    </body>
</html>