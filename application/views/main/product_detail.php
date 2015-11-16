<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-9 padding-right">
                <?
                    if(sizeof($single_product) > 0)
                    {
                        ?>
                        <div class="product-details"><!--product-details-->
                            <div class="col-sm-5">
                                <div class="view-product" id="ex1" style="position: relative; overflow: hidden;">
                                    <img src="<? echo base_url().'product/'.$single_product['p_img'] ?>" height="600" width="300"/>
                                    <img src="<? echo base_url().'product/'.$single_product['p_img'] ?>" class="zoomImg" style="position: absolute; top: -26.5473684210526px; left: -686.550151975684px; opacity: 0; width: 1024px; height: 768px; border: none; max-width: none; max-height: none;">
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="product-information"><!--/product-information-->
                                    <p id="p_id" style="display: none"><? echo $single_product['p_id'] ?></p>
                                    <h2><? echo $single_product['p_name'] ?></h2>
                                    <p>product ID:<? echo $single_product['p_id'] ?></p>
                                    <p>Currently in the Inventory: <? echo $single_product['p_count'] ?></p>
								<span>
									<span><? echo $single_product['p_price'].' taka'?></span>
									<label>Quantity:</label>
									<input type="text" value="1" id="amount">
                                    <br>
									<button type="button" id="cart" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
								</span>
                                    <p><b>Description:</b> <? echo $single_product['p_des'] ?></p>
                                    <p><b>Brand:</b> <? echo $single_product['b_name'] ?></p>
                                    <a href=""><img src="<? echo base_url()."res/static/product-details_files/share.png" ?>" class="share img-responsive" alt=""></a>
                                </div><!--/product-information-->
                            </div>
                        </div><!--/product-details-->
                        <?
                    }
                ?>


                <!--/category-tab-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?
                                if(sizeof($other_product) > 0)
                                {
                                    $size = sizeof($other_product);
                                    $i = 1;
                                    $active = " active";

                                    foreach($other_product as $o)
                                    {
                                        if($i == 1)
                                        {
                                            ?>
                                            <div class="item<? echo $active ?>">
                                            <?
                                            $active = "";
                                        }
                                        ?>
                                                <div class="col-sm-4">
                                                    <div class="product-image-wrapper">
                                                        <div class="single-products">
                                                            <div class="productinfo text-center">
                                                                <img src="<? echo base_url().'product/'.$o['p_img'] ?>" width="268" height="249" alt="" />
                                                                <h2><? echo $o['p_price'].' taka' ?></h2>
                                                                <p><? echo $o['p_name'] ?></p>

                                                                <?

                                                                    if($o['p_count'] > 0)
                                                                    {
                                                                        ?>
                                                                        <a href="<? echo base_url().'user/product_detail/'.$o['p_id'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detail</a>
                                                                        <a href="<? echo base_url().'user/add_to_cart/'.$o['p_id'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                                        <?
                                                                    }
                                                                else{
                                                                    ?>
                                                                    <h4>Product Out of Stock</h4>
                                                                        <?
                                                                    }
                                                                ?>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?
                                        if($size == 1)
                                        {
                                            ?>
                                            </div>
                                            <?
                                        }
                                        if(($i == 3) and ($size != 1))
                                        {
                                            ?>
                                            </div>
                                            <?
                                            $i = 0;
                                        }

                                        $size--;
                                        $i++;
                                    }
                                }
                            ?>


                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div><!--/recommended_items-->

            </div>
        </div>
    </div>
    </div>
</section>