<?php include('headernew.php'); ?>
<section class="services-section">
    <div class="container">
        <div class="text-center animate" data-anim-type="zoomIn" data-anim-delay="400">
            <h1 class="heading animate fadeInUp">Gallery</h1>
            <div class="pagetitle-separator animate fadeInRight"></div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div id="gallery">
            <?php
            // Pagination parameters
            $limit = 12; // Number of images per page
            $page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
            
            // Calculate offset for pagination
            $offset = ($page - 1) * $limit;
            
            // Fetch images from the database using LIMIT and OFFSET
            $sql=mysqli_query($conn,"SELECT * FROM gallery_image LIMIT $limit OFFSET $offset");
            while($sql1=mysqli_fetch_array($sql))
            {
                $id=$sql1['id'];
                $img=$sql1['image'];
                $title=$sql1['title'];
                $desc=$sql1['desc'];
            ?>
                <div class="col-md-4 col-sm-6 animate" style="height:300px;" data-anim-type="zoomIn" data-anim-delay="200">
                    <div class="home-gallery-col">
                        <div class="home-gallery-img">
                            <img src="admin/<?php echo $img ?>" class="img-responsive">
                            <div class="gallery-showcase-overlay">
                                <div class="gallery-showcase-overlay-inner">
                                    <div class="gallery-showcase-icons">
                                        <a class="photobox_a" href="admin/<?php echo $img ?>" data-lightbox="image" title="Proveg Engineering and Food Processing Pvt. Ltd."><i class="fa fa-search-plus"></i><br /><img src="admin/<?php echo $img ?>" style="display:none" /></a>
                                    </div>
                                    <h2 style="color:#fff;text-align:Center;"><?php echo $desc; ?></h2>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>   
            </div>
        </div>
        <!-- Pagination links -->
        <div class="row">
            <div class="col-md-12" style="text-align:center;">
                <?php
                // Count total number of images
                $result = mysqli_query($conn, "SELECT COUNT(*) as total FROM gallery_menu");
                $row = mysqli_fetch_assoc($result);
                $total_records = $row['total'];
                
                // Calculate total pages
                $total_pages = ceil($total_records / $limit);
                
                // Pagination links
                echo '<div class="blog-pagination animate" data-anim-type="fadeInLeft">';
                if ($page > 1) {
                    echo '<a href="?page='.($page - 1).'"><i class="fa fa-angle-double-left"></i></a>';
                }
                for ($i = 1; $i <= $total_pages; $i++) {
                    echo '<a '.($page == $i ? 'class="active"' : '').' href="?page='.$i.'">'.$i.'</a>';
                }
                if ($page < $total_pages) {
                    echo '<a href="?page='.($page + 1).'"><i class="fa fa-angle-double-right"></i></a>';
                }
                echo '</div>';
                ?>
            </div>
        </div>
    </div>
</section>
<?php include('footernew.php'); ?>
