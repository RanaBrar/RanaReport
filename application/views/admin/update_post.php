<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 align="center" class="admin-heading">Update Post</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <?php echo form_open_multipart("admin/update_post/{$editval->post_id}"); ?>
<?php echo form_hidden('author',$this->session->userdata('user_id')) ?>
    <div class="form-group">
      <label for="exampleInputEmail1">Title : </label>
      <?php echo form_input(['name'=>'title','value'=>set_value('title',$editval->title),'class' => "form-control",'placeholder' => 'Enter Title' ]) ?>
      <span class="text-danger"><?php echo form_error('title'); ?></span>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Description</label>
      <?php echo form_textarea(['name'=>'description','value'=>set_value('description',$editval->description),'class' => "form-control",'placeholder' => 'Enter Description' ]) ?>
      <span class="text-danger"><?php echo form_error('description'); ?></span>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Category</label>
      <SELECT class="form-control" name="category" style="width:200px;">
    <option value="">--Select--</option>
    <?php
        foreach ($category as $cat):
          if($editval->category==$cat->category_id){
            echo "<option selected value='" . $cat->category_id . "' >" . $cat->category_name;
          }
          else{
        echo "<option value='" . $cat->category_id . "' >" . $cat->category_name;
          }
    ?>
    <?php endforeach ?>
</SELECT>
      <span class="text-danger"><?php echo form_error('description'); ?></span>
    </div>
    <div class="form-group">
    <label for="body">Select Image</label>
   <?php  echo form_upload(['name'=>'post_img','value'=>$editval->post_img]); ?>
  
  </div>
<?php echo 
form_submit(['type'=>'submit', 'value'=>'Add','class'=>'btn btn-primary']);
?>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
