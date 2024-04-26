<?php include('header.php'); ?>
<div class="clearfix"></div>
<!-- Page Title Section -->
<div class="page-title-section">
  <div class="overlay">
    <div class="container">
      <div class="row" id="trapezoid">
        <div class="col-md-4">
          <h1 class=" white animate" data-anim-type="fadeInLeft">Gallery</h1>
        </div>
        <div class="col-md-8">
          <ul class="top-breadcrumb animate" data-anim-type="fadeInRight">
            <li><a href="index.html">Home</a></li>
            <li class="active"><a href="#">Gallery</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /Page Title Section -->

<section class="services-section">
<div class="container">
<div class="text-center animate" data-anim-type="zoomIn" data-anim-delay="400">
  <h1 class="heading animate fadeInUp">Products</h1>
  <div class="pagetitle-separator animate fadeInRight"></div>
</div>
<div class="clearfix"></div>

<!------Start blog------------>
<div class="blog-page-section blog-column animate" data-anim-type="fadeInUp" data-anim-delay="400">
<div class="row">
<?php
			$x=1;
			//$sql=mysql_query("select * from product_cat t1 INNER JOIN products t2 on t1.id=t2.oid where t1.parent_id='0'");
			$sql=mysql_query("select * from product_cat where parent_id='0' and id in(select parent_id from product_cat) ORDER BY `title` ASC");
			while($row = mysql_fetch_array($sql))
			{
				
			?>
<div class="col-md-6"  style="height:300px;">
<div class="blog-area" style="height:280px;">
<div class="clear"></div>
<div class="blog-post-title">
<div class="blog-post-title-wrapper">
<h2><?php echo $row['title']; ?></h2>
<p>
<ul class="" type="disc" style="list-style:disc;">
<?php
			$sql2=mysql_query("select * from product_cat where parent_id='".$row['id']."'");
			while($row2 = mysql_fetch_array($sql2))
			{
				
			echo '<li><span>'.$row2['title'].'</span>';
				echo get_products($row2['id']);
				echo get_cat($row2['id']);
				echo '</li>'; } echo '</ul>';
			$x++; ?>
</p>
</div>
</div>
<div class="row" style="margin:0px !important;"> </div>
</div>
</div>
<?php }
function get_cat($id)
{
$sql1=mysql_query("select * from product_cat where parent_id='$id' order by title ASC");
					echo '<ul style="margin-left:20px;list-style-type: disc;">';
					while($row1 = mysql_fetch_array($sql1))
					{
					echo '<li><span>'.$row1['title'].'</span>';
					get_products($row1['id']);
					get_cat($row1['id']);
					echo '</li>';
						
					}
					echo '</ul>';	
					
}
function get_products($id)
{
$sql1=mysql_query("select * from products where oid='$id' order by title ASC");
					$html=  '<ul style="margin-left:20px;list-style-type: disc;">';
					while($row1 = mysql_fetch_array($sql1))
					{
					$html .='<li><a href="product.php?proid='.$row1['id'].'">'.$row1['title'].'</a></li>';
						
					}
					$html .= '</ul>';	
					
			echo $html;
} ?>
</div>
</div>
<div class="clearfix"></div>
</div>
</div>
<!--------------End Blog------------->

</div>
</section>
<?php include('footer.php'); ?>