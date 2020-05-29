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
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="<?= base_url('index.php/admin/add_cat'); ?>">add category</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>No. of Posts</th>
                      
                        <th>Delete</th>
                    </thead>
                    <tbody>
              <?php      if(count($category))
        {
            $sr = 0;
            foreach($category as $cat){    
        ?>
                        <tr>
                            <td class='id'><?php echo ++$sr; ?></td>
                            <td><?php echo $cat->category_name; ?></td>
                            <td><?php echo $cat->post; ?></td>
                           
                            <td class='delete'>  <?= anchor("admin/del_cat/{$cat->category_id}","<i class='fa fa-trash-o'></i>");  ?></td>
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
