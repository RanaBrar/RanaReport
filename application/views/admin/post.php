<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
          <?php  if($msg=$this->session->flashdata('msg')){
    $class=$this->session->flashdata('class');
?>
    <div class="alert <?= $class ?>">
<?= $msg; ?>
    </div>
<?php } ?>
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="<?= base_url('index.php/admin/add_post'); ?>">add post</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                      <?php
                  
        if(count($post))
        {
            $sr = 0;
            foreach($post as $p){    
        ?>
                          <tr>
                              <td class='id'><?php echo ++$sr; ?></td>
                              <td><?php echo $p->title; ?></td>
                              <td><?php echo $p->category_name; ?></td>
                              <td><?php echo $p->post_date; ?></td>
                              <td><?php echo $p->username; ?></td>
                              <td class='edit'> <?= anchor("admin/edit_post/{$p->post_id}","<i class='fa fa-edit'></i>");  
                              ?></td>
                              <td class='delete'>
                              <?= anchor("admin/del_post/{$p->post_id}/{$p->category}","<i class='fa fa-trash-o'></i>");  ?>
                              </td>
                          </tr>
                          <?php 
               }
            } ?>
                      </tbody>
                  </table>
                  <?php  echo $this->pagination->create_links();   ?> 
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
