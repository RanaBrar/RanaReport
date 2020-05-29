<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN | Login</title>
        <?= link_tag("assets/css/bootstrap.min.css") ?>
    <!-- Font Awesome Icon -->
    <?= link_tag("assets/css/font-awesome.css") ?>
    <!-- Custom stlylesheet -->
    <?= link_tag("assets/css/style.css") ?>
    </head>

    <body>
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <img class="logo" src="<?=  base_url('images/news1.png'); ?>">
                        <h3 align="center" class="heading">Admin</h3>
                        <!-- Form Start -->
                        <?php echo form_open('login/index'); ?>
                                <div class="form-group">
                                <label for="exampleInputEmail1">User Name : </label>
                                <?php echo form_input(['name'=>'username','value'=>set_value('username'),'class' => "form-control",'placeholder' => 'Enter User Name' ]) ?>
                                <span class="text-danger"><?php echo form_error('username'); ?></span>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <?php echo form_password(['name'=>'password','value'=>set_value('password'),'class' => "form-control",'type'=>'password','placeholder' => 'Enter Password' ]) ?>
                                <span class="text-danger"><?php echo form_error('password'); ?></span>
                                </div>
                            <?php echo 
                            form_submit(['type'=>'submit', 'value'=>'Login','class'=>'btn btn-primary']);
                            ?>
                            
                        <!-- /Form  End -->
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
