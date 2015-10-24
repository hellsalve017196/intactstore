<noscript>
    <div class="alert alert-block col-md-12">
        <h4 class="alert-heading">Warning!</h4>

        <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
            enabled to use this site.</p>
    </div>
</noscript>

<div id="content" class="col-lg-10 col-sm-10">
    <!-- content starts -->
    <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Forms</a>
            </li>
        </ul>
    </div>

    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i><? echo $title ?></h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>


            <div class="box-content">
                <form role="form" data-toggle="validator" action="<? echo base_url().'admin/add_product' ?>" method="post" enctype="multipart/form-data">
                    <div><h3><? echo $flag ?></h3></div>

                    <div class="form-group">
                        <label>Enter product name:</label>
                        <input type="text" class="form-control" name="p_n"  placeholder="">
                    </div>

                    <div class="form-group">
                        <label>Select catagory:</label>
                        <?
                            if(sizeof($catagory) > 0)
                            {
                                ?>
                                <select class="form-control" name="p_c">
                                <?

                                foreach($catagory as $c)
                                {
                                    ?>

                                            <option value="<? echo $c['id'] ?>"><? echo $c['name'] ?></option>

                                    <?
                                }
                                ?>
                                </select>
                                <?
                            }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Select Brand:</label>
                        <?
                        if(sizeof($brand) > 0)
                        {
                            ?>
                            <select class="form-control" name="p_b">
                                <?
                                foreach($brand as $c)
                                {
                                    ?>

                                    <option value="<? echo $c['id'] ?>"><? echo $c['name'] ?></option>

                                <?
                                }
                                ?>
                            </select>
                        <?
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Enter short description:(in 2 or 3 sentence)</label>
                        <textarea name="p_d" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Enter just the product price:(in taka)</label>
                        <input name="p_p" class="form-control" type="text">
                    </div>

                    <div class="form-group">
                        <label>Enter product Quantity:</label>
                        <input name="p_q" class="form-control" type="text">
                    </div>

                    <div class="form-group">
                        <label>Select product image:(1024X768)</label>
                        <input class="form-control" type="file" name="userfile">
                    </div>


                    <button type="submit" class="btn btn-primary">Add product</button>
                </form>
            </div>

        </div>
    </div>
    <!--/span-->

</div><!--/row-->

<!-- content ends -->
</div><!--/#content.col-md-0-->
</div><!--/fluid-row-->


</div><!--/.fluid-container-->
