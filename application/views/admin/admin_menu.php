<body>
<!-- topbar starts -->
<div class="navbar navbar-default" role="navigation">

    <div class="navbar-inner">
        <button type="button" class="navbar-toggle pull-left animated flip">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
            <span>Admin panel</span></a>

        <!-- user dropdown starts -->
        <!--<div>
            <a class="btn btn-default" href="<? base_url().'main/logout' ?>">logout</a>
        </div>-->
        <!--<div class="btn-group pull-right">
            <a class="btn btn-default" href="<? base_url().'main/logout' ?>">
                logout
            </a>

        </div>-->
        <!-- user dropdown ends -->

        <!-- theme selector starts -->
        <div class="btn-group pull-right theme-container animated tada">

        </div>
        <!-- theme selector ends -->

        <ul class="collapse navbar-collapse nav navbar-nav top-menu">
        </ul>

    </div>
</div>
<!-- topbar ends -->
<div class="ch-container">
    <div class="row">

        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Main</li>

                        <li><a class="ajax-link" href="<? echo base_url().'admin/orders' ?>"><span>Orders log</span></a></li>

                        <li><a class="ajax-link" href="<? echo base_url().'admin/add_catagory_form' ?>"><span>Adding new catagory</span></a></li>
                        <li><a class="ajax-link" href="<? echo base_url().'admin/update_catagory_form' ?>"><span>Updating catagory</span></a></li>

                        <li><a class="ajax-link" href="<? echo base_url().'admin/add_brand_form' ?>"><span>Adding new brand</span></a></li>
                        <li><a class="ajax-link" href="<? echo base_url().'admin/update_brand_form' ?>"><span>Updating brand</span></a></li>


                        <li><a class="ajax-link" href="<? echo base_url().'admin/add_product_form' ?>"><span>Adding new product</span></a></li>
                        <li><a class="ajax-link" href="<? echo base_url().'admin/update_product_form' ?>"><span>Updating product</span></a></li>

                        <li><a class="ajax-link" href="<? echo base_url().'admin/add_small_advertize_form' ?>"><span>Adding small Advertize</span></a></li>
                        <li><a class="ajax-link" href="<? echo base_url().'admin/small_advertize_list' ?>"><span>Delete small Advertize</span></a></li>

                        <li><a class="ajax-link" href="<? echo base_url().'admin/add_advertize_form' ?>"><span>Adding new Advertize</span></a></li>
                        <li><a class="ajax-link" href="<? echo base_url().'admin/advertize_list' ?>"><span>Delete Advertize</span></a></li>

                        <li><a class="ajax-link" href="<? echo base_url().'admin/logout' ?>"><span>Log out</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->