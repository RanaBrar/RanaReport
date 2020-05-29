<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 align="center" class="admin-heading">Update User</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <?php echo form_open_multipart("admin/update_user/{$editval->user_id}"); ?>

    <div class="form-group">
      <label for="exampleInputEmail1">User Name : </label>
      <?php echo form_input(['name'=>'username','value'=>set_value('username',$editval->username),'class' => "form-control",'placeholder' => 'Enter User Name' ]) ?>
      <span class="text-danger"><?php echo form_error('username'); ?></span>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <?php echo form_password(['name'=>'password','value'=>set_value('password'),'class' => "form-control",'type'=>'password','placeholder' => 'Enter Password' ]) ?>
      <span class="text-danger"><?php echo form_error('password'); ?></span>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">User Role :</label>
      <SELECT class="form-control" name="role" style="width:200px;">
    <option selected disabled value="">--Select--</option>
  <option value="0">Normal</option>
  <option value="1">Admin</option>
</SELECT>
      <span class="text-danger"><?php echo form_error('role'); ?></span>
    </div>
    <?php echo 
form_submit(['type'=>'submit', 'value'=>'Add','class'=>'btn btn-primary']);
?>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
<?php include "footer.php"; ?>
