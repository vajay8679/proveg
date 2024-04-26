<?php include('./headernew.php'); ?>

<body data-rsssl=1 class="page-template-default page page-id-10 wp-embed-responsive custom-font-enabled single-author" ondragstart='return false' onselectstart='return false'>
    <div id="page" class="hfeed site">
        <div id="main" class="wrapper">
            <article id="post-10" class="post-10 page type-page status-publish hentry">
                <header class="entry-header">
                    <h1 class="entry-title">Feature Product Detail</h1>
                </header>
                <div class="entry-content">
                    <div class="col-lg-12">
                        <div class="container">
                        <?php
                        if(isset($_GET['proid']) && !empty($_GET['proid'])) {
                            $stv = $_GET['proid'];
                            $productdata=[];
                            if ($conn) {
                                $sql = "SELECT * from our_features where id='$stv'";
                                $productdata =  $conn->query($sql);  
                            }
                        } else {
                            echo "This Page Not Found 404 Error";
                        }
                    ?>
                    <?php  foreach($productdata as $product){
                            $id=$product['id'];
                            $img=$product['image'];
                            $title=$product['title'];
                            $description=$product['description'];
                       
                        ?>
                        <h5 class="text-center"><strong><?php echo $title ? $title : ""; ?></strong></h5>
                            <div class="row">
                           
                                
                                <div class="hedr">
                                    <img fetchpriority="high" decoding="async" class="img-responsive homepage_img" src="admin/<?php echo $img; ?>" width="1000" height="550">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <section class="about-section">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 animate" data-anim-type="fadeInLeft" style="text-align:justify;">
                                    
                                   
                                    <p>
                                    <?php echo $description; ?>
                                    </p>
                                   
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php } ?>
<?php include('./footernew.php'); ?>