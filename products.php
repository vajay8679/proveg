<?php include('./headernew.php');

$productdata=[];
$search_query = isset($_GET['search']) ? $_GET['search'] : '';

if ($conn) {
    $sql = "SELECT * FROM product_cat WHERE parent_id >=0 AND (id IN (SELECT parent_id FROM product_cat) OR id IN (SELECT oid FROM products))";

    // $sql = "SELECT * FROM product_cat WHERE parent_id >=0 and (id in(select parent_id from product_cat) OR  id in(select oid from products)) ORDER BY `title` ASC";
    // Add search condition if a search query is provided
    if (!empty($search_query)) {
        // Break down the search query into individual words
        $keywords = explode(" ", $search_query);
        $search_conditions = [];
        foreach ($keywords as $keyword) {
            // Add each word as a condition to match against titles
            $search_conditions[] = "LOWER(title) LIKE '%" . strtolower($keyword) . "%'";
        }
        // Combine all conditions with OR to search for any word match
        $sql .= " AND (" . implode(" OR ", $search_conditions) . ")";
    }

    $sql .= " ORDER BY title ASC";

    $productdata = $conn->query($sql);
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


/* } */ */

.col-md-4 .shadow {
    margin-bottom: 70px;
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
                        <div class="col-lg-12">
                            <form action="" method="GET">
                                <input type="text" name="search" placeholder="Search product here" value="<?php echo htmlentities($search_query); ?>">
                                <button type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                    <br>  
                    <div class="row">
                        <?php
                        foreach($productdata as $product){
                            $id = $product['id'];
                            $img = $product['thumb'];
                            $title = $product['title'];
                            $slug = $product['slug'];
                        ?>
                        <div class="col-md-4 " style="margin-bottom: 20px;">
                            <div class="shadow" style="margin-bottom: 20px;">
                                <div class="space-between-div" style="padding: 20px;">
                                    <a class="oneline" href="productdetailpage.php?proid=<?php echo $slug; ?>">
                                        <img fetchpriority="high" decoding="async" class="homepage_img marg shadow" title="<?php echo $title; ?>" src="admin/upload/product/images/thumb/<?php echo $img;?>" width="400" height="218" />
                                        <h1 class="text-center text-ellipsis"><?php echo $title; ?></h1>
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