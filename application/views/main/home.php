				<div class="col-sm-9 padding-right">
					<div class="features_items" id="new"><!--features_items-->
						<h2 class="title text-center">Latest Products</h2>
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
                                                        <p>Product Stock Out</p>
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
                                                            <p>Product Stock Out</p>
                                                            <?
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <img class="new" src="<? echo base_url().'res/static/images/home/sale.png' ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <?
                                }
                            }
                        ?>
						<!-- single product -->

					</div><!--features_items-->
					
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
                                <?
                                    if(sizeof($catagory) > 0)
                                    {
                                        $flag = true;
                                        foreach($catagory as $c)
                                        {
                                            if($flag)
                                            {
                                                ?>
                                                <li class="active"><a href="<? echo "#".$c['c_name'] ?>" data-toggle="tab"><? echo $c['c_name'] ?></a></li>
                                                <?
                                            }
                                            else
                                            {
                                                ?>
                                                <li class=""><a href="<? echo "#".$c['c_name'] ?>" data-toggle="tab"><? echo $c['c_name'] ?></a></li>
                                                <?
                                            }
                                            $flag = false;
                                        }
                                    }
                                ?>
							</ul>
						</div>
						<div class="tab-content">
                           <?
                                if(sizeof($catagory) > 0)
                                {
                                    $active = ' active';

                                    foreach($catagory as $c)
                                    {
                                       ?>
                                        <div class="tab-pane<? echo $active ?>" id="<? echo $c['c_name'] ?>">
                                        <?
                                        $active = '';

                                            if(sizeof($product) > 0)
                                            {
                                                foreach($product as $p)
                                                {
                                                    if($c['c_id'] == $p['c_id'])
                                                    {
                                                        ?>
                                                        <div class="col-sm-3">
                                                            <div class="product-image-wrapper">
                                                                <div class="single-products">
                                                                    <div class="productinfo text-center">
                                                                        <img src="<? echo base_url().'product/'.$p['p_img'] ?>" width="207" height="183" alt="">
                                                                        <h2><? echo $p['p_price'].' taka' ?></h2>
                                                                        <p><? echo $p['p_name'] ?></p>

                                                                        <?
                                                                            if($p['p_count'] > 0)
                                                                            {
                                                                                ?>
                                                                                <a href="<? echo base_url().'user/add_to_cart/'.$p['p_id'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                                                <a href="<? echo base_url().'user/product_detail/'.$p['p_id'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detail</a>
                                                                                <?
                                                                            }
                                                                            else{
                                                                                ?>
                                                                                <p>Product Out of Stock</p>
                                                                                <?
                                                                            }
                                                                        ?>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?
                                                    }
                                                }
                                            }
                                        ?>
                                        </div>
                                        <?
                                    }
                                }
                           ?>

							</div>

						</div>
					</div><!--/category-tab-->

                    <!--recommended_items-->
                    <!--
                    <div class="recommended_items">
						<h2 class="title text-center">recommended items</h2>

						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item">
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="./home_files/recommend1.jpg" width="268" height="134" alt="">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="file:///home/zn/Desktop/Eshopper/index_files/index.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
							 <a class="left recommended-item-control" href="file:///home/zn/Desktop/Eshopper/index.html#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="file:///home/zn/Desktop/Eshopper/index.html#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>
						</div>
					</div>-->

                <!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	
