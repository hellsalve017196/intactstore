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

        <div id="des" style="display: none"><? echo $des; ?></div>

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
                    <tr><td><? echo $topic; ?></td><td>Id</td><td>Decision</td></tr>
                    <?
                        if(sizeof($datas) > 0)
                        {
                            foreach($datas as $d)
                            {
                                ?>
                                <tr>
                                    <td>
                                        <input <? if(!$hudai) { ?> disabled="disabled" <? } ?> id="<? echo $d['id'] ?>" type="text" class="form-control" value="<? echo $d['name'] ?>">
                                    </td>
                                    <td>
                                        <? echo $d['id'] ?>
                                    </td>
                                    <td>
                                        <? if($hudai) { ?>
                                            <input type="button" id="<? echo $d['id']+1 ?>" value="update" class="btn btn-success" onclick="zn(this)"/>
                                            <?  }
                                        else { ?> <a class="btn btn-success" href="<? echo base_url().'admin/update_product_detail_form/'.$d["id"] ?>">update</a> <?  }?>
                                    <span>&nbsp;</span><a class="btn btn-danger" href="<? echo $delete.$d["id"] ?>">delete</a>
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
<script>
    function zn(ele)
    {
        id = parseInt(ele.getAttribute("id")) - 1;
        value = document.getElementById(id).value;

        req = new XMLHttpRequest();

        req.onreadystatechange = function()
        {
            if(req.status == 200)
            {
                window.location = "<? echo $after ?>";
            }
        }

        req.open("get",document.getElementById("des").innerHTML+id+'/'+value+'/',false);
        req.send(null);
    }
</script>


