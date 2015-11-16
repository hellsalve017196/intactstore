<div class="col-sm-9 padding-right">
    <div class="features_items" id="new"><!--features_items-->
        <h2 class="title text-center">Features Items</h2>
        <?
        if(sizeof($product) > 0)
        {
            foreach($product as $p)
            {
                ?>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="<? echo base_url().'product/'.$p['p_img'] ?>" width="268" height="249" alt="">
                                <h2><? echo $p['p_price'].' taka' ?></h2>
                                <p><? echo $p['p_name'] ?></p>


                                <?
                                    if($p['p_count'] > 0)
                                    {
                                        ?>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add
                                            to cart</a>
                                        <a href="<? echo base_url() . 'user/product_detail/' . $p['p_id'] ?>"
                                           class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detail</a>
                                        <?
                                    }
                                    else{
                                        ?>
                                        <h4>Product Out of Stock</h4>
                                        <?
                                    }
                                ?>

                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2><? echo $p['p_price'].' taka' ?></h2>
                                    <p><? echo $p['p_name'] ?></p>

                                    <? if($p['p_count'] > 0) { ?>

                                    <a href="<? echo base_url().'user/product_detail/'.$p['p_id'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detail</a>

                                    <a href="<? echo base_url().'user/add_to_cart/'.$p['p_id'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>

                                    <? }
                                       else {
                                           ?>
                                           <h4>Product Out of Stock</h4>
                                           <?
                                       }
                                    ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            <?
            }
        }
        else
        {
            ?>
            <h1>Nothing Found from the search</h1>
            <?
        }
        ?>
        <!-- single product -->

    </div><!--features_items-->


</div><!--/category-tab-->


        </div>
    </div>
</div>
</section>
	
