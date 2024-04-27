<?php include('./headernew.php');
$productdata=[];
if ($conn) {
	$sql = "SELECT * FROM product_cat WHERE parent_id='0' and (id in(select parent_id from product_cat) OR  id in(select oid from products)) ORDER BY `title` ASC";
	$productdata =  $conn->query($sql);  
}
?>
<style>

.shadow {
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.1); 
    /* Add shadow to images */
    border: 2px solid #CCCCCC; 
    /* Add border color */
    border-radius: 8px; 
}

.text-center {
    text-align: center; /* Center align text */
}

.col-md-4 .shadow {
    margin-bottom: 20px;
}

.text-ellipsis {
    white-space: normal;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 1;
    /* Number of lines to show */
    -webkit-box-orient: vertical;
    max-width: 100%;
}

.col-md-4 {
        margin-right: 20px; /* Adjust margin-right as needed */
    }

    /* To remove the margin-right from the last col-md-4 element */
    .col-md-4:last-child {
        margin-right: 0;
    }

</style>
<div id="page" class="hfeed site">
    <div id="main" class="wrapper">
        <article id="post-12" class="post-12 page type-page status-publish hentry">
            <header class="entry-header">
                <h1 class="entry-title">Products</h1>
            </header>

            <div class="entry-content">
                <div class="container center">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="heading text-left">Featured Products</h2>
                            <p class="text-justify">Since the last 22 years, we have done considerable exploration into Briquetting Mechanization and other products. Hi-tech imported machines are used for manufacturing all our products under the supervision of brilliant engineers.</p>
                        </div>
                    </div>
                    <div class="row">
                    <?php
                        if(isset($_GET['proid']) && !empty($_GET['proid'])) {
                            $stv = $_GET['proid'];
                            
                            $productdata=[];
                            if ($conn) {
                                // $sql = "SELECT * from products where oid='$stv'";
                                // $productdata =  $conn->query($sql); 
                                $sql = "SELECT * from product_cat where slug='$stv'";
                                $productCatdetail =  $conn->query($sql);  
                            //    $productId =  $productCatdetail['id'];
                            $oid = '';
                            foreach($productCatdetail as $productalls){
                                $oid=$productalls['id'];
                            }

                                $sql = "SELECT * from products where oid='$oid'";
                                $productdata =  $conn->query($sql); 
                            }
                        } else {
                            echo "This Page Not Found 404 Error";
                        }

                    ?>
                        <?php
                             
                             $productdetail=[];
                             if ($conn) {
                                //  $sql = "SELECT * from products where oid='$stv'";
                                //  $productdetail =  $conn->query($sql); 
                                $sql = "SELECT * from product_cat where slug='$stv'";
                                $productCatdetail =  $conn->query($sql);  
                            //    $productId =  $productCatdetail['id'];
                            $oid = '';
                            foreach($productCatdetail as $productalls){
                                $oid=$productalls['id'];
                            }
                           

                                $sql = "SELECT * from products where oid='$oid'";
                                 $productdetail =  $conn->query($sql);  
                             }
                             foreach($productdetail as $productall){
                                 $idall=$productall['id'];
                                 $imgall=$productall['image'];
                                 $titleall=$productall['title'];
                                 $descriptionall=$productall['description'];
                                 $thumball=$productall['thumb'];
                                 
                        ?>
                        <div class="col-md-4 " style="margin-bottom: 20px;">
                            <div class="shadow" style="margin-bottom: 20px;">
                                <div class="space-between-div" style="padding: 20px;">
                                    <a class="oneline" href="alldetailproduct.php?proid=<?php echo $stv; ?>">
                                        <img fetchpriority="high" decoding="async" class="homepage_img marg shadow" title="<?php echo $titleall; ?>" src="admin/upload/product/images/thumb/<?php echo $thumball ?>" width="400" height="218" />
                                        <h1 class="text-center text-ellipsis"><?php echo $titleall; ?></h1>
                                    </a>
                                    <!-- <h2 class="text-center text-ellipsis"><?php echo $title; ?></h2> -->
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </article>
    </div>
</div>

<?php include('./footernew.php'); ?>