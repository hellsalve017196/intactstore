<?
if(sizeof($key) > 0)
{
?>
<section id="cart_items">
    <div class="container">
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
                                    <a href=""><img src="<? echo base_url().'product/'.$data['p_img'] ?>" width="300" height="300" alt=""></a>
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
                </tbody>
            </table>

        </div>
    </div>
</section> <!--/#cart_items-->
<?
    $delivery_cost = $cost;
?>
<section id="do_action">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="total_area">
                    <ul>
                        <li>Product: <span><? echo $product.' taka' ?></span></li>
                        <li>Delivery Cost: <span><? echo $delivery_cost.' taka' ?></span></li>
                        <li>Total: <span><? echo $product+$delivery_cost.' taka' ?></span></li>
                    </ul>

                    <a class="btn btn-default check_out" href="<? echo base_url().'user/checkout/#main' ?>">Check Out and Review</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
<?
}

?>
