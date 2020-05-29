<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 align="center" class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <?php echo form_open_multipart('admin/addcat'); ?>

    <div class="form-group">
      <label for="exampleInputEmail1">Category : </label>
      <?php echo form_input(['name'=>'category_name','value'=>set_value('category_name'),'class' => "form-control",'placeholder' => 'Enter Category' ]) ?>
      <span class="text-danger"><?php echo form_error('category_name'); ?></span>
    </div>
    <?php echo 
form_submit(['type'=>'submit', 'value'=>'Add','class'=>'btn btn-primary']);
?>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
