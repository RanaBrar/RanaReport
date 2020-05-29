<?php include 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                    <div class="post-container">
                    <?php
        if(count($display)){
            foreach($display as $post){    
        ?>
                        <div class="post-content single-post">
                        <h3> <?=  anchor("user/single/{$post->post_id}","$post->title");  ?></a></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <?=  anchor("user/cat_page/{$post->category_id}","$post->category_name");  ?>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <?=  anchor("user/author/{$post->author}","$post->username");  ?>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $post->post_date; ?>
                                </span>
                            </div>
                            <img class="single-feature-image" src="<?php echo $post->post_img ?>" alt=""/>
                            <p class="description">
                            <?php echo $post->description; ?>
                            </p>
                        </div>
                        <?php 
               }
            } ?>       
                    </div>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
