<div class="header_bottom">
    <div class="header_bottom_left">
        <div class="section group">
            <?php
            $getLatest_Dell = $product->getLatest_Dell();
            if($getLatest_Dell) {
                while($resultDell = $getLatest_Dell->fetch_assoc()) {
            ?>
            <div class="listview_1_of_2 images_1_of_2">
                <div class="listimg listimg_2_of_1">
                    <a href="details.php?proID=<?php echo $resultDell['productID'] ?>"> <img src="admin/uploads/<?php echo $resultDell['image'] ?>" alt="" /></a>
                </div>
                <div class="text list_2_of_1">
                    <h2>Dell</h2>
                    <p><?php echo $resultDell['productName'] ?></p>
                    <div class="button"><span><a href="details.php?proID=<?php echo $resultDell['productID'] ?>">Add to cart</a></span></div>
                </div>
            </div>
            <?php
                }
            }
            ?>

            <?php
            $getLatest_Samsung = $product->getLatest_Samsung();
            if($getLatest_Samsung) {
                while($resultSs = $getLatest_Samsung->fetch_assoc()) {
            ?>
            <div class="listview_1_of_2 images_1_of_2">
                <div class="listimg listimg_2_of_1">
                    <a href="details.php?proID=<?php echo $resultSs['productID'] ?>"><img src="admin/uploads/<?php echo $resultSs['image'] ?>" alt="" /></a>
                </div>
                <div class="text list_2_of_1">
                    <h2>Samsung</h2>
                    <p><?php echo $resultSs['productName'] ?></p>
                    <div class="button"><span><a href="details.php?proID=<?php echo $resultSs['productID'] ?>">Add to cart</a></span></div>
                </div>
            </div>
            <?php
                }
            }
            ?>
        </div>

        <div class="section group">
            <?php
            $getLatest_Apple = $product->getLatest_Apple();
            if($getLatest_Apple) {
                while($resultApple = $getLatest_Apple->fetch_assoc()) {
            ?>
            <div class="listview_1_of_2 images_1_of_2">
                <div class="listimg listimg_2_of_1">
                    <a href="details.php?proID=<?php echo $resultApple['productID'] ?>"> <img src="admin/uploads/<?php echo $resultApple['image'] ?>" alt="" /></a>
                </div>
                <div class="text list_2_of_1">
                    <h2>Apple</h2>
                    <p><?php echo $resultApple['productName'] ?></p>
                    <div class="button"><span><a href="details.php?proID=<?php echo $resultApple['productID'] ?>">Add to cart</a></span></div>
                </div>
            </div>
            <?php
                }
            }
            ?>

            <?php
            $getLatest_Canon = $product->getLatest_Canon();
            if($getLatest_Canon) {
                while($resultCanon = $getLatest_Canon->fetch_assoc()) {
            ?>
            <div class="listview_1_of_2 images_1_of_2">
                <div class="listimg listimg_2_of_1">
                    <a href="details.php?proID=<?php echo $resultCanon['productID'] ?>"><img src="admin/uploads/<?php echo $resultCanon['image'] ?>" alt="" /></a>
                </div>
                <div class="text list_2_of_1">
                    <h2>Canon</h2>
                    <p><?php echo $resultCanon['productName'] ?></p>
                    <div class="button"><span><a href="details.php?proID=<?php echo $resultCanon['productID'] ?>">Add to cart</a></span></div>
                </div>
            </div>
            <?php
                }
            }
            ?>
        </div>
        <div class="clear"></div>
    </div>
    <div class="header_bottom_right_images">
        <!-- FlexSlider -->

        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <li><img src="images/1.jpg" alt="" /></li>
                    <li><img src="images/2.jpg" alt="" /></li>
                    <li><img src="images/3.jpg" alt="" /></li>
                    <li><img src="images/4.jpg" alt="" /></li>
                </ul>
            </div>
        </section>
        <!-- FlexSlider -->
    </div>
    <div class="clear"></div>
</div>