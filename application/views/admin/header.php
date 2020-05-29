<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ADMIN Panel</title>
        <!-- Bootstrap -->
        <?= link_tag("assets/css/bootstrap.min.css") ?>
    <!-- Font Awesome Icon -->
    <?= link_tag("assets/css/font-awesome.css") ?>
    <!-- Custom stlylesheet -->
    <?= link_tag("assets/css/style.css") ?>
    <style>
        tbody {
      display:block;
      max-height:420px;
      overflow-y:auto;
  }
  thead, tbody tr {
      display:table;
      width:100%;
      table-layout:fixed;
  }
  thead {
      width: calc( 100% - 1em )
  } 

  </style>
    </head>
    <body>
        <!-- HEADER -->
        <div id="header-admin">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-2">
                        <a href="<?=  base_url('index.php/admin/post'); ?>"><img  class="logo" src="<?=  base_url('images/news.png'); ?>"></a>
                    </div>
                    <!-- /LOGO -->
                      <!-- LOGO-Out -->
                    <div class="col-md-offset-8 col-md-1">
                        <a href="<?=  base_url('index.php/admin/logout'); ?>" class="admin-logout"> <span style="text-color:yellow;"> <?php
                 echo $this->session->userdata('username');
                    ?></span>,logout</a>
                    </div>
                    <!-- /LOGO-Out -->
                </div>
            </div>
        </div>
        <!-- /HEADER -->
        <!-- Menu Bar -->
        <div id="admin-menubar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       <ul class="admin-menu">
                      
                            <li>
                                <a href="<?=  base_url('index.php/admin/post'); ?>">Post</a>
                            </li>
                            <?php
                       if($this->session->userdata('role') == 1){
                                ?>
                            <li>
                                <a href="<?=  base_url('index.php/admin/cate'); ?>">Category</a>
                            </li>
                            <li>
                                <a href="<?=  base_url('index.php/admin/all_user'); ?>">Users</a>
                            </li>
                            <?php 
                            }
                             ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Menu Bar -->
