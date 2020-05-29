<div id="sidebar" class="col-md-4">
    <!-- search box -->
    <div class="search-box-container">
        <h4>Search</h4>
        <?php echo form_open_multipart('user/search',['class'=>'search-post']); ?>
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search .....">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger">Search</button>
                </span>
            </div>
        </form>
      
    </div>
    <!-- /search box -->
    <!-- recent posts box -->
    <div class="recent-post-container">
        <h4 class="glow">Recent Posts</h4>

        <?php
    
        if(count($sidebar)){
            foreach($sidebar as $side){    
        ?>
        <div class="recent-post">
            <a class="post-img" href="<?php echo base_url('index.php/user/single/'.$side->post_id)?>">
                <img src="<?php echo $side->post_img; ?>" alt=""/>
            </a>
            <div class="post-content">
                <h5>  <?=  anchor("user/single/{$side->post_id}","$side->title");  ?></h5>
                <span>
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <?=  anchor("user/cat_page/{$side->category_id}","$side->category_name");  ?>
                </span>
                <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <?php echo $side->post_date; ?>
                </span>
                <a class="read-more" href="<?php echo base_url('index.php/user/single/'.$side->post_id)?>">read more</a>
            </div>  
        </div>
        <?php 
               }
            } ?>   
    </div>
    <!-- /recent posts box -->
</div>
