<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="file:///home/zn/Desktop/Eshopper/index_files/index.html"><i class="fa fa-phone"></i> +8800000000000</a></li>
                            <li><a href="file:///home/zn/Desktop/Eshopper/index_files/index.html"><i class="fa fa-envelope"></i>  info@kroykorun.com (UNDER CONSTRUCTION,COMING SOON!) You can use the website for free trial. Try It!!</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="file:///home/zn/Desktop/Eshopper/index_files/index.html"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="file:///home/zn/Desktop/Eshopper/index_files/index.html"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="file:///home/zn/Desktop/Eshopper/index_files/index.html"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="<? echo base_url() ?>"><img height="200" width="200" src="<? echo base_url().'res/static/index_files/logo.png' ?>" alt=""></a>
                    </div>


                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">

                            <? if ($this->session->userdata('login') != NULL): ?>
                                <li><a href="<? echo base_url() . 'user/log_out/' ?>"><i class="fa fa-apple"></i>
                                        Logout</a></li>
                            <? endif ?>

                            <? if ($this->session->userdata('login') != NULL): ?>
                                <li><a href="<? echo base_url() . 'user/edit_profile_view/' ?>"><i class="fa fa-adjust"></i>
                                        Editing Profile</a></li>
                            <? endif ?>

                            <? if ($this->session->userdata('login') == NULL): ?>
                                <li><a href="<? echo base_url() . 'user/user_login_view/' ?>"><i class="fa fa-apple"></i>
                                        LogIn</a></li>
                            <? endif ?>

                            <li><a href="<? echo base_url().'user/checkout/' ?>"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            <li><a href="<? echo base_url().'user/cart_fetch/' ?>"><i class="fa fa-shopping-cart"></i> Cart</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="<? echo base_url() ?>"><strong>Home</strong></a></li>
                            <li><a href="<? echo base_url().'#new' ?>"><strong>New Products</strong></a></li>
                            <li><a href="<? echo base_url().'user/product_list/#new' ?>"><strong>Products</strong></a></li>
                            <li><a href="<? echo base_url().'user/contact' ?>"><strong>Contact Us</strong></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search by entering" id="search">
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->