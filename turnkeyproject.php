<?php include('headernew.php'); ?>
<div class="clearfix"></div>
<!-- Page Title Section -->
<div class="page-title-section">
  <div class="overlay">
    <div class="container">
      <div class="row" id="trapezoid">
        <div class="col-md-4">
          <h1 class="white animate" data-anim-type="fadeInLeft">Turn Key Project</h1>
        </div>
        <div class="col-md-8">
          <!-- <ul class="top-breadcrumb animate" data-anim-type="fadeInRight">
            <li><a href="index.html">Home</a></li>
            <li class="active"><a href="#">Turn Key Project</a></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /Page Title Section -->

<section class="services-section">
    <div class="container">
        <div class="text-center animate" data-anim-type="zoomIn" data-anim-delay="400">
            <h1 class="heading animate fadeInUp" style="text-align: center;">Turn Key Project</h1>
            <div class="pagetitle-separator animate fadeInRight"></div>
        </div>
        <div class="clearfix"></div>
        <div class="container">
            <div class="row">
                <p class="text-center" style="text-align: center;">We undertake the installation &amp; erection service of complete production line for all our products and we help our clients to maintain their machinery for a lifetime. Our expertise in product designing, fabrication, and erection has made us a preferred business associate for many food processing units across India as well as overseas. We offer our clients wholesome engineering support for the erection of all our products' machines.</p>
                <br /><br />
            </div>
        </div>
        <!------Start blog------------>
        <div class="blog-page-section blog-column animate" data-anim-type="fadeInUp" data-anim-delay="400">
            <div class="row">
                <?php
                $x=1;

                $sql=mysqli_query($conn,"SELECT * from keyproject_cat where parent_id='0' and (id in(select parent_id from keyproject_cat) OR  id in(select oid from keyproject)) ORDER BY `title` ASC");
                while($row = mysqli_fetch_array($sql))
                {
                ?>
                <div class="col-md-12">
                    <div class="blog-area">
                        <div class="blog-post-title" id="<?php echo $row['title']; ?>">
                            <div class="blog-post-title-wrapper spc_post">
                               
                                <h3 style="padding-left: 90px;"><?php echo $row['title']; ?></h3>
                                <p>
                                    <?php echo get_products($row['id'], $conn); ?>
                                    <ul class="cat_1" >
                                        <?php
                                        $sql2=mysqli_query($conn,"SELECT * FROM keyproject_cat WHERE parent_id='".$row['id']."'");
                                        while($row2 = mysqli_fetch_array($sql2))
                                        {
                                            echo '<li><span class="cat_1_span">'.$row2['title'].'</span>';
                                            echo get_products($row2['id']);
                                            get_cat($row2['id']);
                                            echo '</li>';
                                        }
                                        echo '</ul>';
                                        $x++;
                                        ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div><!-- End Col-md-6 -->
                <?php }
                function get_cat($id, $conn)
                {
                    $sql1=mysqli_query($conn,"SELECT * from keyproject_cat where parent_id='$id' order by title ASC");
                    echo '<ul class="cat_2" style="margin-left:0px;">';
                    while($row1 = mysqli_fetch_array($sql1))
                    {
                        echo '<li><span><i class="fa fa-angle-double-right" aria-hidden="true"></i>'.$row1['title'].'</span>';
                        get_products($row1['id']);
                        get_cat($row1['id']);
                        echo '</li>';

                    }
                    echo '</ul>';
                }
                function get_products($id, $conn)
                {
                    $sql1=mysqli_query($conn,"SELECT * from keyproject where oid='$id' order by title ASC");
                    $html=  '<ul class="cat_3 row" style="margin-left:20px;">';
                    while($row1 = mysqli_fetch_array($sql1))
                    {
                        if($row1['thumb']=='') {
                            $html .='<li class="col-md-4 text-center"><img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=150%C3%97100&w=150&h=100" style="border:2px solid #a0ce4e; margin-bottom:10px; display: block; margin-left: auto; margin-right: auto;" class="img-responsive"><a class="text-center" style="text-align: center; display: block; margin-left: auto; margin-right: auto;" href="keyproject_details.php?proid='.$row1['id'].'">'.$row1['thumb'].'</a></li>';
                        } else {
                            $html .='<li class="col-md-4 text-center"><img src="admin/upload/keyproject/images/thumb/'.$row1['thumb'].'" style="border:2px solid #a0ce4e; margin-bottom:10px; width: 150px; height: 100px; display: block; margin-left: auto; margin-right: auto;" class="img-responsive"> <a class="text-center" style="text-align: center; display: block; margin-left: auto; margin-right: auto;" href="keyproject_details.php?proid='.$row1['id'].'">'.$row1['title'].'</a></li>';
                        }

                    }
                    $html .= '</ul>';

                    echo $html;
                } ?>
            </div><!-- End Row -->
        </div><!-- End Page -->
        <div class="clearfix"></div>
    </div><!-- End Container -->
</section>


<?php include('footernew.php'); ?>