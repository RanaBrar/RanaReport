<?php
$pg = 'home';
include 'header.php'; ?>
<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->

                <div class="post-container">

                    <?php
                    if (count($display)) {
                        foreach ($display as $post) {
                    ?>
                            <div class="post-content">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a class="post-img" href="<?php echo base_url('index.php/user/single/' . $post->post_id) ?>"><img src="<?php echo $post->post_img ?>" alt="" /></a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="inner-content clearfix">
                                            <h3 id="myTable">
                                                <?= anchor("user/single/{$post->post_id}", "$post->title");  ?>
                                            </h3>
                                            <div class="post-information">
                                                <span>
                                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                                    <?= anchor("user/cat_page/{$post->category_id}", "$post->category_name");  ?>
                                                </span>
                                                <span>
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                    <?= anchor("user/author/{$post->author}", "$post->username");  ?>
                                                </span>
                                                <span>
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    <?php echo $post->post_date; ?>
                                                </span>
                                            </div>
                                            <p class="description">
                                                <?php echo  substr($post->description, 0, 30) . "..."; ?>
                                            </p>
                                            <a class='read-more pull-right' href="<?php echo base_url('index.php/user/single/' . $post->post_id) ?>">read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } ?>


                    <?php echo $this->pagination->create_links();   ?>


                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
<?php include 'footer.php'; ?>