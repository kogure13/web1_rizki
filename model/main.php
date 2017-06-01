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
                        Artikel<br />
                        <span>Obat Herbal</span>
                    </h2>
                </div>                
            </div>
            <div class="container">
                <br style="clear: both;" />
                <div class="row">
                    <div class="col-md-8">
                        <div class="right-box">
                            <?= $main->getPage(); ?>
                            
                        </div>                        
                    </div>
                    <div class="col-md-4">                            
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                Artikel Herbal's
                            </div>
                            <div class="panel-body">
                                <form name="pencarian" id="pencarian">
                                    
                                </form>
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
    </body>
</html>