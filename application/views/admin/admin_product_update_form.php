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
                <?

                    if(sizeof($row) >0)
                    {

                ?>

                <div>
                    <img src="<? echo base_url().'product/'.$row['p_img'] ?>" width="268" height="249" alt="">
                </div>


                <form role="form" data-toggle="validator" action="<? echo base_url().'admin/update_product' ?>" method="post" enctype="multipart/form-data">
                    <div><h3><? echo $flag ?></h3></div>
                    <input type="text" style="display: none" class="form-control" name="p_id" value="<? echo $row['p_id'] ?>"  placeholder="">
                    <div class="form-group">
                        <label>Update product name:</label>
                        <input type="text" class="form-control" name="p_n" value="<? echo $row['p_name'] ?>"  placeholder="">
                    </div>

                    <div class="form-group">
                        <label>Update product catagory:</label>
                        <input type="text" class="form-control" disabled="disabled" value="<? echo $row['c_name'] ?>"  placeholder="">
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
                                    if(strcmp($c['name'],$row['c_name']) == 0)
                                    {
                                        ?>

                                        <option selected="selected" value="<? echo $c['id'] ?>" ><? echo $c['name'] ?></option>

                                        <?
                                    }
                                    else
                                    {
                                        ?>

                                        <option value="<? echo $c['id'] ?>"><? echo $c['name'] ?></option>

                                    <?
                                    }
                                }
                                ?>
                            </select>
                        <?
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Update product brand:</label>
                        <input type="text" class="form-control" disabled="disabled" name="p_n" value="<? echo $row['b_name'] ?>"  placeholder="">
                    </div>

                    <div class="form-group" value="<? echo $row['b_name'] ?>">
                        <label>Select Brand:</label>
                        <?
                        if(sizeof($brand) > 0)
                        {
                            ?>
                            <select class="form-control" name="p_b">


                                <?
                                foreach($brand as $c)
                                {
                                    if(strcmp($row['b_name'],$c['name']) == 0)
                                    {
                                        ?>

                                        <option selected="selected" value="<? echo $c['id'] ?>"><? echo $c['name'] ?></option>

                                        <?
                                    }
                                    else
                                    {
                                        ?>
                                        <option value="<? echo $c['id'] ?>"><? echo $c['name'] ?></option>
                                        <?
                                    }
                                }
                                ?>
                            </select>
                        <?
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>update short description:(in 2 or 3 sentence)</label>
                        <textarea name="p_d" class="form-control"><? echo $row['p_des'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>update just the product price:(in taka)</label>
                        <input name="p_p" value="<? echo $row['p_price'] ?>" class="form-control" type="text">
                    </div>

                    <div class="form-group">
                        <label>update product quantity:</label>
                        <input name="p_q" value="<? echo $row['p_count'] ?>" class="form-control" type="text">
                    </div>

                    <button type="submit" class="btn btn-primary">Update product</button>
                    <a href="<? echo base_url().'admin/delete_product/'.$row['p_id'] ?>" class="btn btn-danger">Delete product</a>
                </form>
            </div>
            <?

            }

            ?>

        </div>
    </div>
    <!--/span-->

</div><!--/row-->

<!-- content ends -->
</div><!--/#content.col-md-0-->
</div><!--/fluid-row-->


</div><!--/.fluid-container-->
