<?
if(sizeof($key) > 0)
{
?>
<section id="cart_items">
<div class="container">
    <div class="review-payment">
        <h2><b>Review & Payment</b></h2>
    </div>
    <div class="table-responsive cart_info">

        <table class="table table-condensed">
            <thead>
            <tr class="cart_menu">
                    <td class="image">Item</td>
                    <td class="description">Info</td>
                    <td></td>
                    <td class="price">Price</td>
                    <td></td>
                    <td class="quantity">Quantity</td>
                    <td></td>
                    <td class="total">Total</td>
                    <td></td>
            </tr>
            </thead>
            <tbody>
            <?

            $product = 0;

            foreach($key as $k)
            {

                $data = json_decode($this->input->cookie($k),true);

                ?>
                <tr>
                    <td class="cart_product">
                        <a href=""><img src="<? echo base_url().'product/'.$data['p_img'] ?>" width="200" height="200" alt="   "></a>
                    </td>
                    <td class="cart_description">
                        <h4><a href=""><? echo $data['p_name'] ?></a></h4>
                        <p>Product ID: <? echo $data['p_id'] ?></p>
                    </td>
                    <td class="cart_price">
                        <p><? echo $data['p_price'].' taka' ?></p>
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">
                            <a class="cart_quantity_up" href="<? echo base_url().'user/cart_product_add/'.$data['p_id'].'/'.$data['p_amount'] ?>"> + </a>
                            <input class="cart_quantity_input" type="text" disabled="disabled" name="quantity" value="<? echo $data['p_amount'] ?>" autocomplete="off" size="2">
                            <a class="cart_quantity_down" href="<? echo base_url().'user/cart_product_subtract/'.$data['p_id'].'/'.$data['p_amount'] ?>"> - </a>
                        </div>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price"><? echo $p = $data['p_amount']*$data['p_price'] ?></p>
                    </td>
                    <td class="cart_delete">
                        <a class="cart_quantity_delete" href="<? echo base_url().'user/cart_delete/'.$data['p_id'] ?>"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                <?
                $product = $product + $p;
            }

            ?>

                <tr>
                    <td colspan="5">&nbsp;</td>
                    <td colspan="4">
                        <table class="table table-condensed total-result">
                            <tr>
                                <td><h4>Cart Sub Total</h4></td>
                                <td><h4><? echo $product.' taka' ?></h4></td>
                            </tr>
                            <tr class="shipping-cost">
                                <td><h4>Delivery Cost</h4></td>
                                <td><h4><? echo $cost.' taka' ?></h4></td>
                            </tr>
                            <tr>
                                <td><h3>Total</h3></td>
                                <td><h3><b><? echo ($product+$cost).' taka' ?></b></h3></td>
                            </tr>
                        </table>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>


<div class="shopper-informations" id="main">
    <? if ($this->session->userdata('login') == null): ?>
        <div class="row" id="first" style="display: none">
            <div class="col-sm-6">
                <div class="shopper-info">
                    <p>Sign Up and Checkout</p>

                    <form method="post" action="<? echo base_url() . 'user/order' ?>">
                        <p>Full Name:</p>
                        <input required="required" type="text" name="name" placeholder="Enter name">

                        <p>Mobile Number:</p>
                        <input required="required" type="text" name="number" placeholder="Enter mobile number">

                        <p>Email Address:</p>
                        <input required="required" type="email" name="email" placeholder="Enter email address">

                        <p>Password:</p>
                        <input required="required" type="password" name="password"
                               placeholder="Enter password to login">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="order-message">
                    <p>Shopper's Address</p>
                    <textarea name="address" required="required" name="address"
                              placeholder="Write down address for delivery" rows="16"></textarea>
                    <label><input type="submit" class="btn btn-primary" value="Sign up and Checkout"></label>
                </div>
                <label><input type="button" class="btn btn-primary" value="Already Have a Account?"
                              onclick="jung()"></label>
                </form>
            </div>
        </div>

        <div class="row" id="second">
            <div class="col-sm-12">
                <div class="shopper-info">
                    <p>Log In to CheckOut</p>

                    <p id="out" style="color:red"></p>

                    <form method="post" action="<? echo base_url() . 'user/order' ?>">
                        <p>Email address</p>
                        <input required="required" type="email" id="email" name="email"
                               placeholder="Enter email address">

                        <p>Password</p>
                        <input required="required" type="password" id="password" name="password"
                               placeholder="Enter password to login">
                        <br>
                        <input type="button" class="btn btn-primary" value="Login" onclick="zn()">
                        <input type="button" class="btn btn-primary" value="Sign up and checkout" onclick="hung()">
                    </form>
                </div>
            </div>
        </div>
    <? endif ?>

    <div class="row" id="finish" <? if($this->session->userdata('login') == NULL) {?>style="display: none"<? }?>>
        <div class="col-sm-12">
            <div class="shopper-info">
                <p>CheckOut</p>
                <form method="post" action="<? echo base_url().'user/order' ?>">
                    <input type="submit" class="btn btn-primary" value="CheckOut"/>
                </form>
            </div>
        </div>
    </div>

</div>



</div>
</section> <!--/#cart_items-->
<?
    }

?>
<? if ($this->session->userdata('login') == NULL): ?>
    <script>

        function hung() {
            $("#finish").hide();
            $("#first").show();
            $("#second").hide();
        }

        function jung() {
            $("#finish").hide();
            $("#first").hide();
            $("#second").show();
        }

        function zn() {
            email = $("#email").val();
            pass = $("#password").val();

            if (email != '' && pass != '') {
                $.ajax({
                    url: '<? echo base_url().'user/user_login' ?>',
                    method: 'POST',
                    data: {login: JSON.stringify({u_email: email, u_password: pass})},
                    success: function (data) {
                        if (data == '1') {
                            location.reload(true);
                        }
                        else{
                            $("#out").html("Invalid Username or Password");
                        }
                    }
                });
            }
            else {
                $("#out").html("fill form properly");
            }
        }

    </script>
<? endif ?>
