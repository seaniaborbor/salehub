<?php 

//print_r($all_products);
if(isset($pre_order_products) && !empty($pre_order_products)){
    foreach($pre_order_products as $product) {
        ?>
        
        <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
                <div class="option_container">
                <div class="options">
                    <a href="/add_to_cart/<?=$product->prodId?>" class="option1">
                    Add To Cart
                    </a>
                    <a href="/add_to_cart/<?=$product->prodId?>" class="option2">
                    Order Now
                    </a>
                </div>
                </div>
                <div class="img-box">
                <img src="/public_asset/products/<?=$product->prodPic?>" alt="">
                </div>
                <div class="detail-box">
                <h5>
                <?=$product->prodName?>
                </h5>
                <h6>
                <?=$product->prodPrice?>
                </h6>
                </div>
            </div>
        </div>

        <?php
        // Code block to process each product goes here
    }
}
