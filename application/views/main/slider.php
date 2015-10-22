<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                        <?
                            if(sizeof($data) > 0)
                            {
                                $flag = false;

                                foreach($data as $da)
                                {
                                    if(!$flag)
                                    {
                                        ?>
                                        <div class="item active">
                                            <div class="col-sm-12">
                                                <img src="<? echo base_url().'advertize/'.$da['a_img'] ?>" class="girl img-responsive" alt="" />
                                            </div>
                                        </div>
                                        <?
                                        $flag = true;
                                    }
                                    else
                                    {
                                        ?>
                                        <div class="item">
                                            <div class="col-sm-12">
                                                <img src="<? echo base_url().'advertize/'.$da['a_img'] ?>" class="girl img-responsive" alt="" />
                                            </div>
                                        </div>
                                        <?
                                    }
                                }
                            }
                        ?>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>