<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>News</title>
    <!-- Bootstrap -->
    <?= link_tag("assets/css/bootstrap.min.css") ?>
    <!-- Font Awesome Icon -->
    <?= link_tag("assets/css/font-awesome.css") ?>
    <!-- Custom stlylesheet -->
    <?= link_tag("assets/css/style.css") ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
     <style>
    .zoom {
      transition: transform .2s;
      /* Animation */
    }

    .zoom:hover {
      transform: scale(1.2);
      /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    }

.glow {
  font-size: 8px;
  color: #fff;
  text-align: center;
  -webkit-animation: glow 1s ease-in-out infinite alternate;
  -moz-animation: glow 1s ease-in-out infinite alternate;
  animation: glow 1s ease-in-out infinite alternate;
}

@-webkit-keyframes glow {
  from {
    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 3px #e60073, 0 0 4px #e60073, 0 0 15px #e60073, 0 0 16px #e60073, 0 0 17px #e60073;
  }
  
  to {
    text-shadow: 0 0 20px #fff, 0 0 3px #ff4da6, 0 0 4px #ff4da6, 0 0 5px #ff4da6, 0 0 6px #ff4da6, 0 0 7px #ff4da6, 0 0 8px #ff4da6;
  }
}
.img {
  -webkit-filter: drop-shadow(5px 5px 5px #222 );
  filter: drop-shadow(5px 5px 5px #222);

}
</style>
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
                <a href="<?=  base_url('index.php/user/index'); ?>" id="logo"><img class="zoom img" src="<?=  base_url('images/news.png'); ?>"></a>
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class='menu'>
               
                <li><a class=" <?php
if($this->uri->segment(2)=='index'){
    echo 'active';
}  
else{
    echo '';
} 
                ?>" href="<?=  base_url('index.php/user/index'); ?>">Home</a></li>
                <?php
        if(count($category)){
            foreach($category as $cat){ 
                if($this->uri->segment(3) == $cat->category_id){
                    $active = 'active';
                }  
                else{
                    $active = '';
                } 
        ?>
                    <li>
                    <?=   anchor("user/cat_page/{$cat->category_id}","$cat->category_name ($cat->post)",array('class' => $active));  ?>
                    </li>
                    <?php 
               }
            } ?>       
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
