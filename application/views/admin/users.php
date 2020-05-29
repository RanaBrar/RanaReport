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
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="<?= base_url('index.php/admin/add_user'); ?>">add user</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                      <?php
        if(count($users))
        {
            $sr = 0;
            foreach($users as $user){    
        ?>
                          <tr>
                              <td class='id'><?php echo ++$sr; ?></td>
                              <td><?php echo $user->username; ?></td>
                              <td><?php
                              if($user->role == 1){ echo 'Admin'; }
                              else{
                                  echo 'Normal';
                              } ?></td>
                             <td class='edit'> <?= anchor("admin/edit_user/{$user->user_id}","<i class='fa fa-edit'></i>");  
                              ?></td>
                              <td class='delete'>
                              <?= anchor("admin/del_user/{$user->user_id}","<i class='fa fa-trash-o'></i>");  ?>
                              </td>
                          </tr>
                          <?php 
               }
            } ?>
                      </tbody>
                  </table>
                
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
