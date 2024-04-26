<?php include('./headernew.php'); ?>

<style>
    .text-ellipsis {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100%;
    }
</style>

<div id="main" class="wrapper">
    <div class="col-lg-12">
        <div class="hdr-tp-fl"></div>
        <div class="hdr-md-fl">

            <!-- Slider Section -->
            <?php 
            $sliderdata = [];
            if ($conn) {
                $sql = "SELECT * FROM slider";
                $sliderdata = $conn->query($sql);  
            }
            ?>
            <div id="jssor_1" class="slider-container">
                <!-- ... (Slider initialization and configuration) -->
                <div data-u="slides" class="slider-slides">
                    <?php foreach ($sliderdata as $slider): ?>
                        <!-- ... (Slider content) -->
                    <?php endforeach; ?>
                </div>
                <!-- ... (Thumbnail Navigator and Arrow Navigator) -->
            </div>
            <script>
                jssor_1_slider_init();
            </script>
        </div>
        <div class="hdr-bt-fl"></div>
    </div>

    <article id="post-69" class="post-69 page type-page status-publish hentry">
        <header class="entry-header">
            <h1 class="entry-title">Home</h1>
        </header>
        <div class="entry-content">
            <div class="text-center animate" data-anim-type="zoomIn" data-anim-delay="200">
                <h1 class="heading animate fadeInUp">Our Featured Product(s)</h1>
                <div class="pagetitle-separator animate fadeInRight"></div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-12">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            $productdata = fetchData($conn, "SELECT * FROM products");
                            displayProducts($productdata);

                            $seconddata = fetchData($conn, "SELECT * FROM products");
                            displayProducts($seconddata);

                            displaySpecialProduct("Poultry Processing", "https://provegengineering.in/product.php?proid=453", "admin/upload/slider/672f98bd-ea02-4fee-a3b9-92015a5a61d0.jpg", "(Production range from &#8211; 1,000-5,000 KG/HR)");

                            displayProduct("Spice/Masala Plant", "https://provegengineering.in/product.php?proid=472", "admin/upload/product/images/thumb/20170316135657_sa.jpg", "(Production range from &#8211; 1000-8000 KG/HR)");

                            displayProduct("Flourmill plant", "https://provegengineering.in/product.php?proid=468", "images/20200103120600_Flour%20Mill%20Plant.jpg", "(Production range from &#8211; 250-4,000 KG/H)");

                            displayProduct("Poha Processing", "https://provegengineering.in/product.php?proid=486", "images/20200106084718_1052a3e5-9d5f-4218-af57-47c436ff0e4f.jpg", "(Production range from &#8211; 1000-5000 KG/HR)");

                            displayProduct("Rotary Drum Dryer", "rotary-drum-dryer.html", "proveg/wp-content/themes/ecotheme/images/thumb-rotary-drum-dryer1.jpg", "(Production range from &#8211; 2,000-5,000 KG/H)");

                            displayProduct("Hammer Mill", "hammer-mill.html", "proveg/wp-content/themes/ecotheme/images/thumb-hammer-mill-grinder.jpg", "(Production range from &#8211; 1000-7000 KG/HR)");

                            displaySpecialProduct("Free Raw Material Test", "material-testing.html", "proveg/wp-content/themes/ecotheme/images/test-mac1.jpg");
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .entry-content -->

        <?php include('./footernew.php'); ?>

        <?php
        // Helper functions
        function fetchData($conn, $sql) {
            $result = [];
            if ($conn) {
                $result = $conn->query($sql);
            }
            return $result;
        }

        function displayProducts($data) {
            foreach ($data as $product) {
                displayProduct($product['title'], "https://provegengineering.in/product.php?proid={$product['id']}", $product['image'], $product['description']);
            }
        }

        function displayProduct($title, $link, $image, $description) {
            ?>
            <div class="col-md-4" style="margin-top: 20px;">
                <h5 class="text-center"><strong><?= $title; ?></strong></h5>
                <p><a href="<?= $link; ?>"><img decoding="async" class="img-responsive homepage_img" title="Explore <?= $title; ?>" src="<?= $image; ?>" width="210" height="148" /></a></p>
                <p class="text-left text-ellipsis"><?= $description; ?></p>
                <p style="line-height: 1.102325410;"><span class="pro-grn">(Additional product details here)</span></p>
                <p><a style="font-size: 10pt;" href="<?= $link; ?>"><img decoding="async" src="<?= $image; ?>" width="4" height="6" /> Explore <?= $title; ?></a></p>
                <hr size="1px" width="100%" />
            </div>
            <?php
        }

        function displaySpecialProduct($title, $link, $image, $extraInfo = "") {
            ?>
            <div class="col-md-4 col-sm-offset-1" style="margin-top: 20px;">
                <h5 class="text-center"><strong><?= $title; ?></strong></h5>
                <p><a href="<?= $link; ?>"><img decoding="async" class="img-responsive homepage_img" title="Explore <?= $title; ?>" src="<?= $image; ?>" width="210" height="148" /></a></p>
                <p class="text-left text-ellipsis"><?= $extraInfo; ?></p>
                <p style="line-height: 1.102325410;"><span class="pro-grn"><?= $title; ?></span></p>
                <p><a style="font-size: 10pt;" href="<?= $link; ?>"><img decoding="async" src="<?= $image; ?>" width="4" height="6" /> Explore <?= $title; ?></a></p>
                <hr size="1px" width="100%" />
            </div>
            <?php
        }
        ?>
