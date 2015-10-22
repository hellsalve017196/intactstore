<section>
    <div class="container">
        <div class="row">

<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <div class="panel panel-default">
                <?
                    if(sizeof($catagory) > 0)
                    {
                        foreach($catagory as $c)
                        {
                            ?>
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="<? echo base_url().'user/product_list/'.$c['c_id'].'/c_id' ?>"><span class="pull-right">(<? echo $c['num_of_items'] ?>)</span><? echo $c['c_name'] ?></a></h4>
                            </div>
                            <?
                        }
                    }
                ?>
            </div>
        </div><!--/category-products-->

        <div class="brands_products"><!--brands_products-->
            <h2>Brands</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    <?

                        if(sizeof($brand) > 0)
                        {
                            foreach($brand as $b)
                            {
                                ?>
                                <li><a href="<? echo base_url().'user/product_list/'.$b['b_id'].'/b_id' ?>"> <span class="pull-right">(<? echo $b['num_of_items'] ?>)</span>  <? echo $b['b_name'] ?></a></li>
                                <?
                            }
                        }

                    ?>
                </ul>
            </div>
        </div><!--/brands_products-->

        <!--/price-range-->
        <!--/shipping-->
        <?
            if(sizeof($small_add) > 0)
            {
                foreach($small_add as $s)
                {
                    ?>
                    <div class="shipping text-center">
                        <img src="<? echo base_url().'small-add/'.$s['s_dir'] ?>" alt="">
                    </div>
                    <?
                }
            }
        ?>
    </div>
</div>