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
                <table class="table">
                    <tr>
                        <td>advertize</td>
                        <td>delete</td>
                    </tr>
                    <?
                    if(sizeof($data) > 0)
                    {
                        foreach($data as $d)
                        {
                   ?>
                    <tr>
                        <td>
                            <img src="<? echo base_url().'advertize/'.$d['a_img'] ?>" height="200" width="300"/>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="<? echo base_url().'admin/delete_advertize/'.$d['a_id'].'/'.$d['a_img'] ?>">Delete</a>
                        </td>
                    </tr>
                    <?
                        }
                    }
                    ?>

                </table>
            </div>

        </div>
    </div>
    <!--/span-->

</div><!--/row-->

<!-- content ends -->
</div><!--/#content.col-md-0-->
</div><!--/fluid-row-->


</div><!--/.fluid-container-->



