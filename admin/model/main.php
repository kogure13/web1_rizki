<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title></title>
        <!-- Bootstrap Core CSS -->
        <link href="theme/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="theme/flexigrid/css/flexigrid.pack.css" rel="stylesheet">
        <link href="theme/css/sb-admin.css" rel="stylesheet">        
        <link href="theme/css/style.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="theme/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Bootstrap Core JavaScript -->
        <script src="theme/js/jquery-2.1.0.min.js"></script>        
        <script src="theme/js/bootstrap.min.js"></script>        
        <script src="theme/js/jquery.validate.min.js"></script>
        <script src="theme/flexigrid/js/flexigrid.pack.js"></script>
        <script src="theme/tinymce/tinymce.min.js"></script>
    </head>

    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"></a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">                
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= $_SESSION['username'] ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="?page=profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                            </li>                            
                            <li class="divider"></li>
                            <li>
                                <a href="?page=logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#master">
                                <i class="fa fa-fw fa-arrows-v"></i> 
                                Master
                            </a>
                            <ul id="master" class="collapse">
                                <li>
                                    <a href="?page=kategori">Master Kategori</a>
                                </li>
                                <li>
                                    <a href="?page=kamus_penyakit">Kamus Penyakit</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="?page=artikel">
                                <i class="fa fa-fw fa-book"></i>
                                Artikel
                            </a>
                        </li>                                                
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <?php
                        $main = new Main();
                        $main->getPage();
                    ?>
                </div><!-- /.container-fluid -->                                
            </div><!-- /#page-wrapper -->
        </div><!-- /#wrapper -->   
    </body>
</html>
