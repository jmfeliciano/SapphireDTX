<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>        
    <nav class="yamm megamenu-horizontal" role="navigation">
  
        <ul class="nav">
            <li class="dropdown menu-item">
              <?php $sql=mysqli_query($con,"select id,product_category_name from product_categories where product_category_name in ('Featured Items', 'Accessories', 'Travel Kit', 'Sponsored Item')");
while($row=mysqli_fetch_array($sql))
{
    ?>
                <a href="category.php?cid=<?php echo $row['id'];?>" class="dropdown-toggle" style="text-decoration:none;"><i class="icon fas fa-star fa-fw"></i>
                <?php echo $row['product_category_name'];?></a><br>
                <?php }?>
                        
</li>
</ul>
    </nav>
</div>